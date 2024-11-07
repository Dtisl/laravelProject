<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;


class ProfileController extends Controller
{
    public function showProfile(): View
    {
        $user = auth()->user();
        $appointments = Appointment::where('user_id', $user->id)
            ->with('master')
            ->get();

        return view('profile.profile', [
            'appointments' => $appointments,
        ]);
    }

    public function showAppointment(): View
    {
        $appointments = Appointment::where('busy', 0)->with('master')->get();

        return view('profile.appointment', [
            'appointments' => $appointments,
        ]);
    }

    public function deleteProfileAppointment($appointmentid): RedirectResponse
    {
        $appointment = Appointment::find($appointmentid);
        if ($appointment) {
            $appointment->update([
                'user_id' => null,
                'busy' => 0
            ]);
        }

        return redirect()
            ->route('profile.view')
            ->with('success', 'Запись успешно отменена!');
    }

    public function createProfileAppointment($appointmentid): RedirectResponse
    {
        $user = auth()->user();
        $appointment = Appointment::find($appointmentid);
        if ($appointment) {
            $appointment->update([
                'user_id' => $user->id,
                'busy' => 1,
            ]);
        }

        return redirect()
            ->route('profile.view')
            ->with('success', 'Вы успешно записались!');
    }
}
