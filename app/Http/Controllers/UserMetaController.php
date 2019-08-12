<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\UserMeta;
use App\User;

use Validator;
use Auth;

class UserMetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userMeta = UserMeta::all();
        return view( 'admin.users.index', compact('userMeta') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::first();
        return view( 'admin.users.create', compact( 'user' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $userMeta = new UserMeta();
        // dd('first_name');

        $this->validate($request, [
            'first_name'    => 'required',
            'last_name'    => 'required',
            'birthday'    => 'required',
            'age'    => 'required',
            'address'    => 'required',
        ]);

        
        return $request->all();

        // $social_meta = request('social_meta');
        // $tertiary_meta = request('tertiary_meta');
        // $secondary_meta = request('secondary_meta');
        // $work_exp_meta = request('work_exp_meta');
        // $skills_meta = request('skill_meta');

        // $this->validate($request,[
        //     'work_exp_meta.*.position' => 'required',
        //     'work_exp_meta.*.company' => 'required',
        //     'work_exp_meta.*.role' => 'required',
        //     'work_exp_meta.*.joined_start' => 'required|date',
        //     'work_exp_meta.*.joined_end' => 'required|date',
        //     'work_exp_meta.*.checkbox' => 'required',
        //     'work_exp_meta.*.exp' => 'required',
        // ]);

        // $userMeta->user_id   = Auth::id();
        // $userMeta->first_name = request('first_name');
        // $userMeta->last_name = request('last_name');
        // $userMeta->gender = request('gender');
        // $userMeta->birthday = request('birthday');
        // $userMeta->age = request('age');
        // $userMeta->address = request('address');
        // $userMeta->contact_number = request('contact_number');
        // $userMeta->social_meta = serialize($social_meta);
        // $userMeta->bio = request('bio');
        // $userMeta->tertiary_meta = serialize($tertiary_meta);
        // $userMeta->secondary_meta = serialize($secondary_meta);
        // $userMeta->primary_meta = 'primary_meta';
        // $userMeta->skills_meta = serialize($skills_meta);
        // $userMeta->work_exp_meta = serialize($work_exp_meta);
        // $userMeta->profile_meta = 'profile_meta';
        // $userMeta->save();

        // $userMeta->user_id   = Auth::id();
        // $userMeta->first_name = 'first_name';
        // $userMeta->last_name = 'last_name';
        // $userMeta->gender = 'gender';
        // $userMeta->birthday = 'birthday';
        // $userMeta->age = 'age';
        // $userMeta->address = 'address';
        // $userMeta->contact_number = 'contact_number';
        // $userMeta->social_meta = 'social_meta';
        // $userMeta->bio = 'bio';
        // $userMeta->tertiary_meta = 'tertiary_meta';
        // $userMeta->secondary_meta = 'secondary_meta';
        // $userMeta->primary_meta = 'primary_meta';
        // $userMeta->skills_meta = 'skills_meta';
        // $userMeta->work_exp_meta = serialize($work_exp_meta);
        // $userMeta->profile_meta = 'profile_meta';
        // $userMeta->save();


        // return redirect('/users');

    }


    public function sanitize_checkbox( $input ){
        if ( $input === true || $input === 1 || $input === 'on' ) {
            return true;
        }else{
            return false;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserMeta  $userMeta
     * @return \Illuminate\Http\Response
     */
    public function show(UserMeta $userMeta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserMeta  $userMeta
     * @return \Illuminate\Http\Response
     */
    public function edit(UserMeta $userMeta)
    {
        $userMeta = UserMeta::all();
        $user = User::first();
        return view( 'admin.users.edit', compact('userMeta', 'user') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserMeta  $userMeta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserMeta $userMeta, $id)
    {
        $userMeta = UserMeta::find( $id );

        $social_meta = request('social_meta');
        $tertiary_meta = request('tertiary_meta');
        $secondary_meta = request('secondary_meta');
        $work_exp_meta = request('work_exp_meta');
        $skills_meta = request('skill_meta');

        $userMeta->user_id   = Auth::id();
        $userMeta->first_name = request('first_name');
        $userMeta->last_name = request('last_name');
        $userMeta->gender = request('gender');
        $userMeta->birthday = request('birthday');
        $userMeta->age = request('age');
        $userMeta->address = request('address');
        $userMeta->contact_number = request('contact_number');
        $userMeta->social_meta = serialize($social_meta);
        $userMeta->bio = request('bio');
        $userMeta->tertiary_meta = serialize($tertiary_meta);
        $userMeta->secondary_meta = serialize($secondary_meta);
        $userMeta->primary_meta = 'primary_meta';
        $userMeta->skills_meta = serialize($skills_meta);
        $userMeta->work_exp_meta = serialize($work_exp_meta);
        $userMeta->profile_meta = 'profile_meta';
        $userMeta->save();

        // return redirect('/users/' . $id . '/edit-profile/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserMeta  $userMeta
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserMeta $userMeta)
    {
        //
    }
}
