<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\BaseController;
use App\Models\Category;
use App\Models\Vehicle;

use App\Helpers\ImageHelper;

class VehicleController extends BaseController
{
    public function __construct()
    {
        $this->title = 'Vehicle';
        $this->resources = 'admin.vehicle.';
        parent::__construct();
        $this->route = 'admin.vehicles.';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //
        $data = $this->crudInfo();
        $data['hideCreate'] = true;
        $data['hideEdit'] = true;
        $data['vehicles'] = Vehicle::all();

        return view($this->indexResource(), $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        $data = $this->crudInfo();
        return view($this->createResource(), $data, compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vehicle = new Vehicle();
        $vehicle->vehicle_name = $request->input('vehicle_name');
        $vehicle->brand_name = $request->input('brand');
        $vehicle->category_id = $request->input('category_id');
        $vehicle->color = $request->input('color');
        $vehicle->mileage = $request->input('mileage');
        $vehicle->trasmission_type = $request->input('transmission_type');
        $vehicle->fuel_type = $request->input('fuel_type');
        $vehicle->seat = $request->input('seat');
        $vehicle->cost_per_hour = $request->input('cost');
        $vehicle->vehicle_number = $request->input('vehicle_number');
        $vehicle->vehicle_description = $request->input('decription');
        $vehicle->user_id = auth()->user()->id;

        if ($request->hasFile('image') && $request->image != '') {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;

            $filename = ImageHelper::saveImage($file, '/vehicles', $filename);
            $vehicle->image = $filename;
        }
        $vehicle->save();
        return redirect()->route($this->indexRoute())->with('success', 'User added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        //

        $data = $this->crudInfo();
        $data['item'] = $vehicle;

        $data['hideEdit'] = true;
        return view($this->showResource(), $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        //
        if ($vehicle->image != '') {
            ImageHelper::deleteImage($vehicle->image);
        }
        $vehicle->delete();

        return redirect()->route($this->indexRoute())->with('delete', 'Vehicle deleted successfully!');
    }
}