<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class UserController extends Controller
{

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:5', 'unique:users,name'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'alpha_num', 'min:6', 'confirmed'],
            'isTeacher' => ['required', 'boolean']
        ]);

        $data = $request->except('password_confirmation');
        $data['password'] = bcrypt($data['password']);
        User::create($data);
        return redirect('/login');
    }

    public function login(Request $request)
    {
        $creds = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($creds)){
            if($request->remember){
                Cookie::queue(Cookie::forever('mycookie', $request->email));
            }
            else{
                Cookie::queue(Cookie::forget('mycookie'));
            }

            $request->session()->regenerate();
            return redirect('/courses');
        }

        return redirect('login')->with('error', 'Invalid username/password! Please register if you don\'t have an account.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function show()
    {
        $user = User::find(Auth::id());
        $courses = [];
        if($user->isTeacher){
            $courses = Course::whereHas('teachers', function($query) use ($user){
                $query->where('userID', $user->id);
            })->with('teachers')->get();
        }
        else{
            $courses = Course::whereHas('students', function($query) use ($user){
                $query->where('userID', $user->id);
            })->with('teachers')->get();
        }

        return view('user.show', ['user' => $user, 'courses' => $courses]);
    }

    public function edit()
    {
        $user = User::find(Auth::id());
        return view('user.edit', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:5'],
            'email' => ['required', 'email'],
        ]);

        $user = User::find(Auth::id());
        $data = $request->all();
        $user->update($data);
        return redirect('/profile');
    }

}
