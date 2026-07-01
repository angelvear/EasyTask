<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Task;
use App\Models\Group;

class TaskController extends Controller
{
public function taskView($groupId)
    {
        $tasks = Task::select('tarea_id', 'titulo', 'estatus', 'usuario_id', DB::raw("DATE_FORMAT(fecha_limite, '%d-%m-%Y') as fecha_formato"))
            ->where('grupo_id', $groupId)
            ->get();

        $groups = Group::select('share')
            ->where('id', $groupId)
            ->get();

        return view('tasks.taskView', ['tasks' => $tasks, 'groups' => $groups->first()]);
    }

    public function newTask(Request $request, $groupId)
    {

        $task = Task::create([
            'titulo' => $request->input('titulo'),
            'estatus' => $request->input('estado'),
            'fecha_limite' => $request->input('deadline'),
            'usuario_id' => auth()->id(),
            'grupo_id' => $groupId,
        ]);
        return redirect()->route('dashboard')->with('success', 'Tarea creada exitosamente');
    }
    

    public function deleteTask($tarea_id)
    {
        $task = Task::findOrFail($tarea_id);

        if ($task->usuario_id === auth()->id()) 
        {

           Task::destroy($tarea_id);
        }

        return redirect()->route('dashboard')->with('success', 'Tarea eliminada exitosamente');
    }

    public function completeTask($tarea_id)
    {
     $task = Task::findOrFail($tarea_id);
     

            $task->estatus = 'completada';
            $task->save();
        
        return redirect() -> route('dashboard');
    }

    

}

?>