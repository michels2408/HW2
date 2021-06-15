<?php

    use Illuminate\Database\Eloquent\Model;

    class Comment extends Model {
        protected $table = 'COMMENTO';

        protected $fillable = [
            'cliente', 'testo', 'giorno', 'ora'
        ];

        public function user() {
            return $this->belongsTo('User', 'cliente', 'ID');
        }

        public function likes_product() {
            return $this->hasMany('Likes', 'commento', 'ID');
        }
    }
?>