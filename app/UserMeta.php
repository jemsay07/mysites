<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class UserMeta extends Model
{
    // protected $guarded = [];
    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'birthday',
        'age',
        'address',
        'contact_number',
        'email',
        'bio',
        'social_meta',
        'tertiary_meta',
        'secondary_meta',
        'work_exp_meta',
        'skill_meta'
    ];

    public function userMeta(){
    	return $this->hasMany(UserMeta::class);
    }

    public function getSocialMetaAttr($value){
    	return unserialize($value);
    }

    // public function setSocialMetaAttr($value){
    // 	$this->attributes['social_meta'] = serialize($value);
    // }

}
