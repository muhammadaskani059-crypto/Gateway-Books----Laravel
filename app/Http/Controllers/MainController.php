<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Media;
use App\Models\Category;
use App\Models\Author;
use App\Models\Book;

class MainController extends Controller
{
    function index() {
        $sliders = Media::where(['status' => 'ACTIVE', 'media_type' => 'slider'])->get();
        $upcoming_books = Book::where('status', 'UPCOMING')->limit(5)->get();
        $downloaded_books = Book::with('category', 'author')->orderBy('downloaded', 'DESC')->get();
        $recommended_books = Book::where('recommended', '1')->get();
        $books = Book::with('author')->where('status', 'ACTIVE')->paginate(10);
        $categories = Category::where('status', 'ACTIVE')->get();
        $author_feature = Author::where(['status' => 'ACTIVE', 'author_feature' => 'yes'])->inRandomOrder()->first();
        $galleries = Media::where(['status' => 'ACTIVE', 'media_type' => 'gallery'])->limit('6')->get();
  
        return view('index', compact('sliders', 'upcoming_books', 'downloaded_books', 'recommended_books', 'books', 'categories', 'author_feature', 'galleries'));
    }
    
    function about() {
        $teams = Team::where('status', 'ACTIVE')->limit(5)->get();
        return view('about', compact('teams'));
    }

    function gallery() {
        $galleries = Media::where(['status' => 'ACTIVE', 'media_type' => 'gallery'])->paginate(8);
        return view('gallery', compact('galleries'));
    }

    function author() {
        $getSearch = request()->get('letter');
        $authors = Author::where('title', 'LIKE', "$getSearch%")->paginate(5);
        $author_features = Author::where('author_feature', 'yes')->limit(4)->get();
        $downloaded_books = Book::orderBy('downloaded', 'DESC')->limit(4)->get();
        return view('author', compact('authors', 'downloaded_books', 'author_features'));
    }

    function author_detail($slug) {
        $author_detail = Author::where('slug', $slug)->first();
        return view('author_detail', compact('author_detail'));
    }

    function contact() {
        return view('contact');
    }

    function category($slug) {
        $category = Category::where('slug', $slug)->first();
        $books = Book::where('category_id', $category->id)->paginate(10);
        $categories = Category::where('status', 'active')->get();
        return view('category', compact('books', 'categories', 'category'));
    }

    function book($slug) {
        $book = Book::where('slug', $slug)->first();
        return view('book', compact('book'));
    }
}