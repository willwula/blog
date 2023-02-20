<?php
use App\Models\Post;
use Illuminate\Support\Facades\Route;

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
    //    ddd($posts[0]->getContents());
    return view('posts', [
        'posts' => Post::all()
    ]);
});

//posts後接{post},作為$slug傳入閉包中由file_get_contents()接收後設為$post變數。
Route::get('posts/{post}', function ($slug) {
    //Find a post by its slug and pass it to a view called "post"
    $post = Post::find($slug);

    return view('post', [
        'post' => $post
    ]);

})->where('post', '[A-z_\-]+');
//whereAlpha('post')
