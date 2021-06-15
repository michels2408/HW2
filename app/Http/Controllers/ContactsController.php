<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use DB;
use Centre;
use Session;

class ContactsController extends BaseController
{
    public function contacts() {
        if(session('user_id') != null) {
            $employees = Centre::all();

            return view('contacts')->with('employees', $employees);
        } else {
            return redirect('login');
        }
    }
}
?>