<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Laravel\Passport\HasApiTokens;

class Customer extends Authenticatable
{
	use HasApiTokens;

    public $timestamps = false;

    public $hidden = ['password'];

    protected $table = 'customer';
    protected $primaryKey = 'customer_id';

}
