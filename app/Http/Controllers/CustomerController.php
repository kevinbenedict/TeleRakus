<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Models\CallRecord;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $cust = Customer::all();
        return view('cust.index')->with("cust", $cust);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("cust.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cust = new Customer();
        $cust->subscription_id = $request->subscription_id;
        $cust->name = $request->name;
        $cust->phone = $request->phone;
        $cust->save();

        return redirect()->route('allcust');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cust = Customer::find($id);
        return view('cust.detail')->with("cust", $cust);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cust = Customer::find($id);
        return view("cust.edit")->with("cust", $cust);
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
        $cust = Customer::find($id);
        $cust->subscription_id = $request->subscription_id;
        $cust->name = $request->name;
        $cust->phone = $request->phone;
        $cust->update();

        return redirect()->route('allcust');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cust = Customer::find($id);
        $cust->delete();
        return "Customer with id " . $id . " deleted";
    }

    public function callhistory($id)
    {
        $cust_phone = Customer::select('phone')->find($id);
        
        $first = CallRecord::join('customer_detail', 'outgoing_number', '=', 'customer_detail.phone')
                        ->select('customer_detail.name as name', 'duration')
                        ->where('incoming_number', '=', $cust_phone->phone);

        $second = CallRecord::join('customer_detail', 'incoming_number', '=', 'customer_detail.phone')
                        ->select('customer_detail.name as name', 'duration')
                        ->where('outgoing_number', '=', $cust_phone->phone);

        $result = $first->union($second)
                        ->select('name', DB::raw("SUM(duration) as total_duration"))
                        ->groupBy('name')
                        ->orderBy('name')
                        ->get();

        // $result = $first->union($second)
        //                 ->orderBy('name')
        //                 ->get();

        return view("cust.history")->with("result", $result);
    }
}
