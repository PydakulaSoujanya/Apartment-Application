<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator; // Import the Validator facade
use App\Models\User;
use App\Models\ResidentDetail;
use Illuminate\Support\Facades\Auth;
use App\Models\AdminOtp;
use Illuminate\Support\Facades\Mail;


class ResidentRegisterController extends Controller
{
    // Show form for registering a new resident
    public function showRegisterResidentForm()
    {
        return view('admin.register_resident');
    }

 
    // Handle the resident registration process
    public function registerResident(Request $request)
    {

      
        // Validate incoming request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
          
            'block' => 'required|string|max:255',
            'floor' => 'required|string|max:255',
            'flat_number' => 'required|string|max:255',
            'flat_type' => 'required|string|max:255',
            'flat_holder_name' => 'nullable|string|max:255',
            'aadhar_no' => 'nullable|string|max:255',
            'family_members' => 'nullable|integer',
            'vehicles' => 'nullable|integer',
            'area' => 'nullable|integer',
            
        ]);

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create a new user for the resident
        $user = User::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'password' => null,
            'type' => 3, // 3 for Resident
        ]);
       
        // Store the resident details in the ResidentDetail model
        ResidentDetail::create([
            'user_id' => $user->id,
            'admin_id' => Auth::id(),
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'flat_number' => $request->flat_number,
            'floor' => $request->floor,
            'block' => $request->block,
            'flat_type' => $request->flat_type,
            'flat_holder_name' => $request->flat_holder_name,
            'aadhar_no' => $request->aadhar_no,
            'family_members' => $request->family_members,
            'vehicles' => $request->vehicles,
            'area' => $request->area,
            'status' => '',
        ]);

  // Generate and store OTP
  $otp = rand(100000, 999999);
  AdminOtp::create([
      'user_id' => $user->id,
      'otp' => $otp,
      'is_used' => false,
  ]);

        // Send OTP email
        Mail::send('emails.admin_otp', ['otp' => $otp, 'url' => route('admin.verify.otp', ['id' => $user->id])], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('OTP for Admin Account Setup');
        });

        // Redirect back to the registration form with success message
        return redirect()->route('admin.register.resident.form')->with('status', 'Resident registered successfully.');
    }

    public function showOtpForm($id)
    {
        return view('admin.verify_otp', ['userId' => $id]);
    }
    

    public function verifyOtp(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'otp' => 'required|digits:6',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
    
        $adminOtp = AdminOtp::where('user_id', $id)
                             ->where('otp', $request->otp)
                             ->where('is_used', false)
                             ->first();
    
        if (!$adminOtp) {
            return redirect()->back()->withErrors(['otp' => 'Invalid OTP or OTP already used.']);
        }
    
        $adminOtp->is_used = true;
        $adminOtp->save();
    
        return redirect()->route('admin.setup.password', ['id' => $id]);
    }
    
    public function showPasswordSetupForm($id)
    {
        return view('admin.setup_password', ['id' => $id]);
    }



    // Show list of residents
    public function viewResidents()
    {
        // Fetch residents with pagination
        $residents = ResidentDetail::paginate(10); // Adjust the pagination as needed
        return view('admin.view_resident', compact('residents'));
    }
      // Show single resident details
      public function showResident($id)
      {
          // Find the resident by ID
          $resident = ResidentDetail::findOrFail($id);
          return view('admin.show_resident', compact('resident')); // Pass the resident data to the view
      }
      public function editResident($id)
{
    $resident = ResidentDetail::findOrFail($id);
    return view('admin.edit_resident', compact('resident'));
}

public function updateResident(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'mobile' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        'flat_number' => 'required|string|max:255',
        'flat_type' => 'required|string|max:255',
        'floor' => 'required|string|max:255',
        'block' => 'required|string|max:255',
        'flat_holder_name' => 'nullable|string|max:255',
        'aadhar_no' => 'nullable|string|max:255',
        'family_members' => 'nullable|integer',
        'vehicles' => 'nullable|integer',
        'area' => 'nullable|integer',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $resident = ResidentDetail::findOrFail($id);
    $resident->update($request->all());

    return redirect()->route('admin.view.residents')->with('status', 'Resident updated successfully.');
}


public function residentCount()
{
    // Assuming 'type' = 3 corresponds to the 'Resident' role
    $residentCount = User::where('type', 3)->count();

    return view('admin.adminHome', [
        'residentCount' => $residentCount
    ]);
}


}
