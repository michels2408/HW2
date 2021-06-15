<?php

    use Illuminate\Database\Eloquent\Model;

    class LikesProducts extends Model {
        protected $table = 'LIKES_PRODOTTO';

        protected $fillable = [
            'cliente', 'prodotto'
        ];

        public function user() {
            return $this->belongsTo('User', 'cliente');
        }

        public function product() {
            return $this->belongsTo('Products', 'prodotto');
        }
    }
?>