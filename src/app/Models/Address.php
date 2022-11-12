<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory, SoftDeletes;

    protected $collection = 'address';

    protected $connection = 'mongodb';

    protected $fillable = [
      'firstName',
      'lastName',
      'accountId',
      'streetAddress',
      'zipcode',
      'city',
      'country',
      'state',
    ];

    public function account(){
      return $this->belongsTo(Account::class, 'accountId');
    }
    
}
