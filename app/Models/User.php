<?php

    use Illuminate\Database\Eloquent\Model;

    class User extends Model {
        protected $table = 'CLIENTE';
        protected $primaryKey = 'ID';
        protected $hidden = ['password'];
        protected $fillable = [
            'centro', 'cod_fiscale', 'nome', 'cognome', 'data_nascita', 'citta', 'username', 'password'
        ];

        protected $casts = [
            'testo' => 'array'
        ];

        public function centre() {
            return $this->belongsTo('Centre', 'centro', 'codice');
        }

        public function appointment() {
            return $this->hasMany('Appointment', 'cliente', 'ID');
        }

        public function comment() {
            return $this->hasMany('Comment', 'cliente', 'ID');
        }

        public function likes_product() {
            return $this->hasMany('LikesProducts', 'cliente', 'ID');
        }

        public function likes() {
            return $this->hasMany('Likes', 'cliente', 'ID');
        }
    }

?>