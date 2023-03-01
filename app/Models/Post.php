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
    //解除模型的批量填充限制

    protected $with = ['category', 'author'];
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
