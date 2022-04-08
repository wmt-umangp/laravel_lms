<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
Use Auth;
use Storage;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    public function getProfileImgPathAttribute($profile_img_path){
        $folder='public/images/User-'.Auth::user()->id.'/';
        if($profile_img_path){
            if($profile_img_path=='dummy-image.jpg'){
                $profile_img_path=Storage::disk('local')->url('public/'.$profile_img_path);
            }
            else{
                $profile_img_path = Storage::disk('local')->url($folder.$profile_img_path);
            }
        }
        return $profile_img_path;
    }
}
