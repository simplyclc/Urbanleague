<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use Carbon\Carbon;
use App\Models\User;

class Account extends Model {
    use HasFactory;

    protected $collection = 'accounts';
    protected $connection = 'mongodb';
    protected $fillable = ['name'];

    public function users() {
        return $this->hasOne(User::class, 'accountId');
    }

    public function address(){
        return $this->hasMany(Address::class, 'accountId');
    }

}
