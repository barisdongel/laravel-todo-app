<?php

namespace App\Http\Controllers;

use App\Models\todos;
use App\Http\Requests\StoretodosRequest;
use App\Http\Requests\UpdatetodosRequest;
use Illuminate\Support\Facades\DB;

class TodosController extends Controller
{

    public function index(){
        $todos = DB::table('todos')->get();
        return view('index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $name = \request("name");
        DB::table('todos')->insert([
            'name' => $name,
            'status' => 0
        ]);


        $todos = DB::table('todos')->get();
        return view('index', compact('todos'));
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
     * @param  \App\Models\todos  $todos
     * @return \Illuminate\Http\Response
     */
    public function show(todos $todos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\todos  $todos
     * @return \Illuminate\Http\Response
     */
    public function edit(todos $todos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatetodosRequest  $request
     * @param  \App\Models\todos  $todos
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        DB::update('UPDATE todos SET status = true where id = ?', [$id]);

        $todos = DB::table('todos')->get();
        return view('index', compact('todos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\todos  $todos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('DELETE FROM todos WHERE id = ?', [$id]);

        $todos = DB::table('todos')->get();
        return view('index', compact('todos'));
    }
}
