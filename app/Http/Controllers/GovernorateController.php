<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Governorate;

class GovernorateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $records=Governorate::paginate(20);
        return view('Governorates.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('Governorates.create');

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
          'name'=>'required'

        ];
        $message=[
          'name.required'=>'name is required'

        ];
        $this->validate($request,$rules,$message);


        // $record =new Governorate;
        // $record->name =$request->input('name');
        // $record->save();
        $record=Governorate::create($request->all());
        flash()->success("success");
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
      $model=Governorate::findOrFail($id);
      return view('governorates.edit',compact('model'));
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
      $record=Governorate::findOrFail($id);
      $record->update($request->all());
      flash()->success("Edited");
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
      $record=Governorate::findOrFail($id);
      $record->delete();
      flash()->success("Deleted");
      return redirect(route('governorate.index'));
    }
}
