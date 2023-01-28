<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    public function index(){
        $viewData=[];
        $viewData['title']='Admin Page - Products - Online Store';
        $viewData['products']=Product::all();
        return view('admin.product.index')->with('viewData',$viewData);
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required|max:255',
            'description'=>'required',
            'price'=>'required|numeric|gt:0',
            'image'=>'image'
        ]);

        $newProduct=new Product();
        $newProduct->setName($request->input('name'));
        $newProduct->setDescription($request->input('description'));
        $newProduct->setPrice($request->input('price'));
        $newProduct->setImage('game.png');
        $newProduct->save();

        if($request->hasFile('image')){
            $fileName=$newProduct->getId().'.'.$request->file('image')->extension();
            Storage::disk('public')->put($fileName,file_get_contents($request->file('image')->getRealPath()));
            $newProduct->setImage($fileName);
            $newProduct->save();
        }

        return back();
    }

    public function delete($id){
        Product::destroy($id);
        return back();
    }
}
