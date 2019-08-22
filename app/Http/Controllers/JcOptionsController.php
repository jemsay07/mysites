<?php

namespace App\Http\Controllers;

use App\jc_Options;
use Illuminate\Http\Request;
// use App\Http\Requests\OptionsFormRequest;

use Validator;

class JcOptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if ( $request->ajax() ) {
        //     $opt = new jc_Options();

        //     $validator = Validator::make( $request->all(), self::option_rules(), self::option_msg() );

        //     if ( $validator->fails() ) {
        //         return response()->json(['error'=>$validator->errors()->all()]);
        //     }
        //     $option_name = request('option_name');
        //     $option_value = request('option_value');
        //     for($count = 0; $count < count($option_value); $count++)
        //     {
        //         $data = array(
        //             'option_value' => $option_value[$count]['vas']
        //         );
        //         $insert_data[] = $data;
        //     }
        //     $opt->option_name = $option_name;
        //     $opt->option_value = serialize($insert_data);
        //     $opt->save();
        //     return response()->json([ 'success'=> 'Added new record' ]);
        // }
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\jc_Options  $jc_Options
     * @return \Illuminate\Http\Response
     */
    public function show(jc_Options $jc_Options)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\jc_Options  $jc_Options
     * @return \Illuminate\Http\Response
     */
    public function edit(jc_Options $jc_Options)
    {
        // $options = jc_Options::all();
        
        $siteURL = jc_Options::where('option_name', 'siteurl')->first();
        $homeURL = jc_Options::where('option_name', 'home')->first();
        $title = jc_Options::where('option_name', 'sitename')->first();
        $desc = jc_Options::where('option_name', 'sitedescriptions')->first();

        return view('admin.settings.general', compact('siteURL','homeURL','title','desc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\jc_Options  $jc_Options
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, jc_Options $jc_Options)
    {
        // $root = $request->root();
        if ( $request->ajax() ) {

            $validator = Validator::make( $request->all(), self::option_rules(), self::option_msg() );

            if ( $validator->fails() ) {
                return response()->json(['error'=>$validator->errors()->all()]);
            }

            if ( ! empty( $request->siteurl ) ) {
                jc_Options::where('option_name', 'siteurl')->update(['option_value' => $request->siteurl]);
            }

            if ( ! empty( $request->home ) ) {
                jc_Options::where('option_name', 'home')->update(['option_value' => $request->home]);
            }

            if ( ! empty( $request->sitename ) ) {
                jc_Options::where('option_name', 'sitename')->update(['option_value' => $request->sitename]);
            }

            if ( ! empty( $request->sitedescription ) ) {
                jc_Options::where('option_name', 'sitedescriptions')->update(['option_value' => $request->sitedescription]);
            }

            return response()->json([ 'success'=> 'Update the record.' ]);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\jc_Options  $jc_Options
     * @return \Illuminate\Http\Response
     */
    public function destroy(jc_Options $jc_Options)
    {
        //
    }

    public function option_rules(){
        return[
            'siteurl'           => 'required|url',
            'home'              => 'required|url',
            'sitename'          => 'required|min:3',
            'sitedescription'   => 'required|min:3',
        ];
    }

    public function option_msg(){
        return[
            'siteurl.required'  => 'The jCode Address field is required.',
            'siteurl.url'       => 'The jCode Address field must be url.',
            'home.required'     => 'The Site Address field is required.',
            'home.url'          => 'The Site Address field must be url.',
            'sitename.required' => 'The Site Title field is required.',
            'sitename.min'      => 'The Site Title field minimum 3 characters.',
            'sitedescription.required' => 'The Tagline field is required.',
            'sitedescription.min'      => 'The Tagline field minimum 3 characters.',
        ];
    }
}
