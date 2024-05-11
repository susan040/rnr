<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\BaseController;
use App\Models\Category;
use App\Models\Vehicle;
use Illuminate\Http\Request;

use App\Helpers\ImageHelper;

class VehicleController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->title = 'Vehicle';
        $this->resources = 'vendors.vehicles.';
        parent::__construct();
        $this->route = 'vendor.vehicles.';
    }

    public function index()
    {
        // dd("hello world");

        $data = $this->crudInfo();
        $data['vehicles'] = Vehicle::where('user_id', auth()->user()->id)->get();

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
        //
        $request->validate([
            'vehicle_name' => 'required',
            'brand' => 'required',
            'category_id' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png|max:10000',
            
        ]);

        $vehicle = new Vehicle();
        $vehicle->vehicle_name = $request->input('vehicle_name');
        $vehicle->brand_name = $request->input('brand');
        $vehicle->category_id = $request->input('category_id');
        $vehicle->color = $request->input('color');
        $vehicle->mileage = $request->input('mileage');
        $vehicle->transmission_type = $request->input('transmission_type');
        $vehicle->fuel_type = $request->input('fuel_type');
        $vehicle->seat = $request->input('seat');
        $vehicle->cost_per_hour = $request->input('cost');
        $vehicle->vehicle_number = $request->input('vehicle_number');
        $vehicle->vehicle_description = $request->input('description');
        $vehicle->document_required = $request->input('document_required');
        $vehicle->user_id = auth()->user()->id;

        if ($request->hasFile('image') && $request->image != '') {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;

            $filename = ImageHelper::saveImage($file, '/vehicles', $filename);
            $vehicle->image = $filename;
        }
        $vehicle->save();

        return redirect()->route($this->indexRoute())->with('success', 'Vehicle added successfully!');
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
        return view($this->showResource(), $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        //
        $data = $this->crudInfo();
        $data['item'] = $vehicle;
        $data['categories'] = Category::all();
        return view($this->editResource(), $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {

        $request->validate([
            'vehicle_name' => 'required',
            'brand' => 'required',
            'category_id' => 'required',
            'image' => 'mimes:jpeg,jpg,png|max:10000',
        ]);
        //
        // $product->category= $request->input('category');
        $vehicle->vehicle_name = $request->input('vehicle_name');
        $vehicle->brand_name = $request->input('brand');
        $vehicle->category_id = $request->input('category_id');
        $vehicle->color = $request->input('color');
        $vehicle->mileage = $request->input('mileage');
        $vehicle->transmission_type = $request->input('transmission_type');
        $vehicle->fuel_type = $request->input('fuel_type');
        $vehicle->seat = $request->input('seat');
        $vehicle->cost_per_hour = $request->input('cost');
        $vehicle->status = $request->input('status');
        $vehicle->vehicle_number = $request->input('vehicle_number');
        $vehicle->vehicle_description = $request->input('decription');
        $vehicle->document_required = $request->input('document_required');
        $vehicle->user_id = auth()->user()->id;

        if ($request->hasFile('image') && $request->image != '') {
            ImageHelper::deleteImage($vehicle->image);
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;

            $filename = ImageHelper::saveImage($file, '/vehicles', $filename);
            $vehicle->image = $filename;
        }
        $vehicle->save();

        return redirect()->route($this->indexRoute())->with('success', 'Vehicle Edited successfully!');
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