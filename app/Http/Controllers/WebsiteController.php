<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;
use App\Models\Doctor;

class WebsiteController extends Controller
{
    public function languageChange(Request $request)
    {
        session()->put('locale', $request->lang);
        return redirect()->back();
    }

    public function home()
    {
        // back()->withSuccess('Cache is successfully cleared');
        // Artisan::call('view:clear');
        return view('website.home');
    }

    public function about()
    {
        return view('website.about');
    }

    public function services()
    {
        return view('website.services');
    }

    public function healthPackages()
    {
        return view('website.health-packages');
    }

    public function profile()
    {
        return view('website.profile');
    }
    public function forms()
    {
        return view('website.forms');
    }

    public function healthInsurances() {
        return view('website.health-insurances');
    }

    public function photoGallery() {
        return view('website.photo-gallery');
    }

    public function videoGallery() {
        return view('website.video-gallery');
    }


    public function termsCondition() {
        return view('website.terms-condition');
    }
    public function privacyPolicy() {
        return view('website.privacy-policy');
    }
    public function cookiePolicy() {
        return view('website.cookie-policy');
    }

}
