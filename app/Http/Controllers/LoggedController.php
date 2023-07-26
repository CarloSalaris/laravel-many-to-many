<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Project;
use App\Models\Type;
use  Illuminate\Support\Facades\Auth;


class LoggedController extends Controller
{
    public function show($id) {

        $project = Project :: findOrFail($id);

        return view('logged.show', compact('project'));
    }

    public function create() {

        $users = User :: all();
        $types = Type :: all();

        return view('create', compact('users','types'));
    }

    public function store(Request $request) {
        $data = $request->all();

        $data['user_id'] = Auth::id();

        $project = Project :: create($data);
        // $project -> user_id = Auth :: id();
        $new_project = new Project();

        return redirect() -> route("logged.show", $project -> id);

    }
}
