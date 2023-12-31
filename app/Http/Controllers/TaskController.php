<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /**
         * get all tasks
         * render them to the welcome view
         */

        $tasks = Task::with('user')->get(); // paginate / get / raw -> top 10 records basing on a certain filter
//        $tasks = DB::table('tasks')->whereNull('deleted_at')->get();

        return view('welcome', ['tasks' => $tasks]);
//        return view('welcome', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // returns the create page -> create form

        return view('create_task');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
           'description' => 'required|string|min:3'
        ]);

//        $validated['user_id'] = $request->user()->id;
        $validated['user_id'] = auth()->user()->id;


        // insert
        Task::create($validated);
        Alert::success('Success', 'Ticket Created');
//        Alert::toast('Toast Message', 'Toast Type');


//        $task = new Task();
//        $task->description = Str::upper($validated['description']);
//        $task->save();
//
//        DB::table('tasks')->insert([
//           'description' => $validated['description']
//        ]);

        return redirect()->route('task.index')->with('success', 'Task Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {

        return view('task_show',['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        if (!(auth()->user()->id == $task->user_id)){
            Alert::warning('Not Authorised', 'You are not Authorised to Modify this task.');
            return redirect()->route('task.index');
        }

        return view('edit_task', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->all());

//        return redirect('show/task/'.$task->id)->with('success', "Task Updated Successfully");
//        return redirect()->back()->with('success', "Task Updated Successfully");
        return redirect()->route('task.show', $task->id)->with('success', "Task Updated Successfully");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
//        $task->delete();
//        $task->forceDelete();
        DB::table('tasks')->where('id', $task->id)->update([
            'deleted_at' => Carbon::now()
        ]);

        return redirect('/')->with('success', 'Task Deleted Successfully');

    }
}
