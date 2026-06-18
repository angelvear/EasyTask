<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Group;
use App\Models\Shared;
use Illuminate\Support\Str; 

class GroupController extends Controller
{
// Métodos para crear los grupos nuevos
    public function groupForm()
    {
        return view('groups.newGroup');
    }

    public function newGroup(Request $request)
    {
        $keyrandom = Str::random(8);

        $group = Group::create([
            'titulo' => $request->input('title'),
            'user_id' => auth()->id(),
            'share' => $keyrandom,
        ]);

        return redirect()->route('dashboard')->with('success', 'Grupo creado exitosamente');
        
    }

    //metodo para ver los grupos creados por el usuario

    public function taskForm($groupId)
    {
        $group = Group::findOrFail($groupId);
        return view('tasks.newTask', ['group' => $group]);
    }


    public function deleteGroup($id)
    {
        $group = Group::findOrFail($id);

        if ($group->user_id === auth()->id()) {

           Group::destroy($id);
    }

        return redirect()->route('dashboard')->with('success', 'Grupo eliminado exitosamente');
    }

    public function sharedForm()
    {
        return view('groups.sharedGroup');
    }

    public function joinGroup(Request $request)
    {
        $keyShare = $request->input('key');

        $key = Group::select ('id', 'share')
        ->where('share', $keyShare)
        ->first();

        if ($key && $key->share === $keyShare) {
            // Aquí puedes agregar la lógica para unir al usuario al grupo
            $shared = Shared::create([
                'id_user' => auth()->id(),
                'id_grupo' => $key->id,
            ]);
            return redirect()->route('dashboard')->with('success', 'Te has unido al grupo exitosamente');
        } else {
            return redirect()->route('dashboard')->with('error', 'Código de grupo incorrecto');
        }
    }

    //mostrar los grupos a los que el usuario se ha unido
    public function viewSharedGroups()
    {
        $sharedGroups = Shared::select('id_grupo', 'id_user')
            ->where('id_user', auth()->id())
            ->get();

        $groups = Group::select('id', 'titulo')
            ->whereHas(Shared::class, function ($query) {
                $query->where('id_user', auth()->id());
            })->get();

        return view('dashboard', ['sharedGroups' => $sharedGroups, 'groups' => $groups]);
    }



}


?>