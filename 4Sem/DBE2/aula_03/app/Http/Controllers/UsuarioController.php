<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsuarioController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        return view(
            'listarusuarios',
            [
                'users' => $this->user->all(),
            ]
        );
    }

    public function show($id)
    {
        return view(
            'listarusuarios',
            [
                'users' => $this->user->findOrFail($id),
            ]
        );
    }

    public function create(Request $request)
    {
        $this->user->create($request->all());
        return redirect('users');
    }

    public function edit($id)
    {
        $data = [
            'user' => $this->user->findOrFail($id),
        ];
        return view('editarusuarios', $data);
    }

    public function update(Request $request, $id)
    {
        $user = $this->user->findOrFail($id);
        $user->fill($request->all());
        $user->save();
        return redirect('users');
    }

    public function destroy($id)
    {
        if (User::findOrFail($id)->delete()) {
            return redirect('users');
        } else {
            dd($id);
        }
    }
}