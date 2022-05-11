<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Governorate;
use Facade\FlareClient\Glows\Recorder;
use Illuminate\Http\Request;

class GovernorateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recordS=Governorate::paginate(20);
        return view('governorate.index',compact('recordS'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('governorate.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $rules=[
        //     'name'=>'requierd|unique:Governorate'
        // ];
        // $massages=[
        //     'name.requiers'=>'name is Requierd'
        // ];
        // $this->validate($request,$rules);في خطأ هنا انا مش عارف هو ليه اسأل عنو
        $this->validate($request, [
            'name' => 'required|unique:governorates',
        ]);
        $record=Governorate::create($request->all());
        return redirect(route('governorate.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cities=City::all()->where('governorate_id',$id);
        return view('governorate.showCities',compact('cities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model=Governorate::findorfail($id);
        return view('governorate.edit',compact('model'));
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
        $record =Governorate::findorfail($id);
        $record->update($request->all());
        return redirect(route('governorate.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Governorate::findorfail($id);
        $record->delete();
        return back();
    }
}
