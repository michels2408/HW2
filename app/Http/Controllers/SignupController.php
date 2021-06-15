<?php
    namespace App\Http\Controllers;

    use Illuminate\Routing\Controller as BaseController;
    use Session;
    use Request;
    use User;
    use Hash;

    class SignupController extends BaseController
    {
        public function signup() {
            if(session('user_id') != null) {
                return redirect('home');
            } else {
                return view('signup')
                    ->with('csrf_token', csrf_token());
            }
        }

        public function newClient() {
            $request = request();

            if($this->countErrors($request) === 0) {
                if($request->branch == "Roma") {
                    $branch = "1";
                } else if($request->branch == "Milano") {
                    $branch = "2";
                } else if($request->branch == "Bologna") {
                    $branch = "3";
                }

                $newClient = User::create([
                    'centro' => $branch,
                    'cod_fiscale' => $request->cf,
                    'nome' => $request->name,
                    'cognome' => $request->surname,
                    'data_nascita' => $request->dob,
                    'citta' => $request->city,
                    'username' => $request->username,
                    'password' => Hash::make($request->password)
                ]);
                
                if ($newClient) {
                    Session::put('user_id', $newClient->id);
                    return redirect('home');
                } 
                else {
                    return redirect('signup')->withInput();
                }

            } else {
                return redirect('signup')->withInput();
            }
        }
    
        private function countErrors($data) {
            $error = array();

            if(strlen($data["cf"]) != 16) {
                $error[] = "Il codice fiscale ha più di 16 cifre";
            } else {
                $cf = User::where('cod_fiscale', $data['cf'])->first();
                if ($cf !== null) {
                    $error[] = "Codice fiscale già utilizzato";
                }    
            }

            if(!preg_match('/^[a-zA-Z0-9_-]{1,15}$/', $data['username'])) {
                $error[] = "Username non valido";
            } else {
                $username = User::where('username', $data['username'])->first();
                if ($username !== null) {
                    $error[] = "Username già utilizzato";
                }
            }

            if (strlen($data["password"]) < 8  || strlen($data["password"]) > 15) {
                $error[] = "Caratteri password insufficienti o eccessivi";
            } 
            
            if (strcmp($data["password"], $data["confirm_password"]) != 0) {
                $error[] = "Le password non coincidono";
            }

            return count($error);
        }

        public function checkUsername($query) {
            $exist = User::where('username', $query)->exists();
            return ['exists' => $exist];
        }
    }

?>