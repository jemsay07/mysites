<?php

use Illuminate\Database\Seeder;
use App\jc_Options;

class jcOptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('jc__options')->insert([
	        [
        		'option_name'		=> 'siteurl',
        		'option_value'		=> 'http://www.sandbox.practice.com',
        		'created_at' 		=> date("Y-m-d H:i:s"),
        		'updated_at' 		=> date("Y-m-d H:i:s")
	        ],
	        [
        		'option_name'		=> 'home',
        		'option_value'		=> 'http://www.sandbox.practice.com',
        		'created_at' 		=> date("Y-m-d H:i:s"),
        		'updated_at' 		=> date("Y-m-d H:i:s")
	        ],
	    	[
	    		'option_name'		=> 'sitename',
	    		'option_value'		=> 'jCode',
	    		'created_at' 		=> date("Y-m-d H:i:s"),
        		'updated_at' 		=> date("Y-m-d H:i:s")
	    	],
	    	[
	    		'option_name'		=> 'sitedescriptions',
	    		'option_value'		=> 'Just another jCode site.',
	    		'created_at' 		=> date("Y-m-d H:i:s"),
        		'updated_at' 		=> date("Y-m-d H:i:s")
	    	],
	    ]);
    }
}
