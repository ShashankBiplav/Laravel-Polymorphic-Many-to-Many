<?php

use Illuminate\Support\Facades\Route;

use App\Models\Post;
use App\Models\Video;
use App\Models\Tag;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//create
Route::get('/create', function () {
    $post = Post::create(['name' => 'First Post!']);
    $video = Video::create(['name' => 'video1.mov']);

    $tag1 = Tag::findOrFail(1);
    $tag2 = Tag::findOrFail(2);

    $post->tags()->save($tag1);
    $video->tags()->save($tag2);

    return "Tag id:1 assigned to the above created post and Tag id:2 assigned to above created video";
});

//read
Route::get('/read', function () {
    $post = Post::findOrFail(1);
    foreach ($post->tags as $tag) {
        echo $tag;
    }
});

//update
Route::get('/update', function () {
    //updating tag name
    $post = Post::findOrFail(2);
//    foreach ($post->tags as $tag) {
//        $tag->where('id', 1)->update(['name' => 'Updated tag']);
//        $tag->save();
//        return "Associated tags updated";
//    }

//    //Assigning a new tag
    $tag = Tag::findOrFail(3);
//    $post->tags()->save($tag);

    //using attach method
//    $post->tags()->attach($tag);

    //using sync
    $post->tags()->sync([1, 2, 3, 4]);
});

//deleting
Route::get('/delete', function () {
    $post = Post::findOrFail(1);
    foreach ($post->tags as $tag) {
        $tag->where('id', 1)->delete();
    }
    return "tag with id:1 deleted";
});
