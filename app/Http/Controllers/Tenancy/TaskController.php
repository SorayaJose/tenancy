<?php

namespace App\Http\Controllers\Tenancy;

use App\Http\Controllers\Controller;
use App\Models\Task;
use GuzzleHttp\RetryMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::paginate();
        return view('tenancy.tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tenancy.tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*
        if ($request->file('image_url')) {

          } else {
      
            echo 'file not found';
          }
        */

        $data = $request->validate(
            [
                'name' => 'required',
                'description' => 'required',
                'image_url' => 'required|image',
            ]
        );


        $data['image_url'] = Storage::put('tasks', $request->file('image_url'));

        Task::create($data);
        return redirect()->route('tasks.index')->with('sucess', 'Se agregó la tarea ok');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('tenancy.tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('tenancy.tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $data = $request->validate(
            [
                'name' => 'required',
                'description' => 'required',
                'image_url' => 'nullable|image',
            ]
        );


        // verificar si se envio una imagen
        if ($request->hasFile('image_url')) {
            // eliminar imagen anterior
            Storage::delete($task->image_url);

            // guardar la nueva iamgen
            $data['image_url'] = Storage::put('tasks', $request->file('image_url'));
        }
        
        $task->update($data);
        return redirect()->route('tasks.index')->with('sucess', 'Se modificó la tarea ok');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        Storage::delete($task->image_url);
        $task->delete();

        return redirect()->route('tasks.index')->with('sucess', 'Se eliminó la tarea ok');
    }
}
