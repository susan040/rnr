<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\Category;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends BaseController
{
    //
    public function allVehicle()
    {
        try {
            $vehicle = Vehicle::all();
            return response()->json([
                'status' => true,
                'data' => ['vehicles' => $vehicle]
            ], 201);
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    public function aboutUs()
    {
        try {
            $vehicle = Vehicle::count();
            $users = User::count();
            $category = Category::count();
            return response()->json([
                'status' => true,
                'data' => [
                    'vehicles' => $vehicle,
                    'users' => $users,
                    'category' => $category,
                ]
            ], 201);
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }
}