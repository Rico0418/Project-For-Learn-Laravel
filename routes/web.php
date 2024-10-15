<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('home',['title' => 'Home Page']);
});
Route::get('/about', function () {
    return view('about',['name' => 'Ricardo eric','title' => 'About Page']);
});
Route::get('/posts', function () {
    //$posts = Post::with(['author','category'])->latest()->get();
    // dump(request('search'));

    //using search posts
    // $posts = Post::latest();
    // if(request('search')){
    //     $posts->where('title','like','%'. request('search'). '%');
    // }
    //return view('posts', ['title' => 'Blog Page','posts' => $posts->get()]);
    
    //not using search
    // $posts = Post::latest()->get();

    //search using category, and authors
    // return view('posts', ['title' => 'Blog Page','posts' => Post::filter(request(['search','category','author']))->latest()->get()]);

    return view('posts', ['title' => 'Blog Page','posts' => Post::filter(request(['search','category','author']))->latest()->paginate(5)->withQueryString()]);
});
Route::get('/posts/data/{post:slug}', function(Post $post){
    // dd($id);
    
    // $post = Post::find($slug);
    //bisa pakai id saja kalau tidak mau ribet karena ada function yang cari berdasarkan id
    // dd($post);
    return view('post',['title' => 'Single Post', 'post' => $post]);
});
Route::get('/authors/{user:username}', function(User $user){
    //$posts = $user->posts->load('category','author');
    return view('posts',['title' => count($user->posts) . ' Article by ' .$user->name, 'posts' => $user->posts]);
});
Route::get('/categories/{category:slug}', function(Category $category){
    //$posts = $category->posts->load('category','author');
    return view('posts',['title' => 'Articles in:  ' .$category->name, 'posts' => $category->posts]);
});
Route::get('/contact', function () {
    return view('contact',['title' => 'Contact Page']);
});

Route::get('/hello',function(){
    return 'Hello World';
});
Route::get('/belajar',function(){
    echo '<h1>Hello World</h1>';
    echo '<p>Learning laravel</p>';
});
Route::get('/mahasiswa/{nama}', function ($name){
    return "Tampilkan data mahasiswa bernama $name";
});
Route::get('/hubungi-kami',function(){
    return '<h1>Hubungi kami</h1>';
});
Route::redirect('/contact-us','/hubungi-kami');
Route::prefix('/admin') ->group(function(){
    Route::get('/mahasiswa',function(){
        echo "<h1>Daftar Mahsiswa</h1>";
    });
    Route::get('/dosen',function(){
        echo "<h1>Daftar dosen</h1>";
    });
    Route::get('/karyawan',function(){
        echo "<h1>Daftar karyawan</h1>";
    });
});
// Route::get('/mahasiswa',function(){
//     return view('mahasiswa');
// });
Route::get('/mahasiswa',function(){
    return view('universitas.mahasiswa', ["mahasiswa01" => "Risa lestari"]);
});