<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Http\Requests\StoretodosRequest;
use App\Http\Requests\UpdatetodosRequest;
use http\Env\Request;
use Illuminate\Support\Facades\DB;

class TodosController extends Controller
{

    public function index(){
        $todos = DB::table('todo')->orderBy('id')->get();
        return view('index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $name = \request("name");
        DB::table('todo')->insert([
            'name' => $name,
            'status' => 0
        ]);

        return redirect()->back()->with('status', 'Task Added');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoretodosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoretodosRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todos
     * @return \Illuminate\Http\Response
     */
    public function show(todo $todos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todos
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $id = \request("id");
        $name = \request("edit");

        DB::table('todo')->where('id', $id)->update(['name' => $name]);
        return redirect()->back()->with('status', 'Task updated!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatetodosRequest  $request
     * @param  \App\Models\Todo  $todos
     * @return \Illuminate\Http\Response
     */
    public function update($id, $status)
    {
        DB::table('todo')->where('id', $id)->where('status', $status)->update(['status' => !$status]);
        return redirect()->back()->with('status', 'Task updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('todo')->where('id', $id)->delete();
        return redirect()->back()->with('status', 'Deleted');;
    }
}
