<?php

    use Illuminate\Database\Eloquent\Model;

    class Centre extends Model {
        protected $table = 'CENTRO';
        protected $primaryKey = 'codice';

        public function user() {
            return $this->hasMany('User', 'centro', 'codice');
        }
    }

?>