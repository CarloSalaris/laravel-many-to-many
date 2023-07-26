<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Technology;
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

        $technologies = Technology :: all();
        $types = Type :: all();

        return view('create', compact('technologies','types'));
    }

    public function store(Request $request) {

        /* dd($request->all()); */

        $data = $request->all();

        $data['user_id'] = Auth::id();

        $project = Project :: create($data);
        $project -> technologies() -> attach($data['technologies']);
        // $project -> user_id = Auth :: id();

        return redirect() -> route("logged.show", $project -> id);

    }
}
