<?php

namespace App\Http\Controllers;

use App\Models\VehicleModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehicleController extends Controller
{
    public function registerVehicle(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'vehiclenumberplate' => 'required',
            'vehicletype' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'validator_errors' => $validator->errors(),
            ]);
        } else {

            VehicleModel::create([
                'vehiclenumberplate' => $request->vehiclenumberplate,
                'vehicletype' => $request->vehicletype,
            ]);

            return response()->json([
                'status' => 200,
            ]);
        }
    }

    // public function updateService(Request $request)
    // {
    //     $services = DB::table('services')->where('serviceid', $request->serviceid)->update([
    //         'servicename' => $request->servicename,
    //         'servicetype' => $request->servicetype,
    //         'servicedescription' => $request->servicedescription
    //     ]);
    //     return response()->json([
    //         'status' => 200,
    //         'services'=>$services,
    //         'message' => 'Service Updated Successful'
    //     ]);
    // }



    public function updateVehicle(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'vehiclenumberplate' => 'required',
            'vehicletype' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'validator_errors' => $validator->errors(),
            ]);
        } else {
            DB::table('vehicles')->where('vehicleid', $request->vehicleid)->update([
                'vehiclenumberplate' => $request->vehiclenumberplate,
                'vehicletype' => $request->vehicletype,
            ]);

            return response()->json([
                'status' => 200,
            ]);
        }
    }


    public function getVehicles()
    {
        $vehicles = VehicleModel::get();

        return response()->json([
            'status' => 200,
            'vehicles' => $vehicles,
        ]);
    }


    public function getVehicleByID($id)
    {
        $vehicle = VehicleModel::where('vehicleid', $id)
            ->get();

        return response()->json([
            'status' => 200,
            'vehicle' => $vehicle,
        ]);
    }


    public function deletevehicle(Request $request)
    {
        DB::table('vehicles')->where('vehicleid', $request->vehicleid)->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Vehicle Deleted Successful'
        ]);
    }
}
