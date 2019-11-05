<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'title',
        'name',
        'description',
        'height',
        'width',
        'length',
        'weight',
        'photo',
        'email',
        'phone_number',
        'postcode_a',
        'postcode_b',
        'avg_confirmed',
        'show_hash'
        ];
}
