<?php

    use Illuminate\Database\Eloquent\Model;

    class Service extends Model {
        protected $table = 'SERVIZIO';
        protected $primaryKey = 'codice';

        public function appointment() {
            return $this->hasMany('Appointment', 'servizio', 'codice');
        }

        public function allServices() {
            return $this->hasMany('AllServices', 'ID', 'codice');
        }
    }

?>