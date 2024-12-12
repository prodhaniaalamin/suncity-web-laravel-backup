<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\Helpers;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Events\NotificationEvent;
use App\Models\RealtimeNotification;
use App\Models\DoctorAppointment;
use App\Models\Doctor;
use App\Models\Service;
use App\Models\Department;
use App\Models\HealthPackage;

class DashboardController extends Controller
{

    public function index()
    {
        $prefix = role() ? role()->prefix : 'admin';
        self::$prefix = $prefix;
        return redirect("{$prefix}/dashboard");
    }

    public function dynamicDashboard()
    {
        switch (role()->prefix) {
            case 'super-admin':
                return $this->superAdmin();
                break;
            case 'admin':
                return $this->admin();
                break;
            case 'account':
                return $this->account();
                break;
        }
        return back();
    }

    public function superAdmin()
    {
        return view('admin.dashboard');
    }

    public function admin()
    {
        $total_appointment = DoctorAppointment::where('status', 1)->count();

        $total_doctors = Doctor::where('status', 1)->count();

        $total_services = Service::where('status', 1)->count();

        $total_departments = Department::where('status', 1)->count();

        $total_health_pckg = HealthPackage::where('status', 1)->count();

        $total_health_insuranace = 0;

        $healthInsurance = dynamicData('healthInsurance');

        if(!empty($healthInsurance)){
            $total_health_insuranace = count($healthInsurance->options);
        }

        return view('admin.dashboard', compact('total_appointment', 'total_doctors', 'total_services', 'total_departments', 'total_health_insuranace', 'total_health_pckg'));
    }


    public function account()
    {
        return view('admin.dashboard');
    }


    // Profile part
    public function profile()
    {
        $session = DB::table('sessions')->where('user_id', user()->id)->get()->last();
        $profile  = ['data' => ['last_active' => $session ? Carbon::createFromTimestamp($session->last_activity)->diffForHumans() : '']];

        switch (role(1)) {
            case in_array(role(1), [1, 2]):
                $profile['data']['user'] = user();
                $profile['view'] = 'profile.admin';
                break;
            case 3:
                $profile['view'] = 'superAdmin.officers.show';
                $profile['data']['officer'] = user()->officer;
                break;
        }
        return view($profile['view'], $profile['data']);
    }
}
