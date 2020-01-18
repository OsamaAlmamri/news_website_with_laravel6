<?php

namespace App\Admin;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'admin_groups';

    public $timestamps = false;

    protected $guarded = ['id'];

    protected $fillable = ['name'];

    public function admins(){
        return $this->hasMany(User::class,'admin_group_id' , 'id')->where('role' , '=' , 'admin');
    }
}
