<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slider;
use Validator;
use Carbon\Carbon;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $sliders = Slider::all();
        return view('admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title'     => 'required',
            'sub_title' => 'required',
            'image'     => 'required|mimes:jpeg,jpg,png,svg',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        
        // $slider = new Slider();
        // $path = $request->file('image')->store('sliders','public');
        // $slider->title = $request->title;
        // $slider->sub_title = $request->sub_title;
        // $slider->image = $path;
        // $slider->save();
        // return redirect()->route('slider.index');

        // other way to upload img without using file storage
        // we use same validation
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if(isset($image)){
            $currentData = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentData . '-' . uniqid() . '.' .$image->getClientOriginalExtension();
            if(!file_exists('upload/slider')){
                mkdir('upload/slider', 0777 , true);
            }
            $image->move('upload/slider',$imagename);
        }else{
            $imagename='defualt.png';
        }
        $slider = new Slider();
        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        $slider->image = $imagename;
        $slider->save();
        return redirect()->route('slider.index')->with('successC','New Slider successfully Created');
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
        $slider = Slider::find($id);
        return view('admin.slider.edit',compact('slider'));
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
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'sub_title' => 'required',
            'image' => 'mimes:jpeg,jpg,png,svg',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        
        // $slider = new Slider();
        // $path = $request->file('image')->store('sliders','public');
        // $slider->title = $request->title;
        // $slider->sub_title = $request->sub_title;
        // $slider->image = $path;
        // $slider->save();
        // return redirect()->route('slider.index');

        // other way to upload img without using file storage
        // we use same validation
        $slider = Slider::find($id);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if(isset($image)){
            $currentData = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentData . '-' . uniqid() . '.' .$image->getClientOriginalExtension();
            if(!file_exists('upload/slider')){
                mkdir('upload/slider', 0777 , true);
            }
            unlink('upload/slider/'.$slider->image);
            $image->move('upload/slider',$imagename);
        }else{
            $imagename = $slider->image;
        }

        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        $slider->image = $imagename;
        $slider->save();
        return redirect()->route('slider.index')->with('successU','Slider successfully Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        // for deleteing img form dirctory that we save in it 
        if(file_exists('upload/slider/'.$slider->image)){
            unlink('upload/slider/'.$slider->image);
        }
        $slider->delete();
        return redirect()->back()->with('successD','Slider successfully Deleted');
    }
    
}
