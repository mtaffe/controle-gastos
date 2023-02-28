<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

class UserController extends Controller
{
    public function __construct(User $model) {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $session = Session::get('user');
        $user = User::find($session->id);
        return view('dashboard', ['user' => $user]);
    }

    /**
     * Função responsável por retornar página de Login.
     *
     * @return View
     */
    public function login()
    {
        
        return view('user.login');
    }

    /**
     * Função responsável pela validação de Login.
     *
     * @return View
     */
    public function validateLogin(Request $request)
    {
        $request->validate([
            "email" => 'required',
            "password" => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)) {
            $user = Auth::user();
            Session::put('user', $user);
            return redirect('/dashboard/'. $user->id);
        }

        return redirect('login')->with('success', 'Não foi possível realizar o login.');
    }

    /**
     * Função responsável pelo logout.
     *
     * @return View
     */
    function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }

    /**
     * Tela responsável pelo formulário de criação de novo usuário.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.register');
    }

    /**
     * Função responsável pela persistência no banco de dados de um novo usuário.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            //dd($request);
            $validated = $this->validateUser($request);

            //dd($validated);
            $response = $this->model->create($validated);
        } catch (ValidationException $e) {
            $response = $e->errors();
            return redirect('user')->with('Não foi possível cadastrar o usuário.');
        }
        return redirect('login')->with('Usuário registrado.');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function validateUser(Request $request)
    {
        $messages = [
            "name.required" => "É necessário um nome.",
            "email.required" => "É necessário informar um e-mail."
        ];

        $validated = $request->validate([
            "name" => "required",
            "email" => "required|unique:users,email",
            "password" => "required|min:6",
        ], $messages);

        $validated['password'] = Hash::make($request->password);

        return $validated;
    }
}
