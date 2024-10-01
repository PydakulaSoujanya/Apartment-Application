<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\Flat;
use App\Models\Expense;
use App\Models\AdminDetail;
use App\Models\AdminOtp;


class AdminRegisterController extends Controller
{
    public function showRegisterAdminForm()
    {
        return view('superadmin.register_admin');
    }

    public function registerAdmin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'pincode' => 'required|string|max:255',
            'apartment_name' => 'required|string|max:255',
            'apartment_purpose' => 'required|string|in:Industry,Home,Apartment',
            'apartment_address' => 'required|string|max:255',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Fetch the highest apart_id from AdminDetail and increment it
        $lastApartId = AdminDetail::orderBy('apart_id', 'desc')->value('apart_id');
    
        if ($lastApartId) {
            // Extract the numeric part of apart_id and increment it
            $newApartIdNumber = intval(substr($lastApartId, 6)) + 1;
            $newApartId = 'apart_' . str_pad($newApartIdNumber, 2, '0', STR_PAD_LEFT);
        } else {
            // If no records exist, start with apart_01
            $newApartId = 'apart_01';
        }
    
        // Create a new user without a password
        $user = User::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'password' => null,
            'type' => 1, // 1 for Admin
            'apart_id' => $newApartId, // Store apart_id in the user table
        ]);
    
        // Store the admin details along with apart_id
        AdminDetail::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'pincode' => $request->pincode,
            'apartment_name' => $request->apartment_name,
            'apartment_purpose' => $request->apartment_purpose,
            'apartment_address' => $request->apartment_address,
            'apart_id' => $newApartId, // Store apart_id in the admin details table
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

        return redirect()->route('superadmin.home')->with('status', 'Admin registered successfully. An OTP has been sent to the admin\'s email.');
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
    

    public function setupPassword(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $user = User::find($id);
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('login')->with('status', 'Password set successfully. You can now log in.');
    }
    public function showAdmins()
    {
        $admins = AdminDetail::all();
        return view('superadmin.admin-list', compact('admins')); // Updated view reference
    }





    public function adminCount()
{
     // Fetch resident count
     $residentCount = User::where('type', 3)->count();

     // Fetch total expenses
     $totalExpenses = Expense::sum('amount');
 
     // Fetch expenses per month (for monthly display)
     $monthlyExpenses = Expense::selectRaw('MONTH(paid_date) as month, SUM(amount) as total')
         ->groupByRaw('MONTH(paid_date)')
         ->get();
 
     // Fetch flat count
     $flatCount = Flat::count();
 
     // Return the view with all the data
     return view('admin.adminHome', [
         'residentCount' => $residentCount,
         'totalExpenses' => $totalExpenses,
         'monthlyExpenses' => $monthlyExpenses,
         'flatCount' => $flatCount
     ]);
}

}