<?php

namespace App\Http\Controllers;

use App\UsersMeta;
use Illuminate\Http\Request;

use App\Http\Requests\UserFormRequestVal;

// use Validate;

class UsersMetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view( 'admin.users.index' );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view( 'admin.users.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequestVal $request)
    {
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UsersMeta  $usersMeta
     * @return \Illuminate\Http\Response
     */
    public function show(UsersMeta $usersMeta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UsersMeta  $usersMeta
     * @return \Illuminate\Http\Response
     */
    public function edit(UsersMeta $usersMeta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UsersMeta  $usersMeta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UsersMeta $usersMeta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UsersMeta  $usersMeta
     * @return \Illuminate\Http\Response
     */
    public function destroy(UsersMeta $usersMeta)
    {
        //
    }
}