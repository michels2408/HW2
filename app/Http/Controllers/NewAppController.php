<?php
    namespace App\Http\Controllers;

    use Illuminate\Routing\Controller as BaseController;
    use DB;
    use Session;
    use Request;
    use User;
    use Appointment;
    use Employee;
    use Service;

    class NewAppController extends BaseController
    {
        public function newAppointment() {
            if(session('user_id') != null) {
                return view('new_appointment')
                    ->with('csrf_token', csrf_token());
            } else {
                return redirected('login');
            }
        }

        public function searchEmployee($query) {
            $employee = DB::select("SELECT I.nome as nome, I.cognome as cognome, S.trattamento as trattamento
            FROM ((((CLIENTE C join DIPARTIMENTO D on C.centro = D.centro) join IMPIEGATO I on D.ID = I.dipartimento)
            join OFFERTA O on D.ID = O.dipartimento) join SERVIZIO S on O.servizio = S.codice)
            WHERE C.ID = ? and S.trattamento = ?", [session('user_id'), $query]);

            return $employee;
        }

        public function checkAppointment() {
            $request = request();

            //Data dell'appuntamento
            $day = $request->date;

            $dayofweek = date('w', strtotime($day));
            if($dayofweek != "0" && $dayofweek != "6") {
                $employee = $this->getEmployee($request->type);
                $service = $this->getService($request->service);

                $newAppointment = Appointment::create([
                    'cliente' => session('user_id'),
                    'impiegato' => $employee->ID,
                    'servizio' => $service->codice,
                    'data_app' => $request->date,
                    'ora_app' => $request->time
                ]);

                if ($newAppointment) {
                    return redirect('home');
                } else {
                    return view('new_appointment')->withInput();
                }
            } else {
                return redirect('new_appointment');
            }
        }

        public function getEmployee($data) {
            $name_surname = explode(" ", $data);
            $employee = Employee::where('nome', $name_surname[0])->where('cognome', $name_surname[1])->first();
            
            return $employee;
        }

        public function getService($data) {
            $service = Service::where('trattamento', $data)->first();

            return $service;
        }

    }
?>