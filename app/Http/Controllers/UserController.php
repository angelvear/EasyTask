<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Group;
use App\Models\Task;

class UserController extends Controller
{
    public function index()
    {   
    $users = DB::table('users')
            ->select('id', 'name', 'email as user_email')
            ->get();

    return view('configuration', ['users' => $users]);
    }

    public function edit($id)
    {
        $users = DB::table('users')
            ->select('id', 'name', 'email as user_email')
            ->where('id', $id)
            ->first();

        return view('admin.users.edituser', ['users' => $users]);
    }

    public function update(Request $request, $id)
    {
        DB::table('users')
            ->where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
            ]);

        return redirect()->route('configuration');
    }


    // Métodos para crear los grupos nuevos
    public function groupForm()
    {
        return view('groups.newGroup');
    }

    public function newGroup(Request $request)
    {
        $group = Group::create([
            'titulo' => $request->input('title'),
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('dashboard')->with('success', 'Grupo creado exitosamente');
        
    }

    //metodo para ver los grupos creados por el usuario
    public function viewGroups()
    {
        $groups = Group::select('id', 'titulo')
            ->where('user_id', auth()->id())
            ->get();
        return view('dashboard', ['groups' => $groups]);
    }

    public function taskView($groupId)
    {
        $tasks = Task::select('tarea_id', 'titulo', 'estatus', 'fecha_limite')
            ->where('grupo_id', $groupId)
            ->get();
        return view('tasks.taskView', ['tasks' => $tasks]);
    }

    
    public function taskForm($groupId)
    {
        $group = Group::findOrFail($groupId);
        return view('tasks.newTask', ['group' => $group]);
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
    public function deleteGroup($id)
    {
        $group = Group::findOrFail($id);

        if ($group->user_id === auth()->id()) {

           Group::destroy($id);
    }

        return redirect()->route('dashboard')->with('success', 'Grupo eliminado exitosamente');
    }
}