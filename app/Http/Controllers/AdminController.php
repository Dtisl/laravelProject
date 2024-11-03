<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentRequest;
use App\Http\Requests\MasterRequest;
use App\Models\Appointment;
use App\Models\Master;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
class AdminController extends Controller
{
    public function showAdmin(): View
    {
        $masters = Master::all();
        return view('admin.admin', ['masters' => $masters]);
    }

    public function deleteMaster(Master $master): RedirectResponse
    {
        $master->delete();
        return redirect()->route('admin.view')->with('success', 'Мастер успешно удален.');
    }

    public function addMaster(MasterRequest $request): RedirectResponse
    {
        $dataMaster = $request->validated();

        Master::create([
            'name' => $dataMaster['name'],
            'specialization' => $dataMaster['specialization'],
        ]);

        return redirect()->route('admin.view')->with('success', 'Мастер успешно добавлен!');
    }




    public function showMasterAppointment(Master $master): View
    {
        $appointments = Appointment::where('master_id', $master->id)->where('busy', '0')->get();
        return view('admin.masterAppointment', ['appointments' => $appointments, 'master' => $master]);
    }

    public function deleteAppointment(Appointment $appointment): RedirectResponse
    {
        $masterId = $appointment->master_id;
        $appointment->delete();
        return redirect()->route('master.appointment', [$masterId])->with('success', 'Запись успешно удалена.');
    }

    public function addAppointment(AppointmentRequest $request, Master $master) :RedirectResponse
    {

        $dataAppointment = $request->validated();
        Appointment::create([
            'master_id' => $master->id,
            'date' => $dataAppointment['date'],
            'time' => $dataAppointment['time'],
            'busy' => 0,
        ]);

        return redirect(route('master.appointment', ['master'=>$master->id]))->with('success', 'Время успешно добавлено!');
    }

}
