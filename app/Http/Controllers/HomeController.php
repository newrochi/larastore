<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $viewData=[];
        $viewData['title']='Home Page - Online Store";';
        return view('home.index')->with('viewData',$viewData);
    }

    public function about(){
        $title='About us - Online Store';
        $subtitle='About us';
        $description='This is an about page ...';
        $author='Developed by: Pooria Samarbafzadeh';
        return view('home.about',compact(['title','subtitle','description','author']));
    }
}
