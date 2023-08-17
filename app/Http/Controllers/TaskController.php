<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task2;
use Session;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title="Task List";
        $task=Task2::get();
        return view('task.index',compact('task','page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title="task create form ";
        return view('task.add',compact('page_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        $this->validate($request,[
            'task_name'=>'required',
            'priority'=>'required'
        ]);

        Task2::create([
            'task_name'=>$request->get('task_name'),
            'priority'=>$request->get('priority'),
        ]);
        $request->session()->flash('alert-success', 'task created successfully');
        return redirect('task');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_title="task edit form";
        $task= Task2::find($id);
        return view('task.edit',compact('task','page_title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'task_name'=>'required',
            'priority'=>'required',
            
        ]);
        $task=Task2::find($id);
        $task->task_name=$request->get('task_name');
        $task->priority=$request->get('priority');
        $task->save();
        $request->session()->flash('alert-success', 'task updated successfully');
        return redirect('task');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $task= Task2::find($id);
        $task->delete();
        $request->session()->flash('alert-danger',' deleted successfully');
        return redirect('task');
    }
}
