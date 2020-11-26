<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(string[] $array)
 */
class Video extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function tags()
    {
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }
}
