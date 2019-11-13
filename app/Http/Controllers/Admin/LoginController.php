<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\LoginRequest;
use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        return view('backend.users.login');
    }

    public  function  handleLogin(LoginRequest $request)
    {
        $params = $request->all();
        $email = $params['email'];
        $password = $params['password'];

        $user = User::where('email', $email)->first();
        if (!empty($user)) {
            //check has password
            if (!Hash::check($password, $user->password)) {
                return redirect()->back()->withErrors(['password' => 'The password is not valid']);
            }

            //login success
            session(['admin_users' => $user]);
            return redirect(route('admin-home'));
        }
        //login fail
        return redirect(route('admin-login'))->withErrors('The username or password invalid.');
    }

        public function logout(Request $request)
        {
            // Forget a single key
            $request->session()->forget('admin_users');

            $request->session()->flush();

            return redirect(route('admin-login'));
        }
}
