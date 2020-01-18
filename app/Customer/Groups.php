<?php

namespace App\Customer;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    protected $table = 'customer_groups';

    public function customers(){
        return $this->hasMany(User::class)->where('role' , '=' , 'customer');
    }
}
