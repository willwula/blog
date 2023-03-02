<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    //    $posts = array_map(function ($file) {
//        $document = YamlFrontMatter::parseFile($file);
//
//        return new Post(
//            $document->title,
//            $document->excerpt,
//            $document->date,
//            $document->body(),
//            $document->slug
//        );
//    }, $files);

//    ddd($posts[0]->body);
//        $document = YamlFrontMatter::parseFile(
//            resource_path('posts/my-fourth-post.html')
//        );
//        ddd($document->matter('title'));
    return view('posts', [
        'posts' => Post::latest()->with(['category', 'author'])->get(),
        'categories' => Category::All()
    ]);
})->name('home');

//posts後接{post},作為$slug傳入閉包中由file_get_contents()接收後設為$post變數。
Route::get('posts/{post:slug}', function (Post $post) {
    // Post::where('slug', $post)->post()->FindOrFail()
    return view('post', [
        'post' => $post
    ]);
});
//whereAlpha('post')
Route::get('/categories/{category:slug}',function (Category $category) {
    return view('posts', [
        'posts' => $category->posts,
        'currentCategory' => $category,
        'categories' => Category::all()
        ]);
})->name('category');

Route::get('/authors/{author:username}',function (User $author) {
    return view('posts', [
        'posts' => $author->posts,
        'categories' => Category::all()
    ]);
});
