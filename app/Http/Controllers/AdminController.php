<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\ManagerDeatil;
use Illuminate\Support\Facades\Auth; 

class AdminController extends Controller
{
    public function showRegisterManagerForm()
    {
        return view('admin.register_manager');
    }

  

    public function registerManager(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'qualifiacation' => 'required|string|max:255',
            'experience' => 'required|string|max:255',
            'aadhar_no' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create a new user
        $user = User::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => 2, 
        ]);

        // Store the resident details
        ManagerDeatil::create([
            'user_id' => $user->id,
            'admin_id' => Auth::id(),
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'qualifiacation' => $request->qualifiacation,
            'experience' => $request->experience,
            'aadhar_no' => $request->aadhar_no,
            'address' => $request->address,
        ]);

        return redirect()->route('admin.home')->with('status', 'Manager registered successfully.');
    }


    public function showUsers(Request $request)
    {
        $roles = [
            1 => 'Admin',
            2 => 'Manager',
            3 => 'Employee', // Add other roles as necessary
        ];

        $selectedRole = $request->input('role');
        
        // Fetch users based on the selected role or all users if "All" is selected
        if ($selectedRole && $selectedRole != 'all') {
            $users = User::where('type', $selectedRole)->get();
        } else {
            $users = User::all();
        }

        return view('admin.show_users', [
            'users' => $users,
            'roles' => $roles,
            'selectedRole' => $selectedRole
        ]);
    }
   
    
      
}

