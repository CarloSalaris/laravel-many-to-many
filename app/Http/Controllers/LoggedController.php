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

    public function edit($id) {

        $project = Project :: findOrFail($id);
        $technologies = Technology :: all();
        $types = Type :: all();

        return view('edit', compact('project', 'types', 'technologies'));
    }

    public function update(Request $request, $id) {

        $project = Project :: findOrFail($id);
        $data = $request->all();

        $project->update($data);

        // IF ARRAY EMPTY
        // OPTION 1
        if (array_key_exists('technologies', $data))
            $project->technologies()->sync($data['technologies']);
        else
            $project->technologies()->detach();

        //OPTION 2 (con ternario)
        /* $project -> technologies() -> sync((array_key_exists('technologies', $data)) ? $data['technologies'] : []); */


        return redirect()->route('logged.show', $project->id);

    }
}
