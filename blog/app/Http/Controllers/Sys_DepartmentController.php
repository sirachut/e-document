<?php

namespace App\Http\Controllers;

use App\Models\Sys_Department;
use Illuminate\Http\Request;

class Sys_DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sys_Department = Sys_Department::all();

        return View('home')
            ->with('sys_Department',$sys_Department);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sys_Department  $sys_Department
     * @return \Illuminate\Http\Response
     */
    public function show(Sys_Department $sys_Department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sys_Department  $sys_Department
     * @return \Illuminate\Http\Response
     */
    public function edit(Sys_Department $sys_Department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sys_Department  $sys_Department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sys_Department $sys_Department)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sys_Department  $sys_Department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sys_Department $sys_Department)
    {
        //
    }
}
