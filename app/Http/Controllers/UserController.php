<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Auth;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return redirect("/dashboard");
        }
        return view('login');
    }  
   
    public function registration()
    {
        if(Auth::check()){
            return redirect("/dashboard");
        }
        return view('register');
    }
   
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {

            if (auth()->user()->role == 'admin') {
                return redirect()->route('admin.dashboard');
            }else{
                return redirect("/dashboard")
                            ->withSuccess('You have Successfully loggedin');
            }
        }
  
        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }

    
    public function postRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
    }
    
   
    public function dashboard()
    {
        if(Auth::check()){
            return view('user_dashboard');
        }
  
        return redirect("login")->withSuccess('Opps! You do not have access');
    }
    

    public function create(array $data)
    {
        $file = $data['image'];
        $filename = $file->getClientOriginalName();
        Storage::disk('local')->put('public/'.$filename,'Content');

      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'age'=> $data['age'],
        'address'=> $data['address'],
        'dob'=> $data['dob'],
        'role'=> $data['role'],
        'password' => Hash::make($data['password']),
        'profile_picture'=> $filename
      ]);
    }
    
    public function logout() {
        // Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }

    public function adminHome()
    {
        return view('admin_dashboard');
    }
}
