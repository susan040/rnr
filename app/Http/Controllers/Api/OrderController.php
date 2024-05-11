<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Support\Facades\Validator;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Carbon\Carbon;


class OrderController extends BaseController
{


    public function getAllVehicle1(Request $request)
    {
        $request->validate([
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        // New Search Query

        $dates = [
            date('Y-m-d H:i:s', strtotime($request->start_date)),
            date('Y-m-d H:i:s', strtotime($request->end_date)),
        ];

        $vehicles = Vehicle::whereDoesntHave('orders', function ($orders) use ($dates) {
            $orders->where(function ($order) use ($dates) {
                $order->where(function ($q) use ($dates) {
                    $q->where('start_date', '>=', $dates[0])
                        ->where('start_date', '<=', $dates[1]);
                })->orWhere(function ($q) use ($dates) {
                    $q->whereBetween('start_date', $dates)
                        ->whereBetween('end_date', $dates);
                })->orWhere(function ($q) use ($dates) {
                    $q->where('start_date', '<=', $dates[0])
                        ->where('end_date', '>=', date('Y-m-d H:i:s', strtotime($dates[0] . ' + 1 minute')));
                });
            });
        })->with('user');



        if ($request->has('category_id')) {
            $vehicles->whereIn('category_id', $request->category_id);
        }

        if ($request->has('search')) {
            $vehicles->where('vehicle_name', 'like', '%' . $request->search . '%');
        }
        if ($request->has('sort_type')) {
            if ($request->type == "ascending") {
                $vehicles->orderBy('cost_per_hour', 'Asc');
            } else if ($request->type == "descending") {
                $vehicles->orderBy('cost_per_hour', 'Desc');
            } else {
                if ($request->category_id) {

                    $vehicles->where('category_id', $request->category_id);

                    if ($request->order_by == 'asc') {
                        $vehicles->orderBy('cost_per_hour', 'Asc');
                    } else if ($request->order_by == 'desc') {
                        $vehicles->orderBy('cost_per_hour', 'Desc');
                    }
                }
            }
        }

        $vehicles = $vehicles->get();

        return response([
            'status' => true,
            "data" => $vehicles
        ]);
    }




    public function getAllVehicle(Request $request)
    {
        $request->validate([
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        $dates = [
            date('Y-m-d H:i:s', strtotime($request->start_date)),
            date('Y-m-d H:i:s', strtotime($request->end_date)),
        ];
        $vehicles = Vehicle::whereDoesntHave('orders', function ($orders) use ($dates) {
            $orders->where(function ($order) use ($dates) {
                $order->where('status', '=', 'active')
                    ->where(function ($q) use ($dates) {
                        $q->where(function ($q2) use ($dates) {
                            $q2->where('start_date', '>=', $dates[0])
                                ->where('start_date', '<=', $dates[1]);
                        })->orWhere(function ($q2) use ($dates) {
                            $q2->whereBetween('start_date', $dates)
                                ->whereBetween('end_date', $dates);
                        })->orWhere(function ($q2) use ($dates) {
                            $q2->where('start_date', '<=', $dates[0])
                                ->where('end_date', '>=', date('Y-m-d H:i:s', strtotime($dates[0] . ' + 1 minute')));
                        });
                    });
            });
        })->with('user');

        $vehicles->where('status', '!=', 'unavailable');

        if ($request->has('category_id')) {
            $vehicles->whereIn('category_id', $request->category_id);
        }

        if ($request->has('search')) {
            $vehicles->where('vehicle_name', 'like', '%' . $request->search . '%');
        }
        if ($request->has('sort_type')) {
            if ($request->sort_type == "ascending") {
                $vehicles->orderBy('cost_per_hour', 'asc');
            } else if ($request->sort_type == "descending") {
                $vehicles->orderBy('cost_per_hour', 'desc');
            }
        }
        $vehicles = $vehicles->get();

        return response([
            'status' => true,
            "data" => $vehicles
        ]);
    }


    public function postOrder(Request $request)
    {
        try {
            $user = auth()->user();
            $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
                'vehicle_id' => 'required',
                'vendor_id' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'total_price' => 'required',
                'quantity' => 'required',

            ]);
            if ($validator->fails()) {
                $response['message'] = $validator->messages()->first();
                $response['status'] = false;
                return $response;
            } else {
                $order = new Order([
                    'user_id' => $user->id,
                    'vendor_id' => $request->vendor_id,
                    'vehicle_id' => $request->vehicle_id,
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date,
                    'order_type' => $request->order_type,
                    'payment_method' => $request->payment_method,
                    'total_price' => $request->total_price,
                    'quantity' => $request->quantity,
                    'order_time' => $request->order_time,
                ]);
                $order->save();

                $payment = new Payment([
                    'user_id' => $user->id,
                    'transaction_id' => $request->transaction_id,
                    'amount' => $request->amount,
                    'payment_method' => $request->payment_method,
                    'order_id' => $order->id,
                ]);
                $payment->save();
                $order->update();
                return response()->json([
                    'status' => true,
                    'message' => 'Order added successfully.',
                    'data' => [
                        'order' => $order,
                    ]
                ]);
            }
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }


    public function verifyPayment(Request $request)
    {
        $token = $request->token;
        $amount = $request->amount;

        $args = http_build_query(array(
            'token' => $token,
            'amount'  => $amount
        ));

        $url = "https://khalti.com/api/v2/payment/verify/";

        # Make the call using API.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $headers = ['Authorization: Key test_secret_key_37e47644e0be4e2590ca7134949f7305'];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // Response
        $response = curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return $response;
    }



    public function viewOrder(Request $request)
    {
        try {
            $query = (new Order)->newQuery();

            if ($request->has('order_status')) {
                $query->where('status', $request->input('order_status'));
            }

            // Filter by date range
            if ($request->has('date_type')) {
                $dateType = $request->input('date_type');
                switch ($dateType) {
                    case 'week':
                        $query->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
                        break;
                    case 'month':
                        $query->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()]);
                        break;
                    case 'three_months':
                        $query->whereBetween('created_at', [Carbon::now()->subMonths(3)->startOfDay(), Carbon::now()->endOfDay()]);
                        break;
                    case 'year':
                        $query->whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()]);
                        break;
                }
            }

            $query->where('user_id', auth()->user()->id);

            $data['orders'] = $query->with('vehicle', 'vendor')->get();

            return response()->json([
                'status' => true,
                'data' => $data,
            ], 201);
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }




    public function viewCommingOrder()
    {
        try {
            $orders = Order::where('user_id', auth()->user()->id)
                ->where('status', '!=', 'cancel')
                ->where('start_date', '>', now()->addMinutes(15))
                ->with('vehicle', 'vendor')
                ->get();
            return response()->json([
                'status' => true,
                'data' => $orders,
            ], 201);
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    public function onGoingOrder()
    {
        try {
            $orders = Order::where('user_id', auth()->user()->id)
                ->where('status', '!=', 'cancel')
                ->where('start_date', '<=', now()->addMinutes(15))
                ->where('end_date', '>=', now())
                ->with('vehicle', 'vendor')
                ->get();
            return response()->json([
                'status' => true,
                'data' => $orders,
            ], 201);
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }


    public function cancelOrder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'order_id' => 'required',
        ]);
        if ($validator->fails()) {
            $response['message'] = $validator->messages()->first();
            $response['status'] = false;
            return $response;
        }
        try {
            $order = Order::find($request->order_id);
            if ($order) {
                $order->status = 'cancel';
                $order->save();
                return response()->json([
                    'status' => true,
                    'message' => 'Order cancelled successfully',
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Order not found',
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}