<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Companies extends Model
{
    use  HasFactory;

    protected $fillable  = ['company_name'];

    public function products()
    {
        return $this->hasMany(Products::class, 'company_id');
    }

}
