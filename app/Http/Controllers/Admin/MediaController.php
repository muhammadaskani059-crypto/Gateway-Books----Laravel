<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Media;
use File;

class MediaController extends Controller
{
    function index() {
        $searchTerm = request()->get('s');
        $medias = Media::orWhere('title', 'LIKE', "%$searchTerm%")->latest()->paginate(15);
        return view('admin/media/index')
            ->with(compact('medias'));  
    }

    function create() {
        return view('admin/media/create');
    }

    function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'media_type' => 'required|not_in:none'
        ],
        [
            'title.required' => 'Title shouldnt be empty!',
            'slug.required' => 'Slug shouldnt be empty!',
            'media_type.not_in' => 'Select a Media!',
        ]);

        $fileName = null;
        if (request()->hasFile('media_img')) 
        {
            $file = request()->file('media_img');
            $fileName =  md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
            $file->move('./uploads/', $fileName);
        }

        Media::create([
            'title' =>  $request->get('title'),
            'slug' =>  $request->get('slug'),
            'media_type' =>  $request->get('media_type'),
            'media_img' =>  $fileName,
            'description' =>  $request->get('description'),
            'status' =>  'DEACTIVE',           
        ]);

        return redirect()->to('admin/media');
    }

    function edit($id) {
        $media = Media::findOrFail($id);
        return view('admin/media/edit')
            ->with(compact('media' ));
    }

    function update(Request $request, $id) {
        $media = Media::findOrFail($id);

        $currentImage = $media->media_img;
        $fileName = null;
        if (request()->hasFile('media_img')) 
        {
            $file = request()->file('media_img');
            $fileName =  md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
            $file->move('./uploads/', $fileName);
        }

        $media->update([
            'title' =>  $request->get('title'),
            'slug' =>  $request->get('slug'),
            'media_type' =>  $request->get('media_type'),
            'media_img' =>  ($fileName) ? $fileName : $currentImage,
            'description' =>  $request->get('description'),
        ]);

        if ($fileName) 
            File::delete('./uploads/' . $currentImage);

        return redirect()->to('admin/media');
    }

    function delete($id) {
        // Delete your data.
        $media = Media::findOrFail($id);
        $currentImage = $media->media_img;
        $media->delete();
        File::delete('./uploads/' . $currentImage);    

        return redirect()->back();
    }

    function status($id) {
        $media = Media::findOrFail($id);

        $newStatus = ($media->status == 'DEACTIVE') ? 'ACTIVE' : 'DEACTIVE';

        $media->update([
            'status' => $newStatus
        ]);

        return redirect()->back();
    }
}
