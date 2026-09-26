<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','company_id','product_name','price','stock','description','img_path',];

    public static function getOwnProducts($userId)
    {
        return self::where('user_id', $userId)->get();
    }

}
