<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model


{


    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    protected $fillable = [
        'id',
        'name',
        'email',
        'phone',

    ];
}
