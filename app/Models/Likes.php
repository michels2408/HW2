<?php

    use Illuminate\Database\Eloquent\Model;

    class Likes extends Model {
        protected $table = 'LIKES';

        protected $fillable = [
            'cliente', 'commento'
        ];

        public function user() {
            return $this->belongsTo('User', 'cliente');
        }

        public function comment() {
            return $this->belongsTo('Products', 'commento');
        }
    }
?>