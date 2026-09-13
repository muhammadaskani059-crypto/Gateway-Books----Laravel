<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    function index() {
        $searchTerm = request()->get('s');
        $categorys = Category::orWhere('title', 'LIKE', "%$searchTerm%")->latest()->paginate(15);
        return view('admin/category/index')
            ->with(compact('categorys'));
    }

    function create() {
        return view('admin/category/create');
    }

    function store(Request $request) {
         $request->validate([
            'title' => 'required',
            'slug' => 'required',
        ],
        [
            'title.required' => 'Title shouldnt be empty!',
            'slug.required' => 'Slug shouldnt be empty!',
        ]);

        Category::create([
            'title' =>  $request->get('title'),
            'slug' =>  $request->get('slug'),
            'description' =>  $request->get('description'),
            'status' =>  'DEACTIVE',
        ]);

        return redirect()->to('admin/category');
    }

    function edit($id) {
        $category = Category::findOrFail($id);
        return view('admin/category/edit')
            ->with(compact('category' ));
    }

    function update(Request $request, $id) {
        $category = Category::findOrFail($id);
        $category->update([
            'title' =>  $request->get('title'),
            'slug' =>  $request->get('slug'),
            'description' =>  $request->get('description'),
        ]);

        return redirect()->to('admin/category');
    }

    function delete($id) {
        // Delete your data.
        $category = Category::findOrFail($id);
        $category->delete();
        
        return redirect()->back();
    }

    function status($id) {
        $category = Category::findOrFail($id);

        $newStatus = ($category->status == 'DEACTIVE') ? 'ACTIVE' : 'DEACTIVE';

        $category->update([
            'status' => $newStatus
        ]);

        return redirect()->back();
    }
}
