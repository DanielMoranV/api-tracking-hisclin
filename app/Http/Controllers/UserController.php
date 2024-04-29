<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());
        return response()->json($user, 201);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return response()->json($user, 200);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(null, 204);
    }

    // Otras funciones del controlador...

    /**
     * Mostrar a todos los usuarios con sus roles asignados.
     *
     * @return \Illuminate\Http\Response
     */

    public function getUsersWithRoles()
    {
        $usersWithRoles = User::with('roles')->get();
        return response()->json($usersWithRoles);
    }

    /**
     * Mostrar los roles asignados a un usuario específico por su ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getUserRoles($id)
    {
        $user = User::findOrFail($id);
        $userRoles = $user->roles;
        return response()->json(['user' => $user, 'roles' => $userRoles]);
    }
}
