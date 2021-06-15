<?php

    use Illuminate\Database\Eloquent\Model;

    class AllServices extends Model {
        protected $table = 'tutti_servizi';

        public function service() {
            return $this->belongsTo('Service', 'ID', 'codice');
        }
    }

?>