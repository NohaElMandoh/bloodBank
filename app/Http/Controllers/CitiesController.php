<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Citiy;
class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $records=Citiy::paginate(20);
      return view('cities.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Cities.create');
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
        'name'=>'required',
        'governorate_id'=>'required'

      ];
      $message=[
        'name.required'=>'name is required',
        'governorate_id.required'=>'governorate_id is required'
      ];
      $this->validate($request,$rules,$message);
      $record=Citiy::create($request->all());
      flash()->success("success");
      return redirect(route('city.index'));
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
      $model=Citiy::findOrFail($id);
      return view('cities.edit',compact('model'));
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
      $record=Citiy::findOrFail($id);
      $record->update($request->all());
      flash()->success("Edited");
      return redirect(route('city.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $record=Citiy::findOrFail($id);
      $record->delete();
      flash()->success("Deleted");
      return redirect(route('city.index'));
    }
}
