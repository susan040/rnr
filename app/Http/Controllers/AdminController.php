<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Models\Category;
use App\Models\Order;
use App\Models\User;
use App\Models\Vehicle;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class AdminController extends BaseController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function adminDashboard()
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
        ];

        $chart1 = new LaravelChart($chart_options);

        $chart_options = [
            'chart_title' => 'Orders by months',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Order',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
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
        ];

        $chart4 = new LaravelChart($chart_options);


        $vechicles = Vehicle::count();
        $orders = Order::count();
        $users = User::count();
        $category = Category::count();
        $sales = Order::sum('total_price');
        $vendors = User::where('type', "vendor")->count();
        $customers = User::where('type', "user")->count();

        return view('admin.home', [
            'chart1' => $chart1,
            'chart2' => $chart2,
            'chart3' => $chart3,
            'chart4' => $chart4,
            'vehicles' => $vechicles,
            'orders' => $orders,
            'sales' => $sales,
            'users' => $users,
            'category' => $category,
            'vendors' => $vendors,
            'customers' => $customers,
        ]);
    }
}