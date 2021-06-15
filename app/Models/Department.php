<?php

    use Illuminate\Database\Eloquent\Model;

    class Department extends Model {
        protected $table = 'DIPARTIMENTO';

        public function centre() {
            return $this->belongsTo('Centre', 'centro');
        }

        public function employee() {
            return $this->hasMany('Employee', 'dipartimento', 'ID');
        }

    }

?>