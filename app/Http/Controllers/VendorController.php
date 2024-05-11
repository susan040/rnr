<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Models\Order;
use App\Models\Vehicle;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class VendorController extends BaseController
{
    //
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function statusFailed()
    {
        return view('vendors.disapprove');
    }
    public function vendorDashboard()
    {
        $chart_options = [
            'chart_title' => 'Monthly Sales Report',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Order',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'filter_field' => 'created_at',
            'filter_days' => 30,
            'aggregate_function' => 'sum',
            'aggregate_field' => 'total_price',
            'chart_type' => 'line',
            'where_raw'          => 'vendor_id = ' . auth()->id()
        ];

        $chart1 = new LaravelChart($chart_options);

        $chart_options = [
            'chart_title' => 'Orders by months',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Order',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
            'where_raw' => 'vendor_id = ' . auth()->id()
        ];

        $chart2 = new LaravelChart($chart_options);


        $chart_options = [
            'chart_height' => '200px',
            'chart_title' => 'Orders By Payment Status',
            'report_type' => 'group_by_string',
            'model' => 'App\Models\Order',
            'group_by_field' => 'payment_method',
            'chart_type' => 'pie',
            'filter_field' => 'created_at',
            'group_by_period' => 'month',
            'aggregate_function' => 'count',
            'date_format' => 'Y M d',
            'where_raw' => 'vendor_id = ' . auth()->id()
        ];

        $chart3 = new LaravelChart($chart_options);

        $chart_options = [
            'chart_height' => '200px',
            'chart_title' => 'Orders By Status',
            'report_type' => 'group_by_string',
            'model' => 'App\Models\Order',
            'group_by_field' => 'status',
            'chart_type' => 'pie',
            'filter_field' => 'created_at',
            'group_by_period' => 'month',
            'aggregate_function' => 'count',
            'date_format' => 'Y M d',
            'where_raw'          => 'vendor_id = ' . auth()->id()
        ];

        $chart4 = new LaravelChart($chart_options);


        $vechicles = Vehicle::where('user_id', auth()->id())->count();
        $orders = Order::where('vendor_id', auth()->id())->count();
        $sales = Order::where('vendor_id', auth()->id())->sum('total_price');

        return view('layouts.vendor', [
            'chart1' => $chart1,
            'chart2' => $chart2,
            'chart3' => $chart3,
            'chart4' => $chart4,
            'vehicles' => $vechicles,
            'orders' => $orders,
            'sales' => $sales
        ]);
    }

    // public function getAddVehicle()
    // {
    //     $categories = Category::all();
    //     return view('vendors.vehicles.index', compact('categories'));
    // }


    // public function postAddVehicle(Request $request)
    // {

    //     $vehicle = new Vehicle();
    //     $vehicle->vehicle_name = $request->input('vehicle_name');
    //     $vehicle->brand_name = $request->input('brand');
    //     $vehicle->category_id = $request->input('category_id');
    //     $vehicle->color = $request->input('color');
    //     $vehicle->mileage = $request->input('mileage');
    //     $vehicle->trasmission_type = $request->input('transmission_type');
    //     $vehicle->fuel_type = $request->input('fuel_type');
    //     $vehicle->seat = $request->input('seat');
    //     $vehicle->cost_per_hour = $request->input('cost');
    //     $vehicle->vehicle_number = $request->input('vehicle_number');
    //     $vehicle->vehicle_description = $request->input('decription');
    //     $vehicle->user_id = auth()->user()->id;

    //     if ($request->hasFile('image') && $request->image != '') {
    //         $file = $request->file('image');
    //         $extension = $file->getClientOriginalExtension();
    //         $filename = time() . '.' . $extension;

    //         $filename = ImageHelper::saveImage($file, '/vehicles', $filename);
    //         $vehicle->image = $filename;
    //     }

    //     $vehicle->save();

    //     return redirect()->route('vendor.vehicles')->with('status', 'Vehicle added successfully!');
    // }

    public function sales()
    {
        return view('vendors.vehicles.sales');
    }
    // public function history()
    // {
    //     return view('vendors.vehicles.history');
    // }
    public function profile()
    {
        return view('vendors.profile.profile');
    }
}