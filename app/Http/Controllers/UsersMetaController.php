<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Requests\UserFormRequestVal;

use App\UsersMeta;
use App\User;

use Validator;
use Auth;

class UsersMetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userMeta = UsersMeta::all();
        return view( 'admin.users.index' );
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
    public function store(Request $request){

        if ( $request->ajax() ) {

            $UsersMeta = new UsersMeta();

            $validator = Validator::make( $request->all(), self::user_rules(), self::user_messages() );

            if ( $validator->fails() ) {
                return response()->json(['error'=>$validator->errors()->all()]);
            }
           
            /**social-meta*/
            $social_meta = request('social_meta');
            for($scount = 0; $scount < count($social_meta); $scount++)
            {
                $social_data = array(
                    'sm_brand'      => $social_meta[$scount]['sm_brand'],
                    'sm_link'       => $social_meta[$scount]['sm_link'],
                    'sm_target'     => $social_meta[$scount]['sm_target'],
                );
                $insert_social[] = $social_data;
            }

            /**tertiary-meta*/
            $tertiary_meta = request('tertiary'); 
            for($tcount = 0; $tcount < count($tertiary_meta); $tcount++ ){
                $tertiary_data = array(
                    'university'    => $tertiary_meta[$tcount]['university'],
                    'qualify_uni'   => $tertiary_meta[$tcount]['qualify_uni'],
                    'course_uni'    => $tertiary_meta[$tcount]['course_uni'],
                    'major_uni'     => $tertiary_meta[$tcount]['major_uni'],
                    'grad_end_uni'  => $tertiary_meta[$tcount]['grad_end_uni'],
                    'address_uni'   => $tertiary_meta[$tcount]['address_uni'],
                    'grade_uni'     => $tertiary_meta[$tcount]['grade_uni'],
                );
                $insert_tertiary[] = $tertiary_data;
            }

            /**secondary-meta*/
            $secondary_meta = request('secondary_meta'); 
            for($escount = 0; $escount < count($secondary_meta); $escount++ ){
                $secondary_data = array(
                    'high_school'    => $secondary_meta[$escount]['high_school'],
                    'hs_address'   => $secondary_meta[$escount]['hs_address'],
                    'grad_of_hs'    => $secondary_meta[$escount]['grad_of_hs'],
                );
                $insert_secondary[] = $secondary_data;
            }

            /**work-meta*/
            $work_meta = request('work_exp_meta'); 
            for($wcount = 0; $wcount < count($work_meta); $wcount++ ){
                $work_data = array(
                    'position'      => $work_meta[$wcount]['position'],
                    'company'       => $work_meta[$wcount]['company'],
                    'role'          => $work_meta[$wcount]['role'],
                    'joined_start'  => $work_meta[$wcount]['joined_start'],
                    'joined_end'    => $work_meta[$wcount]['joined_end'],
                    'work_status'   => $work_meta[$wcount]['work_status'],
                    'exp'           => $work_meta[$wcount]['exp'],
                );
                $insert_work[] = $work_data;
            }

            /**skills-meta*/
            $skill_meta = request('skill_meta'); 
            for($wcount = 0; $wcount < count($skill_meta); $wcount++ ){
                $skill_data = array(
                    'skills'        => $skill_meta[$wcount]['skills'],
                    'profession'    => $skill_meta[$wcount]['profession'],
                );
                $insert_skill[] = $skill_data;
            }

            $UsersMeta->user_id   = Auth::id();
            $UsersMeta->first_name = request('first_name');
            $UsersMeta->last_name = request('last_name');
            $UsersMeta->gender = request('gender');
            $UsersMeta->birthday = request('birthday');
            $UsersMeta->age = request('age');
            $UsersMeta->address = request('address');
            $UsersMeta->contact_number = request('contact_number');
            $UsersMeta->social_meta = serialize($insert_social);
            $UsersMeta->bio = request('bio');
            $UsersMeta->tertiary_meta = serialize($insert_tertiary);
            $UsersMeta->secondary_meta = serialize($insert_secondary);
            $UsersMeta->skills_meta = serialize($insert_skill);
            $UsersMeta->work_exp_meta = serialize($insert_work);
            $UsersMeta->profile_meta = 'profile_meta';
            $UsersMeta->save();

            return response()->json([ 'success'=> 'Added new record' ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UsersMeta  $usersMeta
     * @return \Illuminate\Http\Response
     */
    public function show(UsersMeta $usersMeta)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UsersMeta  $usersMeta
     * @return \Illuminate\Http\Response
     */
    public function edit(UsersMeta $usersMeta)
    {
        $userMeta = UsersMeta::all();
        $user = User::first();
        return view( 'admin.users.edit', compact('userMeta', 'user') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UsersMeta  $usersMeta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UsersMeta $usersMeta, $id)
    {
        if ( $request->ajax() ) {

            $UsersMeta = UsersMeta::find( $id );

            $validator = Validator::make( $request->all(), self::user_rules(), self::user_messages() );

            if ( $validator->fails() ) {
                return response()->json(['error'=>$validator->errors()->all()]);
            }
           
            /**social-meta*/
            $social_meta = request('social_meta');
            for($scount = 0; $scount < count($social_meta); $scount++)
            {
                $social_data = array(
                    'sm_brand'      => $social_meta[$scount]['sm_brand'],
                    'sm_link'       => $social_meta[$scount]['sm_link'],
                    'sm_target'     => $social_meta[$scount]['sm_target'],
                );
                $insert_social[] = $social_data;
            }

            /**tertiary-meta*/
            $tertiary_meta = request('tertiary'); 
            for($tcount = 0; $tcount < count($tertiary_meta); $tcount++ ){
                $tertiary_data = array(
                    'university'    => $tertiary_meta[$tcount]['university'],
                    'qualify_uni'   => $tertiary_meta[$tcount]['qualify_uni'],
                    'course_uni'    => $tertiary_meta[$tcount]['course_uni'],
                    'major_uni'     => $tertiary_meta[$tcount]['major_uni'],
                    'grad_end_uni'  => $tertiary_meta[$tcount]['grad_end_uni'],
                    'address_uni'   => $tertiary_meta[$tcount]['address_uni'],
                    'grade_uni'     => $tertiary_meta[$tcount]['grade_uni'],
                );
                $insert_tertiary[] = $tertiary_data;
            }

            /**secondary-meta*/
            $secondary_meta = request('secondary_meta'); 
            for($escount = 0; $escount < count($secondary_meta); $escount++ ){
                $secondary_data = array(
                    'high_school'    => $secondary_meta[$escount]['high_school'],
                    'hs_address'   => $secondary_meta[$escount]['hs_address'],
                    'grad_of_hs'    => $secondary_meta[$escount]['grad_of_hs'],
                );
                $insert_secondary[] = $secondary_data;
            }

            /**work-meta*/
            $work_meta = request('work_exp_meta'); 
            for($wcount = 0; $wcount < count($work_meta); $wcount++ ){
                $work_data = array(
                    'position'      => $work_meta[$wcount]['position'],
                    'company'       => $work_meta[$wcount]['company'],
                    'role'          => $work_meta[$wcount]['role'],
                    'joined_start'  => $work_meta[$wcount]['joined_start'],
                    'joined_end'    => $work_meta[$wcount]['joined_end'],
                    'work_status'   => $work_meta[$wcount]['work_status'],
                    'exp'           => $work_meta[$wcount]['exp'],
                );
                $insert_work[] = $work_data;
            }

            /**skills-meta*/
            $skill_meta = request('skill_meta'); 
            for($wcount = 0; $wcount < count($skill_meta); $wcount++ ){
                $skill_data = array(
                    'skills'        => $skill_meta[$wcount]['skills'],
                    'profession'    => $skill_meta[$wcount]['profession'],
                );
                $insert_skill[] = $skill_data;
            }

            $UsersMeta->user_id   = Auth::id();
            $UsersMeta->first_name = request('first_name');
            $UsersMeta->last_name = request('last_name');
            $UsersMeta->gender = request('gender');
            $UsersMeta->birthday = request('birthday');
            $UsersMeta->age = request('age');
            $UsersMeta->address = request('address');
            $UsersMeta->contact_number = request('contact_number');
            $UsersMeta->social_meta = serialize($insert_social);
            $UsersMeta->bio = request('bio');
            $UsersMeta->tertiary_meta = serialize($insert_tertiary);
            $UsersMeta->secondary_meta = serialize($insert_secondary);
            $UsersMeta->skills_meta = serialize($insert_skill);
            $UsersMeta->work_exp_meta = serialize($insert_work);
            $UsersMeta->profile_meta = 'profile_meta';
            $UsersMeta->save();

            return response()->json([ 'success'=> 'Record has been updated.' ]);
        }
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

    /**
     * User rules
     * @return array
     */
    public function user_rules(){
        return [
            'first_name'   => 'required|string|max:20',
            'last_name'    => 'required|string|max:20',
            'birthday'     => 'required|nullable|before:today',
            'age'          => 'required|numeric',
            'address' => 'required',
            'contact_number' => 'required|numeric',
            'email' => 'required|email|nullable',
            'social_meta.*.sm_link' => 'required|url|distinct|min:5',
            'tertiary.*.university' => 'required|min:3',
            'tertiary.*.qualify_uni' => 'required|not_in:none',
            'tertiary.*.course_uni' => 'required|string|min:2',
            'tertiary.*.grad_end_uni' => 'required|nullable|before:today',
            'tertiary.*.address_uni' => 'required|min:5',
            'secondary_meta.*.high_school' => 'required|min:3',
            'secondary_meta.*.hs_address' => 'required|min:5',
            'secondary_meta.*.grad_of_hs' => 'required|nullable|before:today',
            'work_exp_meta.*.position' => 'required|min:5',
            'work_exp_meta.*.company' => 'required|min:5',
            'work_exp_meta.*.role' => 'required|min:5',
            'work_exp_meta.*.joined_start' => 'required|before:today',
            'skill_meta.*.skills' => 'required|min:3',
        ];
    }

    public function user_messages(){
        return [
            'first_name.required'       => 'First name field is required.',
            'first_name.max'     => 'First name must be not more than 20 characters.',
            'last_name.max'      => 'Last name must be not more than 20 characters.',
            'age.numeric'      => 'Age must be a numeric numbers.',
            'contact_number.numeric'  => 'Contact Number must be a numeric numbers.',
            'email.required'  => 'The email field is required.',
            'social_meta.*.sm_link.required' => 'Social Media Link is required',
            'social_meta.*.sm_link.url' => 'The social media link must be url.',
            'social_meta.*.sm_link.distinct' => 'The social media link must be unique.',
            'tertiary.*.university.required'  => 'The institute/university field is required.',
            'tertiary.*.qualify_uni.required'  => 'The qualification field is required.',
            'tertiary.*.qualify_uni.not_in'  => 'The qualification must not be none.',
            'tertiary.*.course_uni.required'  => 'The course field is required.',
            'tertiary.*.grad_end_uni.required'  => 'The graduation date field is required.',
            'tertiary.*.address_uni.required'  => 'The location field is required.',
            'secondary_meta.*.high_school.required'  => 'The institute/school field is required.',
            'secondary_meta.*.high_school.min'  => 'The institute/school must be atleast 3 characters.',
            'secondary_meta.*.hs_address.required'  => 'The institute/school address field is required.',
            'secondary_meta.*.high_school.min'  => 'The institute/school must be atleast 5 characters.',
            'secondary_meta.*.grad_of_hs.required'  => 'The graduation date field is required.',
            'secondary_meta.*.grad_of_hs.before'  => 'The graduation date must not be today.',
            'work_exp_meta.*.position.required'  => 'The position title field is required.',
            'work_exp_meta.*.position.min'      => 'The position must be atleast 5 characters.',
            'work_exp_meta.*.company.required'  => 'The company field is required.',
            'work_exp_meta.*.company.min'      => 'The company must be atleast 5 characters.',
            'work_exp_meta.*.role.required'  => 'The role field is required.',
            'work_exp_meta.*.company.min'      => 'The role must be atleast 5 characters.',
            'work_exp_meta.*.joined_start.required'  => 'The duration start field is required.',
            'work_exp_meta.*.joined_start.before'  => 'Check your duration start date.',
            'skill_meta.*.skills.required'  => 'The skills field is required.',
            'skill_meta.*.skills.min'  => 'The skills must be atleast 3 characters.',
        ];
    }
}
