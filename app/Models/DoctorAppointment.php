<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class DoctorAppointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'patient_id',
        'day',
        'time',
        'description',
        'options',
        'status',
    ];

    protected $casts = [
        'day' => 'date:d/m/Y',
        'time' => 'datetime:h:ia',
    ];

    private function processBeforeAction($appointmentModal)
    {
        $appointmentModal->day = $appointmentModal->day->format('Y-m-d H:i:s');
        $appointmentModal->time = $appointmentModal->time->format('H:i:s');
        return $appointmentModal;
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            return $model->processBeforeAction($model);
        });

        self::updating(function ($model) {
            return $model->processBeforeAction($model);
        });
    }

    public function doctor() {
        return $this->belongsTo(Doctor::class, 'doctor_id', 'id');
    }
    public function patient() {
        return $this->belongsTo(Patient::class, 'patient_id', 'id');
    }
}
