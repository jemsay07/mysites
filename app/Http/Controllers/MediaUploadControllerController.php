<?php

namespace App\Http\Controllers;

use App\MediaUploadController;
use Illuminate\Http\Request;

use Validator;

class MediaUploadControllerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.media.index');
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
        $validation = Validator::make( $request->all(),self::media_rules(),self::media_message());

        if ( $validation->passes() ) {
            $image = $request->file('choice_file');
            $new_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $new_image);
            return response()->json([ 
                'message'           => 'Image Upload Successfully',
                'uploaded_image'    => '<img src="/images/'. $new_image .'" clas="img-thumbnail" width="300">',
                'class_name'        => 'alert_danger'
            ]);
        }else{
            return response()->json([ 
                'message'   => $validation->errors()->all(),
                'uploaded_image'    => '',
                'class_name'        => 'alert-danger'
            ]);
        }
    }

    public function media_rules(){
        return[
            'choice_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }

    public function media_message(){
        return['choice_file.required' => 'Required'];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MediaUploadController  $mediaUploadController
     * @return \Illuminate\Http\Response
     */
    public function show(MediaUploadController $mediaUploadController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MediaUploadController  $mediaUploadController
     * @return \Illuminate\Http\Response
     */
    public function edit(MediaUploadController $mediaUploadController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MediaUploadController  $mediaUploadController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MediaUploadController $mediaUploadController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MediaUploadController  $mediaUploadController
     * @return \Illuminate\Http\Response
     */
    public function destroy(MediaUploadController $mediaUploadController)
    {
        //
    }
}
