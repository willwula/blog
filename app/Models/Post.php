<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static truncate()
 * @method static latest(string $string)
 */
class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category() {
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Category::class);
    }

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }
//    public function getRouteKeyName()
//    {
//        return 'slug';
//    }
}
