<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use File;

class TeamController extends Controller
{
    function index() {
        $searchTerm = request()->get('s');
        
        $teams = Team::orWhere('fullname', 'LIKE', "%$searchTerm%")->latest()->paginate(15);
        return view('admin/team/index')
            ->with(compact('teams'));       
    }

    function create() {
        return view('admin/team/create');
    }

    function store(Request $request) {
        $request->validate([
            'fullname' => 'required',
            'designation' => 'required',
            'email' => 'required|unique:team,email',
            'facebook_id' => 'required|unique:team,facebook_id',
            'twitter_id' => 'required|unique:team,twitter_id',
            'pinterest_id' => 'required|unique:team,pinterest_id',
        ],
        [
            'fullname.required' => 'Fullname shouldnt be empty!',
            'designation.required' => 'Designation shouldnt be empty!',
            'email.unique' => 'Email should be unique!',
            'facebook_id.unique' => 'Facebook id should be unique!',
            'twitter_id.unique' => 'Twitter id should be unique!',
            'pinterest_id.unique' => 'Pinterest id should be unique!',
            
        ]);

        $fileName = null;
        if (request()->hasFile('team_img')) 
        {
            $file = request()->file('team_img');
            $fileName =  md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
            $file->move('./uploads/', $fileName);
        }

        Team::create([ 
            'fullname' =>  $request->get('fullname'),
            'designation' =>  $request->get('designation'),
            'telephone' =>  $request->get('telephone'),
            'mobile' =>  $request->get('mobile'),
            'email' =>  $request->get('email'),
            'facebook_id' =>  $request->get('facebook_id'),
            'twitter_id' =>  $request->get('twitter_id'),
            'pinterest_id' =>  $request->get('pinterest_id'),
            'profile' =>  $request->get('profile'),
            'team_img' =>  $fileName,
            'status' =>  'DEACTIVE',
        ]);
        return redirect()->to('admin/team');
    }

    function edit($id) {
        $team = Team::findOrFail($id);
        return view('admin/team/edit')
            ->with(compact('team' ));
    }

    function update(Request $request, $id) {
        $team = Team::findOrFail($id);

        $currentImage = $team->team_img;
        $fileName = null;
        if (request()->hasFile('team_img')) 
        {
            $file = request()->file('team_img');
            $fileName =  md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
            $file->move('./uploads/', $fileName);
        }

        $team->update([
            'fullname' =>  $request->get('fullname'),
            'designation' =>  $request->get('designation'),
            'telephone' =>  $request->get('telephone'),
            'mobile' =>  $request->get('mobile'),
            'email' =>  $request->get('email'),
            'facebook_id' =>  $request->get('facebook_id'),
            'twitter_id' =>  $request->get('twitter_id'),
            'pinterest_id' =>  $request->get('pinterest_id'),
            'profile' =>  $request->get('profile'),
            'team_img' =>  ($fileName) ? $fileName : $currentImage
        ]);

        if ($fileName) 
            File::delete('./uploads/' . $currentImage);

        return redirect()->to('admin/team');
    }

    function delete($id) {
        // Delete your data.
        $team = Team::findOrFail($id);
        $currentImage = $team->team_img;
        $team->delete();
        File::delete('./uploads/' . $currentImage);

        return redirect()->back();
    }

    function status($id) {
        $team = Team::findOrFail($id);

        $newStatus = ($team->status == 'DEACTIVE') ? 'ACTIVE' : 'DEACTIVE';

        $team->update([
            'status' => $newStatus
        ]);

        return redirect()->back();
    }
}
