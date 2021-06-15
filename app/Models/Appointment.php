<?php

    use Illuminate\Database\Eloquent\Model;

    class Appointment extends Model {
        protected $table = 'APPUNTAMENTO';

        protected $fillable = [
            'cliente', 'impiegato', 'servizio', 'data_app', 'ora_app'
        ];

        public function user() {
            return $this->belongsTo('User', 'cliente');
        }

        public function service() {
            return $this->belongsTo('Service', 'servizio', 'codice');
        }

        public function employee() {
            return $this->belongsTo('Employee', 'impiegato');
        }  

    }
?>