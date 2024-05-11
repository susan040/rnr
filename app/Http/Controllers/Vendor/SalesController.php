<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\BaseController;
use App\Models\Order;

class SalesController extends BaseController
{

    public function __construct()
    {
        $this->title = 'Orders';
        $this->resources = 'vendors.order.';
        parent::__construct();
        $this->route = 'vendor.orders.';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $data = $this->crudInfo();
        $data['hideCreate'] = true;

        $data['hideDelete'] = true;
        $data['hideEdit'] = true;
        $data['vehicles'] = Order::where('vendor_id', auth()->user()->id)->get();
        // dd($data['vehicles']);
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //

        $data['hideDelete'] = true;
        $data['hideEdit'] = true;
        $data = $this->crudInfo();
        $data['item'] = $order;

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


        // $itemId = $request->input('item_id');
        // $transmissionType = $request->input('transmission_type');

        // if ($transmissionType == 'active') {
        //     print("hello");
        // } elseif ($transmissionType == 'inactive') {
        //     print("hello2");
        // }

        // // update the $item status in the database
        // $item = Order::find($itemId);
        // $item->status = $transmissionType;
        // $item->save();
        // return redirect()->route($this->indexRoute())->with('success', 'Order updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
