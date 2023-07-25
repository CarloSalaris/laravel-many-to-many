<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;
use App\Models\Type;


class LoggedController extends Controller
{
    public function show($id) {

        $project = Project :: findOrFail($id);

        return view('logged.show', compact('project'));
    }

    public function create() {

        $type = Type :: all();

        return view('create', compact('type'));
    }
}
