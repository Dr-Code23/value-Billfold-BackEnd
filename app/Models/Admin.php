<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable
{
    use HasFactory;

    protected $table = 'admins';

    protected $fillable = ['name','email','password','image','role_id'];


    public function role(){
        return $this->belongsto(Role::class,'role_id');
    }

    public function hasAbility($permissions){
        $role = $this->role;

        if(!$role){
            return false;
        }

        foreach($role->permissions as $permission){
            if(is_array($permissions)&& in_array($permission,$permissions)){
                return true;
            }else if(is_string($permissions)&&strcmp($permissions,$permission)==0){
                return true;
            }
        }
            return false;
    }


            public function setPasswordAttribute($value)
                {
                $this->attributes['password'] = bcrypt($value);
                }
}
