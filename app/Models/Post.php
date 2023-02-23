<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static truncate()
 */
class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category() {
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Category::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
//    public function getRouteKeyName()
//    {
//        return 'slug';
//    }
}
