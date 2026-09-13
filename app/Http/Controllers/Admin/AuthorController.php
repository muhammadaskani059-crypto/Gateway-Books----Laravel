<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Country;
use File;

class AuthorController extends Controller
{
    function index()
    {
        $searchTerm = request()->get('s');
        $authors = Author::orWhere('title', 'LIKE', "%$searchTerm%")->latest()->paginate(15);
        return view('admin/author/index')
            ->with(compact('authors'));
    }

    function create()
    {
        $countries = Country::get();
        return view('admin/author/create')
            ->with(compact('countries'));
    }

    function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
                'slug' => 'required',
                'designation' => 'required',
                'dob' => 'required',
                'email' => 'required|unique:author,email',
                'country' => 'required|not_in:none',
            ],
            [
                'title.required' => 'Title shouldnt be empty!',
                'slug.required' => 'Slug shouldnt be empty!',
                'designation.required' => 'Designation shouldnt be empty!',
                'dob.required' => 'Date of Birth shouldnt be empty!',
                'email.required' => 'Email shouldnt be empty!',
                'email.unique' => 'Email should be unique!',
                'country.not_in' => 'Select a country!',
            ]
        );

        $fileName = null;
        if (request()->hasFile('author_img')) {
            $file = request()->file('author_img');
            $fileName = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
            $file->move('./uploads/', $fileName);
        }

        Author::create([
            'title' => $request->get('title'),
            'slug' => $request->get('slug'),
            'designation' => $request->get('designation'),
            'dob' => $request->get('dob'),
            'country' => $request->get('country'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'description' => $request->get('description'),
            'author_feature' => $request->get('author_feature'),
            'facebook_id' => $request->get('facebook_id'),
            'twitter_id' => $request->get('twitter_id'),
            'youtube_id' => $request->get('youtube_id'),
            'pinterest_id' => $request->get('pinterest_id'),
            'author_img' => $fileName,
            'status' => 'DEACTIVE',
        ]);

        return redirect()->to('admin/author');
    }

    function edit($id)
    {
        $author = Author::findOrFail($id);
        $countries = Country::get();
        return view('admin/author/edit')
            ->with(compact('author', 'countries'));
    }

    function update(Request $request, $id)
    {
        $author = Author::findOrFail($id);

        $currentImage = $author->author_img;
        $fileName = null;
        if (request()->hasFile('author_img')) {
            $file = request()->file('author_img');
            $fileName = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
            $file->move('./uploads/', $fileName);
        }

        $author->update([
            'title' => $request->get('title'),
            'slug' => $request->get('slug'),
            'designation' => $request->get('designation'),
            'dob' => $request->get('dob'),
            'country' => $request->get('country'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'description' => $request->get('description'),
            'author_feature' => $request->get('author_feature'),
            'facebook_id' => $request->get('facebook_id'),
            'twitter_id' => $request->get('twitter_id'),
            'youtube_id' => $request->get('youtube_id'),
            'pinterest_id' => $request->get('pinterest_id'),
            'author_img' => ($fileName) ? $fileName : $currentImage
        ]);

        if ($fileName)
            File::delete('./uploads/' . $currentImage);

        return redirect()->to('admin/author');

    }

    function delete($id)
    {
        $author = Author::findOrFail($id); //where
        $currentImage = $author->author_img;
        $author->delete(); // query for deleting record.
        File::delete('./uploads/' . $currentImage);
        // return redirect()->back();
        return 'true';
    }

    function status($id)
    {
        sleep(1);
        $author = Author::findOrFail($id);

        $newStatus = ($author->status == 'DEACTIVE') ? 'ACTIVE' : 'DEACTIVE';

        $author->update([
            'status' => $newStatus
        ]);

        echo $newStatus;

    }

    public function active_all_status(Request $request)
    {
        $checkAll = $request->get('checkAll');
        foreach ($checkAll as $id) {
            echo Author::where('id', $id)->update([
                'status' => 'ACTIVE'
            ]);
        }
    }

    public function deactive_all_status(Request $request)
    {
        $checkAll = $request->get('checkAll');
        foreach ($checkAll as $id) {
            echo Author::where('id', $id)->update([
                'status' => 'DEACTIVE'
            ]);
        }
    }

    public function delete_all(Request $request)
    {
        $checkAll = $request->get('checkAll');
        foreach ($checkAll as $id) {
            echo $author = Author::where('id', $id)->delete();
        }
    }
}