<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();
        return view('usuarios.index',[
            'usuarios' => $usuarios
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $name = $request->input('name');
        $surname = $request->input('surname');
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');

        $user = new User();

        $user->name = $name;
        $user->surname = $surname;
        $user->username = $username;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->role = 'user';

        $user->save();

        return redirect()->route('usuarios.index')->with(['message'=>'<i class="bi bi-check-circle-fill"></i> Usuario creado exitosamente']);
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
        $user = User::find($id);
        
        if ($user) {
            return view('usuarios.edit', [
                'user' => $user
            ]);
        }

        return redirect()->route('usuarios.index')->with(['message' => '<i class="bi bi-exclamation-triangle-fill"></i> Ha ocurrido un error inesperado']);
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
        $validate = $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users,username,'.$id],
            'email' => ['nullable', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
            'password' => ['nullable', 'string', 'min:8', 'confirmed']
        ]);

        $name = $request->input('name');
        $surname = $request->input('surname');
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::find($id);

        $user->name = $name;
        $user->surname = $surname;
        $user->username = $username;
        $user->email = $email;

        if(!is_null($password)) {
            $user->password = Hash::make($password);
        }

        if ($username=="admin") {
            $user->role = 'admin';
        } else {
            $user->role = 'user';
        }
        
        $user->save();

        return redirect()->route('usuarios.index')->with(['message'=>'<i class="bi bi-check-circle-fill"></i> Usuario actualizado exitosamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $auth = \Auth::user();
        $user = User::find($id);

        if ($auth && $user) {

            $user->delete();
            $message = '<i class="bi bi-check-circle-fill"></i> Registro eliminado satisfactoriamente';

        } else {

            $message = '<i class="bi bi-exclamation-triangle-fill"></i> Ha ocurrido un error al eliminar';

        }

        return redirect()->route('usuarios.index')->with([
            'message' => $message
        ]);
    }
}
