<?php
    namespace App\Http\Controllers;

    use Illuminate\Routing\Controller as BaseController;
    use Session;
    use Service;
    use AllServices;
    use Department;
    use DB;
    use Http;

    class ServicesController extends BaseController
    {
        public function services() {
            if(session('user_id') != null) {
                return view('services');
            } else {
                return redirected('login');
            }
        }

        public function fetch_services() {
            $services = DB::select("SELECT S.trattamento as trattamento, T.prezzo as prezzo, D.nome as dipartimento, D.foto as foto 
            FROM (((tutti_servizi T join SERVIZIO S on T.ID = S.codice)
            join OFFERTA O on T.ID = O.servizio) left join DIPARTIMENTO D on O.dipartimento = D.ID)
            WHERE D.centro = '2'");

            return $services;
        }

        public function search_inbudget($budget) {
            $inBudget = AllServices::where('prezzo', '<=', $budget)->get();

            if($inBudget) {

                $servicesArray = array();

                for($i = 0; $i < count($inBudget); $i++) {
                    $serviceID = AllServices::find($inBudget[$i]->ID);
                    $service = $serviceID->service;

                    $servicesArray[] = array('trattamento' => $service->trattamento, 'prezzo' => $serviceID->prezzo);
                }
            }

            return $servicesArray;
        }

        public function search_photos($type) {
            switch($type) {
                case 'pixie': return $this->searchPixie();
                case 'bob': return $this->searchBob();
                case 'long': return $this->searchLong();
                case 'bangs': return $this->searchBangs();
                default: break;
            }
        }

        public function searchPixie() {
            $json = Http::get('https://api.unsplash.com/search/photos', [
                'query' => 'pixie+hair+girl',
                'orientation' => 'portrait',
                'per_page' => 3,
                'client_id' => env('UNSPLASH_APIKEY')
            ]);
            if ($json->failed()) abort(500);

            $photosArray = array();
            for ($i = 0; $i < count($json['results']); $i++) {
                $photosArray[] = array('url' => $json['results'][$i]['urls']['full']);
            }
    
            return response()->json($photosArray);
        }

        public function searchBob() {
            $json = Http::get('https://api.unsplash.com/search/photos', [
                'query' => 'bob+hair',
                'per_page' => 3,
                'orientation' => 'portrait',
                'client_id' => env('UNSPLASH_APIKEY')
            ]);
            if ($json->failed()) abort(500);

            $photosArray = array();
            for ($i = 0; $i < count($json['results']); $i++) {
                $photosArray[] = array('url' => $json['results'][$i]['urls']['full']);
            }
    
            return response()->json($photosArray);
        }

        public function searchLong() {
            $json = Http::get('https://api.unsplash.com/search/photos', [
                'query' => 'long+hair+girl',
                'per_page' => 3,
                'orientation' => 'portrait',
                'client_id' => env('UNSPLASH_APIKEY')
            ]);
            if ($json->failed()) abort(500);

            $photosArray = array();
            for ($i = 0; $i < count($json['results']); $i++) {
                $photosArray[] = array('url' => $json['results'][$i]['urls']['full']);
            }
    
            return response()->json($photosArray);
        }

        
        public function searchBangs() {
            $json = Http::get('https://api.unsplash.com/search/photos', [
                'query' => 'bangs+hair+girl',
                'per_page' => 3,
                'orientation' => 'portrait',
                'client_id' => env('UNSPLASH_APIKEY')
            ]);
            if ($json->failed()) abort(500);

            $photosArray = array();
            for ($i = 0; $i < count($json['results']); $i++) {
                $photosArray[] = array('url' => $json['results'][$i]['urls']['full']);
            }
    
            return response()->json($photosArray);
        }
    }
?>