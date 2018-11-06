<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $records=Article::paginate(20);
      return view('posts.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
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
        'text'=>'required',
        'client_id'=>'required',

      ];
      $message=[
        'text.required'=>'text is required'

      ];
      $this->validate($request,$rules,$message);


      // $record =new Governorate;
      // $record->name =$request->input('name');
      // $record->save();
      $record=Article::create($request->all());
      flash()->success("success");
      return redirect(route('post.index'));

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
      $model=Article::findOrFail($id);
      return view('posts.edit',compact('model'));
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
      $record=Article::findOrFail($id);
      $record->update($request->all());
      flash()->success("Edited");
      return redirect(route('post.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $record=Article::findOrFail($id);
      $record->delete();
      flash()->success("Deleted");
      return redirect(route('post.index'));
    }
}
