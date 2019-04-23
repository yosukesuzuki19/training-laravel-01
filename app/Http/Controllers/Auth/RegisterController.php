<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    use RegistersUsers;
    /**
     * 登録後のユーザリダイレクト先
     *
     * @var string
     */
    protected $redirectTo = '/home';
    /**
     * RegisterController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    /**
     * 送られてきたユーザ登録リクエストのバリデター取得
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'url_name' => [
                'required',
                'string',
                'alpha_num',
                'max:15',
                Rule::unique('users'),
                Rule::notIn($this->unavailableUrlNames()),
            ],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')],
            'password' => ['required', 'string', 'alpha_num', 'min:8', 'confirmed'],
        ]);
    }
    /**
     * ユーザー名として使用できない名前定義
     *
     * @return array
     */
    protected function unavailableUrlNames(): array
    {
        return ['home', 'login', 'settings', 'logout', 'register', 'password', 'profile', 'user'
            , 'search', 'following', 'followers', 'account', 'profile'];
    }
    /**
     * ユーザ登録成功後の新しいユーザインスタンス取得
     *
     * @param  array $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'url_name' => $data['url_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'display_name' => $data['url_name'],
            'avatar' => 'images/no-thumb.png',
        ]);
    }
}
