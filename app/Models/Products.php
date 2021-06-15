<?php

    use Illuminate\Database\Eloquent\Model;

    class Products extends Model {
        protected $table = 'PRODOTTO';
        protected $primaryKey = 'codice';

        public function likes_product() {
            return $this->hasMany('LikesProducts', 'prodotto', 'ID');
        }
    }
?>