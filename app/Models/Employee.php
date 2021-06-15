<?php

    use Illuminate\Database\Eloquent\Model;

    class Employee extends Model {
        protected $table = 'IMPIEGATO';

        public function department() {
            return $this->belongsTo('Department', 'dipartimento');
        }

        public function appointment() {
            return $this->hasMany('Appointment', 'impiegato', 'ID');
        }

    }

?>