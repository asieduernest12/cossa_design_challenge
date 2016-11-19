<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\DesignEntry;
use Illuminate\Support\Facades\Storage;
use App\Voter;
// use Intervention\Image\Image as Image;
use Intervention\Image\ImageManagerStatic as Image;
// use Intervention\Image\Facades\Image;
// use Intervention\Image\Facades\Image;

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

          //resize Image
          $heigth = 600; $width=800;
          Image::make($nEntry->address_front)->resize($width,$heigth)->save($nEntry->address_front);
          Image::make($nEntry->address_back)->resize($width,$heigth)->save($nEntry->address_back);
          Image::make($nEntry->address_side)->resize($width,$heigth)->save($nEntry->address_side);

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

    public function resizeAll(){
      //load all entries and resize images


      //load File
      $front=0; $back=0;$side=0;
      $width = 800; $heigth = 600;
      foreach (DesignEntry::all() as $de) {

        printf('===============Found: front: str%s find:%s Back: str%s  find%s   side: str %s  find%s',
        strlen($de->address_front) , Storage::exists($de->address_front),
        strlen($de->address_back) ,Storage::exists($de->address_back),
        strlen($de->address_side) ,Storage::exists($de->address_side));

        if( strlen($de->address_front)  ){
          Image::make($de->address_front)->resize($width,$heigth)->save($de->address_front);
          $front++;
        }

        if(strlen($de->address_back)){
          Image::make($de->address_back)->resize($width,$heigth)->save($de->address_back);
          $back++;
        }

        if(strlen($de->address_side)){
          Image::make($de->address_side)->resize($width,$heigth)->save($de->address_side);
          $side++;
        }


      }

      return response()->json(['front'=>$front,'back'=>$back,'side'=>$side]);
    }
}
