<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use DB;
use User;
use Appointment;
use Session;

class HomeController extends BaseController
{
    public function home() {
        $user = User::find(session('user_id'));
        if(isset($user)) {
            return view('home')->with('nome', $user->nome);
        } else {
            return redirect('login')->withInput();
        }
    }

    public function appointment() {
        $user = Session::get('user_id');

        if(isset($user)) {
            $appointments = DB::select("SELECT C2.citta as centro, S.trattamento as trattamento, A.data_app as data,
            A.ora_app as ora, I.nome as nome_imp, I.cognome as cognome_imp
            FROM ((((APPUNTAMENTO A join CLIENTE C1 on A.cliente = C1.ID) join CENTRO C2 on C1.centro = C2.codice) 
            join SERVIZIO S on A.servizio = S.codice) join IMPIEGATO I on A.impiegato = I.ID)
            WHERE C1.ID = ?", [session('user_id')]);

            return $appointments;
        }
    }
}

?>