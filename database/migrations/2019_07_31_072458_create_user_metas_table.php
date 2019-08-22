<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_metas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender');
            $table->string('birthday');
            $table->string('age');
            $table->string('address');
            $table->longText('contact_number');
            $table->longText('social_meta'); //Array
            $table->longText('bio');
            /**education*/
            $table->longText('tertiary_meta'); //Array
            $table->longText('secondary_meta'); //Array
            /**Skills*/
            $table->longText('skills_meta'); //Array
            /**Working-Exp*/
            $table->longText('work_exp_meta'); //Array
            $table->longText('profile_meta'); //Array
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_metas');
    }
}
