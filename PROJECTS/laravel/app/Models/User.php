<?php

namespace LaraCourse\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use LaraCourse\Models\Album;
use LaraCourse\Models\AlbumCategory;

//gallery_users
class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role'
    ];
  //  protected $table ='gallery_users';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function albums(){
         return $this->hasMany(Album::class);
    }
    public function albumCategories()
    {
        return $this->hasMany(AlbumCategory::class);
    }
     public function  getFullNameAttribute(){
        return $this->name;
     }
      public function isAdmin(){
        return $this->role === 'admin';
      }
}