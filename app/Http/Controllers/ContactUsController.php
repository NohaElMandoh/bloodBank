<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactUs;

class ContactUsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $records=ContactUs::paginate(20);
    return view('contactUs.index',compact('records'));
  }


  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $record=ContactUs::findOrFail($id);
    $record->delete();
    flash()->success("Deleted");
    return redirect(route('contactus.index'));
  }
}
