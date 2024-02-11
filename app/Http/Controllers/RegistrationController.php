<?php

namespace App\Http\Controllers;

use App\Models\student;
use App\Models\teacher;
use Illuminate\Http\Request;

use App\Models\User;
class RegistrationController extends Controller
{
    public function signup(Request $request)
    {
        $valid = $request->validate([
            'firstname' =>'required|min:4',
            'lastname' =>'required|min:4',
            'patronymics' =>'required|min:4',
            'email'=>'required|min:4|unique:users',
            'password'=>'required|min:8',
            'role' => 'required',
            'subject'=>'required_if:role,==,teacher',
            'grade'=>'required_if:role,==,student',
        ]);
        $thisuser = new User();
        $thisuser->name = $request->input('firstname');
        $thisuser->lastname = $request->input('lastname');
        $thisuser->patronymics = $request->input('patronymics');
        $thisuser->role = $request->input('role');
        $thisuser->email = $request->input('email');
        $thisuser->password = bcrypt($request->input('password'));
        $thisuser->save();
        if($thisuser->role === 'teacher')
        {
            $thisteacher = new teacher();
            $thisteacher->subject = $request->input('subject');
            $thisuser->teacher()->save($thisteacher);
        }
        elseif($thisuser->role === 'student')
        {
            $thisstudent = new student();
            $thisstudent->grade = $request->input('grade');
            $thisuser->student()->save($thisstudent);
        }
        session()->flash('successfulregistration', 'registration was successful');
        return redirect()->route('login');
    }
}
