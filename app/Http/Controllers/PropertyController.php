<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;
use Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use \Input as Input;
use Carbon\Carbon;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get a list of all properties
        $properties = Property::orderBy('created_at','desc')->paginate(10);

        return view('properties.listproperties',['properties'=>$properties]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //New Property form
        return view('properties.addproperty');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate request values
        $this->validate($request,[
          'name'=>'required',
          'client'=>'required',
          'sale_type'=>'required',
          'date_registered'=>'required',
          'deal_status'=>'required',
        ]);

        $property = new Property;

        //Retrieve uploaded image and move it to propertyimages folder
        if(Input::hasFile('image')){
          $file = Input::file('image');
          $image_link = $file->getClientOriginalName();
          $file->move('propertyimages', $image_link);
          $property->image = $image_link;
        }

        $property->name = $request['name'];
        $property->client = $request['client'];
        $property->sale_type = $request['sale_type'];
        $property->date_registered = $request['date_registered'];
        $property->deal_status = $request['deal_status'];
        $property->review = $request['review'];
        if(Auth::user()){
          $property->user_id = Auth::user()->id;
        }

        $property->save();

        return redirect()->route('list_property');
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
        //Fetch the property to be edited
        $property = Property::find($id);

        return view('properties.editproperty',['property'=>$property]);
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
        //Validate request values
        $this->validate($request,[
          'name'=>'required',
          'client'=>'required',
          'sale_type'=>'required',
          'date_registered'=>'required',
          'deal_status'=>'required',
        ]);

        $property = Property::find($id);
        
        //Retrieve uploaded image and move it to propertyimages folder
        if(Input::hasFile('image')){
          $file = Input::file('image');
          $image_link = $file->getClientOriginalName();
          $file->move('propertyimages', $image_link);
          $property->image = $image_link;
        }



        $property->name = $request['name'];
        $property->client = $request['client'];
        $property->sale_type = $request['sale_type'];
        $property->date_registered = $request['date_registered'];
        $property->deal_status = $request['deal_status'];
        $property->review = $request['review'];
        if(Auth::user()){
          $property->user_id = Auth::user()->id;
        }

        $property->update();

        return redirect()->route('list_property');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Delete a property. Property id must be passed to this fann_get_cascade_output_change_fraction
        Property::find($id)->delete();

        return back();
    }
}
