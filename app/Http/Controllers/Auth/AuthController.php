<?php

namespace Films\Http\Controllers\Auth;

use Films\User;
use Validator;
use Illuminate\Http\Request;
use Films\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = 'localhost/catalogue';
    protected $loginPath = '/';
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout', 'getLogout']]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'login' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:5',
        ]);
    }

    public function postRegister(Request $request)
    {
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            return redirect('register')->with('status','Данный email уже используется!');
        };
        $this->create($request->all());
        return redirect('/');
    }

    public function postLogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->to('catalogue');
        }
        return redirect()->to('/')->with('status', 'Вы ввели неверный пароль, либо пользователь еще не создан');
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'login' => $data['login'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
