<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Author;
use App\Models\Book;
use App\Models\Team;

class DashboardController extends Controller
{
 public function index()
    {
        $categories = Category::count();
        $authors = Author::count();
        $books = Book::count();
        $teams = Team::count();

        return view('admin.index', compact(
            'categories',
            'authors',
            'books',
            'teams'
        ));
    }
}
