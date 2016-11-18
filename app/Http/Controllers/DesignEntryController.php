<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\DesignEntry;
use Illuminate\Support\Facades\Storage;
use App\Voter;

class DesignEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $results = DesignEntry::all();
        // $results->voters;
        foreach ($results as $key => $value) {
          $results[$key]['votes'] = $value->votes;
        }
        return response()->json($results);
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
        //recieve all inpu and send them back for timestamps
        //$request->all();

        //find all files in if
        if($request->file('front')->isValid() && $request->file('side')->isValid() && $request->file('back')->isValid()){
          //on found set src, address and filename
          //storing using design_entry_somename_somenumber.someextension
          $front_filename = sprintf('design_entry-front-%s-%s.%s',$request->input('designer'),DesignEntry::all()->count(),$request->file('front')->extension());
          $side_filename = sprintf('design_entry-side-%s-%s.%s',$request->input('designer'),DesignEntry::all()->count(),$request->file('side')->extension());
          $back_filename = sprintf('design_entry-back-%s-%s.%s',$request->input('designer'),DesignEntry::all()->count(),$request->file('back')->extension());
          $location = 'storage';

          $path_front = $request->file('front')->move($location,$front_filename);
          $path_side = $request->file('side')->move($location,$side_filename);
          $path_back = $request->file('back')->move($location,$back_filename);
          // return response()->json([$path_front,$path_back,$path_side]);

          //now we insert vals into the db
          $nEntry = new DesignEntry();
          $nEntry->designer = $request->input('designer');
          $nEntry->email = $request->input('email');
          $nEntry->phone = $request->input('phone');
          $nEntry->description = $request->input('description');
          $nEntry->src_front = asset('storage/'.$front_filename);
          $nEntry->filename_front =  $front_filename;
          $nEntry->address_front = $path_front;
          $nEntry->src_side = asset('storage/'.$side_filename);
          $nEntry->filename_side = $side_filename;
          $nEntry->address_side = $path_side;
          $nEntry->src_back = asset('storage/'.$back_filename);
          $nEntry->filename_back = $back_filename;
          $nEntry->address_back = $path_back;

          $nEntry->save();

          return response()->json($nEntry);
        }else{
          return abort(403,'failed file inserton');
        }



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
        $result = DesignEntry::find($id);
        $result->votes = $result->votes;
        return response()->json($result);
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
