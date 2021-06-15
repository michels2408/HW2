<?php
    namespace App\Http\Controllers;

    use Illuminate\Routing\Controller as BaseController;
    use Session;
    use User;
    use Products;
    use LikesProducts;
    use Likes;
    use Comment;
    use DB;


    class ProductsController extends BaseController
    {
        public function products() {
            if(session('user_id') != null) {
                return view('products');
            } else {
                return redirected('login');
            }
        }

        public function fetch_products() {
            $products = Products::all();

            return $products;
        }

        public function fetch_comments() {
            $maxID = DB::table('COMMENTO')->max('ID');

            $commentsArray = array();
            for($i = 1; $i < ($maxID + 1); $i++) {
                $comment = Comment::find($i);

                if($comment) {
                    $user_comment = $comment->user;

                    $commentsArray[] = array('username' => $user_comment->username, 'testo' => $comment->testo,
                                            'giorno' => $comment->giorno, 'ora' => $comment->ora,
                                            'nlikes' => $comment->nlikes);
                };                    
            }

            return $commentsArray;
        }

        public function fetch_fav() {
            $favs = User::find(session('user_id'))->likes_product;

            if($favs) {
                $favArray = array();
                for($i = 0; $i < count($favs); $i++) {
                    $product = Products::find($favs[$i]->prodotto);

                    $favArray[] = array($i => $product);
                }
            }

            return $favArray;
        }

        public function fetch_likes($data) {
            $likes = User::find(session('user_id'))->likes()->where('commento', $data)->first();
            
           if($likes) {
                return array('ok' => true, $likes->commento);
            } else {
                return array('ok' => false, $data);
            }
        }

        public function like_product($data) {
            $newLikeProduct = LikesProducts::create([
                'cliente' => session('user_id'),
                'prodotto' => $data
            ]);

            if($newLikeProduct) {
                return array('add' => true, 'remove' => false, 'prodotto' => $data);
            } else {
                return array('add' => false, 'remove' => false, 'prodotto' => $data);
            }
        }

        public function unlike_product($data) {
            $unlikeProduct = LikesProducts::where('cliente', session('user_id'))->where('prodotto', $data)->delete();

            if($unlikeProduct) {
                return array('remove' => true, 'add' => false, 'prodotto' => $data);
            } else {
                return array('remove' => false, 'add' => false, 'prodotto' => $data);
            }
        }

        public function like_comment($data) {
            $newLike = Likes::create([
                'cliente' => session('user_id'),
                'commento' => $data
            ]);

            if($newLike) {
                $nlikes = Comment::where('ID', $data)->first();

                return array('ok' => true, 'commento' => $data, 'nlikes' => $nlikes->nlikes);
            } else {
                return array('ok' => false);
            }
        }

        public function unlike_comment($data) {
            $unlike = Likes::where('cliente', session('user_id'))->where('commento', $data)->delete();

            if($unlike) {
                $nlikes = Comment::where('ID', $data)->first();

                return array('ok' => true, 'commento' => $data, 'nlikes' => $nlikes->nlikes);
            } else {
                return array('ok' => false);
            }
        }

        public function new_comment($text, $date, $time) {
            if(count(array($text)) != 0) {
                $newComment = Comment::create([
                    'cliente' => session('user_id'),
                    'testo' => $text,
                    'giorno' => $date,
                    'ora' => $time
                ]);

                if($newComment) {
                    return array('ok' => true);
                } else {
                    return array('ok' => false);
                }
            }
        }

    }
?>