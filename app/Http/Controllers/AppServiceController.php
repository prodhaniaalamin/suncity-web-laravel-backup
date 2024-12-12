<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AppServiceController extends Controller
{

    public function ckeditorFileUpload()
    {
        if (!Auth::check()) return throw new HttpResponseException(redirect('/')->withError('Access denied! You are not valid user.'));
        return response()->json(['url' => image($this->fileUploadHandle('ckeditorFiles', false, 'upload'))]);
    }

    public function logout() {
        Auth::logout();
        Artisan::call('cache:clear');
        return redirect('/');
    }

    public function registration(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);
        $inputs = $request->all();
        $inputs['password'] = Hash::make($inputs['password']);
        $user = User::create($inputs);
        Auth::login($user);
        return redirect('/');
    }
}
