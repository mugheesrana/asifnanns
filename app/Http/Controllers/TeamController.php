<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{


    // Show all team members
    public function index()
    {
        $teams = Team::all();
        return view('admin.teams.index', compact('teams'));
    }

    // Show form to create new team member
    public function create()
    {
        return view('admin.teams.create');
    }

    // Store new team member
    public function store(Request $request)
    {
        $data = $request->except('image');

        // Handle image upload to public/uploads/teams
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $path = public_path('uploads/teams');

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            $file->move($path, $filename);
            $data['image'] = 'uploads/teams/' . $filename;
        }

        Team::create($data);

        return back()->with('success', 'Team member added successfully.');
    }

    // Delete team member
    public function destroy($id)
    {
        $team = Team::findOrFail($id);

        // Delete the image file if it exists
        if ($team->image && file_exists(public_path($team->image))) {
            unlink(public_path($team->image));
        }

        $team->delete();

        return redirect()->back()->with('success', 'Team member deleted successfully.');
    }

}
