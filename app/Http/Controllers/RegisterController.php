<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;

use App\People;
use App\User;

class RegisterController extends Controller
{
    use RegistersUsers;

    public function __construct()
    {
    	$this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('user.register');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'pin'       => 'required|digits_between:8,9/|unique:people',
            'nombre'    => 'required|max:255|regex:/^[a-zA-Z]+(?:\s?[a-zA-Z]\s?)+$/',
            'apellido'  => 'required|max:255|regex:/^[a-zA-Z]+(?:\s?[a-zA-Z]\s?)+$/',
            'direccion' => 'required|max:255|string',
            'telefono'  => 'required|string|max:11',
            'email'     => 'required|string|email|max:255|unique:people',
            'user'      => 'required|string|unique:users|',
            'clave'     => 'required|string|min:6|confirmed',
        ]);
    }

    protected function create(array $data)
    {
    	dd($data);

    	$peopleid;

        return User::create([
            'user' => $data['user'],
            'password' => bcrypt($data['clave']),
            'people_id' => $peopleid,
        ]);
    }

}
