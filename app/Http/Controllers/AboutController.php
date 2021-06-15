<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use DB;
use Session;
use Centre;
use Department;
use Employee;

class AboutController extends BaseController
{
    public function about() {
        if(session('user_id') != null) {
            return view('about');
        } else {
            return redirected('login');
        }
    }
    
    public function employees() {
        $maxID = DB::table('DIPARTIMENTO')->max('ID');

        $employeesArray = array();
        for($i = 1; $i < ($maxID + 1); $i++) {
            $department = Department::find($i);

            if($department) {
                $centre = $department->centre;
                $employee = $department->employee;

                $employeesArray[] = array('nome' => $employee[0]->nome, 'cognome' => $employee[0]->cognome,
                                        'data_nascita' => $employee[0]->data_nascita, 
                                        'centro' => $department->centro, 'dip_nome' => $department->nome,
                                        'citta' => $centre->citta);
            }
        }

        return $employeesArray;
    }
}
?>