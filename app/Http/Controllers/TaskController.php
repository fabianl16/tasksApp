<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class TaskController extends Controller
{
    /**
     * Despliega las tareas por usuario
     */
    public function index()
    {
        $user = JWTAuth::parseToken()->authenticate();
        $tasks = Task::where('user_id', $user->id)->get();

        return response()->json($tasks);
    }

    /**
     * Crea una nueva tarea
     */
    public function create(Request $request)
    {

        $user = JWTAuth::parseToken()->authenticate();

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,in_progress,completed',
            'due_date' => 'nullable|date',
        ]);

        $validatedData['user_id'] = $user->id;

        $task = Task::create($validatedData);
        return response()->json($task, 201);
    }


    /**
     * Muestra la tarea por id 
     */
    public function show(string $id)
    {
        $user = JWTAuth::parseToken()->authenticate();
        $task = Task::where('id', $id)->where('user_id', $user->id)->firstOrFail();

        return response()->json($task);
    }

    /**
     * Actualiza los datos de la tarea segun las propiedades enviadas
     */
    public function update(Request $request, string $id)
    {
        $user = JWTAuth::parseToken()->authenticate();
        $task = Task::where('id', $id)->where('user_id', $user->id)->firstOrFail();
        $validatedData = $request->validate([
            'title' => 'sometimes|string|max:255', 
            'description' => 'sometimes|nullable|string',
            'status' => 'sometimes|required|in:pending,in_progress,completed',
            'due_date' => 'sometimes|nullable|date',
        ]);
        $task->update($validatedData);

        return response()->json($task);
    }

    /**
     * Elimina una tarea por ID
     */
    public function destroy(string $id)
    {
        $user = JWTAuth::parseToken()->authenticate();
        $task = Task::where('id', $id)->where('user_id', $user->id)->firstOrFail();
        $task->delete();

        return response()->json(null, 204);
    }
}
