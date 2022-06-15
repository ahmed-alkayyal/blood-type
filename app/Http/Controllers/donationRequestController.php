<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\BloodType;
use App\Models\Client;
use App\Models\DonationRequest;

class donationRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $city=City::pluck('name','id')->toArray();
        $bloodtype=BloodType::pluck('name','id')->toArray();
        $client=Client::pluck('name','id')->toArray();
        return view('donationrequest.create',compact('city','bloodtype','client'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'patient_name'                  =>'required ',
            'patient_phone'                 =>'required',
            'hospital_name'                 =>'required',
            'hospital_address'              =>'required',
            'patient_age'                   =>'required',
            'bags_num'                      =>'required',
            'city_id'                       =>'required|exists:cities,id',
            'blood_type_id'                 =>'required|exists:blood_types,id',
            'client_id'                     =>'required|exists:clients,id',
            'details'                       =>'required',
            'latitude'                      =>'required',
            'longitude'                     =>'required',
        ];
        $this->validate($request,$rules);
        $record=DonationRequest::create($request->all());
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
