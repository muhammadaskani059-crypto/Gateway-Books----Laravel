<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Country;
use File;

class BookController extends Controller
{
    function index() {
        $searchTerm = request()->get('s');
        $books = Book::orWhere('title', 'LIKE', "%$searchTerm%")->latest()->paginate(15);
        return view('admin/book/index')
            ->with(compact('books'));
    }

    function create() {
        $countries = Country::get();
        return view('admin/book/create')
            ->with(compact('countries'));
    }

    function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'category_id' => 'required|not_in:0',
            'author_id' => 'required|not_in:0',
            'availability' => 'required',
            'price' => 'required',
            'country_of_publisher' => 'required|not_in:none',
            'description' => 'required',
        ],
        [
            'title.required' => 'Title shouldnt be empty!',
            'slug.required' => 'Slug shouldnt be empty!',
            'category_id.required.not_in' => 'Category should be unique!',
            'author_id.required.not_in' => 'Author should be unique!',           
            'availability.required' => 'Availability shouldnt be empty!',
            'price.required' => 'Price shouldnt be empty!',
            'country_of_publisher.not_in' => 'Select a country!',
            'description.unique' => 'Description should be unique!',
        ]);

        $fileName = null;
        if (request()->hasFile('book_img')) 
        {
            $file = request()->file('book_img');
            $fileName =  md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
            $file->move('./uploads/', $fileName);
        }

        Book::create([
            'category_id' => '1',
            'author_id'   => '1',      
            'title'=>  $request->get('title'),
            'slug' =>  $request->get('slug'),
            'availability' =>  $request->get('availability'),
            'price' =>  $request->get('price'),
            'rating' =>  $request->get('rating'),
            'publisher' =>  $request->get('publisher'),
            'country_of_publisher' =>  $request->get('country_of_publisher'),
            'isbn' =>  $request->get('isbn'),
            'isbn_10' =>  $request->get('isbn_10'),
            'audience' =>  $request->get('audience'),
            'format' =>  $request->get('format'),
            'language' =>  $request->get('language'),
            'total_pages' =>  $request->get('total_pages'),
            'downloaded' =>  $request->get('downloaded'),
            'edition_number' =>  $request->get('edition_number'),
            'recommended' =>  $request->get('recommended'),
            'description' =>  $request->get('description'),
            'book_img' =>  '$fileName',
            'book_upload' =>  'No pdf found',           
            'status' =>  'DEACTIVE',
        ]);

        return redirect()->to('admin/book');
    }

    function edit($id) {
        $book = Book::findOrFail($id);
        $countries = Country::get();                           
        return view('admin/book/edit')
            ->with(compact('book' , 'countries' ));
    }

    function update(Request $request, $id) {
        $book = Book::findOrFail($id);
        $currentImage = $book->book_img;
        $fileName = null;
        if (request()->hasFile('book_img')) 
        {
            $file = request()->file('book_img');
            $fileName =  md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
            $file->move('./uploads/', $fileName);
        }

        $book->update([
            'category_id' => '1',
            'author_id'   => '1',      
            'title'=>  $request->get('title'),
            'slug' =>  $request->get('slug'),
            'availability' =>  $request->get('availability'),
            'price' =>  $request->get('price'),
            'rating' =>  $request->get('rating'),
            'publisher' =>  $request->get('publisher'),
            'country_of_publisher' =>  $request->get('country_of_publisher'),
            'isbn' =>  $request->get('isbn'),
            'isbn_10' =>  $request->get('isbn_10'),
            'audience' =>  $request->get('audience'),
            'format' =>  $request->get('format'),
            'language' =>  $request->get('language'),
            'total_pages' =>  $request->get('total_pages'),
            'downloaded' =>  $request->get('downloaded'),
            'edition_number' =>  $request->get('edition_number'),
            'recommended' =>  $request->get('recommended'),
            'description' =>  $request->get('description'),
            'book_img' =>  ($fileName) ? $fileName : $currentImage,
            'book_upload' =>  'No pdf found', 
        ]);

        if ($fileName) 
            File::delete('./uploads/' . $currentImage);

        return redirect()->to('admin/book');
    }

    function delete($id) {
        // Delete your data.
        $book = Book::findOrFail($id);
        $currentImage = $book->book_img;
        $book->delete();
        File::delete('./uploads/' . $currentImage);

        return redirect()->back();
    }

    function status($id) {
        $book = Book::findOrFail($id);

        $newStatus = ($book->status == 'DEACTIVE') ? 'ACTIVE' : 'DEACTIVE';

        $book->update([
            'status' => $newStatus
        ]);

        return redirect()->back();
    }
}
