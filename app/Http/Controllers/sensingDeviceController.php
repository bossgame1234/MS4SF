<?php

namespace App\Http\Controllers;

use App\SensingDevice;
use App\Sensor;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class sensingDeviceController extends Controller
{
    public function index(){
        $device = SensingDevice::all();
        return $device;
    }
    public function store(Request $request)
    {
        $device = new SensingDevice();
        $device->device_id = $request->input('device_id');
        $device->save();
        return $device;
    }

    public function show($id)
    {
        $device = SensingDevice::where('device_id','like',$id)->first();
        return $device;
    }

    public function edit($id)
    {
        $device= SensingDevice::where('plot_id','like',$id)->get();
        return $device;////
    }

    public function destroy($id)
    {
        $device = SensingDevice::find($id);
        $device->delete();
        return $id;
    }
    public function update($id,Request $request)
    {
        $device = SensingDevice::where('device_id','=',$id)->first();
        $device->plot_id = $request->input('plot_id');
        $device->save();
        return $device;
    }
    public function removePlotFromDevice($id)
    {
       $device = SensingDevice::find($id);
        $device->plot_id = 0;
        $device->save();
        return $device;
    }
}

