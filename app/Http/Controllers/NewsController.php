<?php
    namespace App\Http\Controllers;

    use Illuminate\Routing\Controller as BaseController;
    use Http;

    class NewsController extends BaseController
    {
        public function news() {
            if(session('user_id') != null) {
                return view('news');
            } else {
                return redirected('login');
            }
        }

        public function search_news($type) {
            switch($type) {
                case 'hair_removal': return $this->hairRemoval();
                case 'face_mask': return $this->faceMask();
                case 'face_cleaning': return $this->faceCleaning();
                default: break;
            }
        }

        public function hairRemoval() {
            $json = Http::get('http://api.mediastack.com/v1/news', [
                'keywords' => 'depilazione -calciatori',
                'languages' => 'it',
                'limit' => 5,
                'access_key' => env('MEDIASTACK_APIKEY')
            ]);
            if ($json->failed()) abort(500);

            $newsArray = array();
            for ($i = 0; $i < count($json['data']); $i++) {
                $newsArray[] = array('title' => $json['data'][$i]['title'],
                                        'author' => $json['data'][$i]['author'],
                                        'article' => $json['data'][$i]['description'],
                                        'url' => $json['data'][$i]['url']);
            }
    
            return response()->json($newsArray);
        }

        public function faceMask() {
            $json = Http::get('http://api.mediastack.com/v1/news', [
                'keywords' => 'maschera+viso -aglio',
                'languages' => 'it',
                'limit' => 5,
                'access_key' => env('MEDIASTACK_APIKEY')
            ]);
            if ($json->failed()) abort(500);

            $newsArray = array();
            for ($i = 0; $i < count($json['data']); $i++) {
                $newsArray[] = array('title' => $json['data'][$i]['title'],
                                        'author' => $json['data'][$i]['author'],
                                        'article' => $json['data'][$i]['description'],
                                        'url' => $json['data'][$i]['url']);
            }
    
            return response()->json($newsArray);
        }

        public function faceCleaning() {
            $json = Http::get('http://api.mediastack.com/v1/news', [
                'keywords' => 'pulizia+del+viso+skincare',
                'languages' => 'it',
                'limit' => 5,
                'access_key' => env('MEDIASTACK_APIKEY')
            ]);
            if ($json->failed()) abort(500);

            $newsArray = array();
            for ($i = 0; $i < count($json['data']); $i++) {
                $newsArray[] = array('title' => $json['data'][$i]['title'],
                                        'author' => $json['data'][$i]['author'],
                                        'article' => $json['data'][$i]['description'],
                                        'url' => $json['data'][$i]['url']);
            }
    
            return response()->json($newsArray);
        }
    }

?>