<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;
use App\Category;
use Validator;
use Carbon\Carbon;
use DB;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return view('admin.item.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.item.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category'      => 'required',
            'name'          => 'required',
            'description'   => 'required',
            'price'         => 'required|numeric',
            'image'         => 'required|mimes:jpeg,png,jpg',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $image = $request->file('image');
        $slug = str_slug($request->name);
        if(isset($image)) {
            $currentData = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentData . '-' . uniqid(). '.' . $image->getClientOriginalExtension();
            if(!file_exists('upload/item')){
                mkdir('upload/item',0777,true);
            }
            $image->move('upload/item',$imagename);
        }else{
            $imagename = 'default.png';
        }

        $item = new Item;
        $item->category_id = $request->category;
        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->image = $imagename;
        $item->save();
        return redirect()->route('item.index')->with('successC','Item Successfully Created');
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
        $item = Item::find($id);
        $categories = Category::all();
        return view('admin.item.edit',compact('item','categories'));
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
        $validator = Validator::make($request->all(), [
            'category'      => 'required',
            'name'          => 'required',
            'description'   => 'required',
            'price'         => 'required|numeric',
            'image'         => 'mimes:jpeg,png,jpg',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $item = Item::find($id);
        $image = $request->file('image');
        $slug = str_slug($request->name);
        if(isset($image)) {
            $currentData = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentData . '-' . uniqid() . $image->getClientOriginalExtension();
            if(!file_exists('upload/item')){
                mkdir('upload/item',0777,true);
            }
            unlink('upload/item/'.$item->image);
            $image->move('upload/item',$imagename);
        }else{
            $imagename = $item->image;
        }

        $item->category_id = $request->category;
        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->image = $imagename;
        $item->save();
        return redirect()->route('item.index')->with('successU','Item Successfully Uploaded');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        if(file_exists('upload/item/'.$item->image)){
            unlink('upload/item/'.$item->image);
        }
        $item->delete();
        return redirect()->back()->with('successD','Item successfully Deleted');
    }
}
