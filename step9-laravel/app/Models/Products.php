<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;

class Products extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','company_id','product_name','price','stock','description','img_path',];

    public static function getOwnProducts($user_id)
    {
        return self::where('user_id', $user_id)->get();
    }

    public static function getOtherProducts($user_id)
    {
        $query = self::query();
        if ($user_id) {
            $query->where('user_id', '!=', $user_id);
        }
        return $query->get();
    }

    public function user()
    {
        return $this->belongsTo(Users::class);
    }

    public function sales()
    {
        return $this->hasMany(Sales::class, 'product_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'product_id');
    }

    public function likedBy(?User $user)
    {
        if (!$user) {
            return false;
        }

        return $this->likes()->where('user_id', $user->id)->exists();
    }

    public function company()
    {
        return $this->belongsTo(Companies::class);
    }
}
