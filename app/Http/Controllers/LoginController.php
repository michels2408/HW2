<?php
    namespace App\Http\Controllers;

    use Illuminate\Routing\Controller as BaseController;
    use Request;
    use User;
    use Session;

    class LoginController extends BaseController
    {
        public function login() {
            if(session('user_id') != null) {
                return redirect('home');
            } else {
                $old_username = Request::old('username');
                return view('login')
                    ->with('csrf_token', csrf_token())
                    ->with('old_username', $old_username);
            }
        }

        public function checkLogin() {
            $user = User::where('username', request('username'))->where('password', request('password'))->first();
            if(isset($user)) {
                Session::put('user_id', $user->ID);
                return redirect('home');
            } else {
                return redirect('login')->withInput();
            }
        }

        public function logout() {
            Session::flush();
            return redirect('login');
        }
    }

?>