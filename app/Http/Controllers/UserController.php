<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function NewUserSave(Request $request) {
        $validation = Validator::make($request->all(), [
            'fio'=>['required', 'regex:/[А-Яа-яЁё-]/u'],
            'birthday'=>['required'],
            'passport'=>['required', 'numeric'],
            'login'=>['required', 'unique:users', 'regex:/[A-Za-z0-9-]/'],
            'phone'=>['required', 'regex:/[0-9]/'],
            'email'=>['required', 'unique:users', 'email:frc'],
            'password'=>['required', 'min:6', 'confirmed'],
            'rules'=>['required'],
        ]);
        if($validation->fails()){
            return response()->json($validation->errors(), 400);
        }
        $user = new User();
        $user->fio = $request->fio;
        $user->birthday = $request->birthday;
        $user->passport = $request->passport;
        $user->login = $request->login;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = md5($request->password);
        $user->role = 'user';
        $user->save();
        return redirect()->route('AuthPage');
    }

    public function LoginUser(Request $request) {
        $validation = Validator::make($request->all(), [
            'login'=>['required'],
            'password'=>['required'],
        ]);
        if ($validation->fails()) {
            return response()->json($validation->errors(), 400);
        }
        $user = User::query()
            ->where('login', $request->login)
            ->where('password', md5($request->password))
            ->first();
        if ($user) {
            Auth::login($user);
            if($user->role==='user') {
                return redirect()->route('HomePage');
            }
            if($user->role==='admin') {
                return redirect()->route('CitiesPage');
            }
        } else{
            return response()->json('неверный логин или пароль', 403);
        }
    }

    public function ExitUser() {
        Auth::logout();
        return redirect()->route('HomePage');
    }

    public function UserEditSave(Request $request, User $user) {
        $request->validate([
            'fio'=>['required', 'regex:/[А-Яа-яЁё-]/u'],
            'birthday'=>['required'],
            'passport'=>['required', 'numeric'],
            'login'=>['required', 'regex:/[A-Za-z0-9-]/'],
            'phone'=>['required', 'regex:/[0-9]/'],
            'email'=>['required', 'email:frc'],
            'password'=>['min:6', 'nullable'],
        ]);
        $user->fio = $request->fio;
        $user->birthday = $request->birthday;
        $user->passport = $request->passport;
        $user->login = $request->login;
        $user->phone = $request->phone;
        $user->email = $request->email;
        if($request->password) {
            $user->password = md5($request->password);
        }
        $user->update();
        if (Auth::user()->role === 'admin') {
            return redirect()->route('UsersPage');
        }
        return redirect()->back();
    }

    public function DeleteUser(User $user) {
        $user->delete();
        return redirect()->back();
    }
}
