<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;
    /**
     * パスワードをリセットした後のユーザリダイレクト先
     *
     * @var string
     */
    protected $redirectTo = '/home';
    /**
     * 新しいコントローラインスタンスの生成
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
}
