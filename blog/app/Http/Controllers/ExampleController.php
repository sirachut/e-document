<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ExampleController extends Controller
{

public function create()
{
    return view('upload/create');
}
public function store(Request $request)
{
    //Save upload image to 'avatar' folder which in 'storage/app/public' folder
    $path = $request->file('image')->store('avatar','public');
    //echo $path;
    //Save $path to database or anything else
    //...
//    return redirect('/example');
}
}