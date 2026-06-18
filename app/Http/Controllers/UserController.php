<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Group;
use App\Models\Task;
use App\Models\Shared;

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

    public function viewGroups()
    {
        $groups = Group::select('id', 'titulo')
            ->where('user_id', auth()->id())
            ->get();
        

        $sharedGroups = Shared::where('id_user', auth()->id())
            ->pluck('id_grupo');

        $groupsJoin = Group::select('id', 'titulo')
            ->whereIn('id', $sharedGroups)
            ->get();

        return view('dashboard', ['groups' => $groups, 'groupsJoin' => $groupsJoin]);
    }
}