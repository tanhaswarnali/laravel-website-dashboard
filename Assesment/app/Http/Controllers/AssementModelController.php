<?php

namespace App\Http\Controllers;

use App\Models\Backend\assementModel;
use Illuminate\Http\Request;
use File;
use Image;

class AssementModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = assementModel::orderby('id','asc')->get();
        return view('backend.pages.product.manageproduct',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.product.addproduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'category_name' => 'required',
            'brand_name' => 'required',
            'description' => 'required',
            'image' => 'required',
            'status' => 'required',
        ]);
        $product =new assementModel();
        $product->name = $request->name;
        $product->category_name = $request->category_name;
        $product->brand_name = $request->brand_name;
        $product->description = $request->description;
        $product->status = $request->status;
        if($request->image){
            $image = $request->File('image');
            $imageCustomname = rand().'.'.$image->getClientOriginalExtension();
            $imageCustomPath = public_path('backend/productimage/'.$imageCustomname);
            Image::make($image)->save($imageCustomPath);
            $product->image = $imageCustomname;   }

         $product->save();
         return redirect()->route('manageproduct');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Backend\assementModel  $assementModel
     * @return \Illuminate\Http\Response
     */
    public function show(assementModel $assementModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backend\assementModel  $assementModel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id =\Crypt::decryptString($id);
        $product = assementModel::find($id);
        return view('backend.pages.product.editproduct',compact('product'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Backend\assementModel  $assementModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' =>'required',
            'category_name' => 'required',
            'brand_name' => 'required',
            'description' => 'required',
            // 'image' => 'required',
            'status' => 'required',
        ]);
        $productUpdate= assementModel::find($id);
        $productUpdate->name = $request->name;
        $productUpdate->category_name = $request->category_name;
        $productUpdate->brand_name = $request->brand_name;
        $productUpdate->description = $request->description;
        $productUpdate->status = $request->status;
        if($request->image){
            if(File::exists('backend/productimage/'.$productUpdate->image)){
                File::delete('backend/productimage/'.$productUpdate->image);}
                $image = $request->File('image');
                $imageCustomname = rand().'.'.$image->getClientOriginalExtension();
                $imageCustomPath = public_path('backend/productimage/'.$imageCustomname);
                Image::make($image)->save($imageCustomPath);
               $productUpdate->image = $imageCustomname;
        }
        $productUpdate->update();
        return redirect()->route('manageproduct');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Backend\assementModel  $assementModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $deleteproduct =  assementModel::find($id); 
        if(File::exists('backend/productimage/'.$deleteproduct->image)){
            File::delete('backend/productimage/'.$deleteproduct->image);}
        $deleteproduct->delete();
        return redirect()->route('manageproduct');
    }
}
