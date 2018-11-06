<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $records=Report::paginate(20);
      return view('reports.index',compact('records'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $record=Report::findOrFail($id);
      $record->delete();
      flash()->success("Deleted");
      return redirect(route('report.index'));
    }
}
