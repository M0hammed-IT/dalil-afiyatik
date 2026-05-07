<?php
namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function book(Request $request)
    {
        // ... نفس كود الحجز (bookAppointment) الذي أرسلته ...
    }

    public function track(Request $request)
    {
        // ... نفس كود تتبع الطابور (trackQueue) الذي أرسلته ...
    }
}