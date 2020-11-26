<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(string[] $array)
 * @method static findOrFail(int $int)
 */
class Post extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function tags()
    {
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }
}
