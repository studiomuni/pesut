<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class WoocomerceController extends Controller {

	public function getAllData(){

        $client = new Client;
        $response = $client->get('https://pesutscooter.com/wp-json/wc/v3/products', [
            'auth' => [
                'ck_5b0e6c5b59f1d1a111fa57724fd9ad60c9dd3250', 
                'cs_5cbe1cfebd77b7e19c35a14c25e6241d666d69a5'
            ]
        ]);

        $data = $response->getBody()->getContents();

        return $data;


    }

    public function getData($id){

        $client = new Client;
        $response = $client->get("https://pesutscooter.com/wp-json/wc/v3/products/$id", [
            'auth' => [
                'ck_5b0e6c5b59f1d1a111fa57724fd9ad60c9dd3250', 
                'cs_5cbe1cfebd77b7e19c35a14c25e6241d666d69a5'
            ]
        ]);

        $data = $response->getBody()->getContents();

        return $data;

    }

    public function deleteData($id){

        $client = new Client;
        $response = $client->delete("https://pesutscooter.com/wp-json/wc/v3/products/$id", [
            'auth' => [
                'ck_5b0e6c5b59f1d1a111fa57724fd9ad60c9dd3250', 
                'cs_5cbe1cfebd77b7e19c35a14c25e6241d666d69a5'
            ]
        ]);

        // $data = $response->getBody()->getContents();
        
        $massage = "Berhasil Hapus Data";

        return response($massage);

    }

    public function getCategories(){

        $client = new Client;
        $response = $client->get("https://pesutscooter.com/wp-json/wc/v3/products/categories", [
            'auth' => [
                'ck_5b0e6c5b59f1d1a111fa57724fd9ad60c9dd3250', 
                'cs_5cbe1cfebd77b7e19c35a14c25e6241d666d69a5'
            ]
        ]);

        $data = $response->getBody()->getContents();

        return $data;
    }

    
    public function saveProduct(Request $request)
    {

        $data = [
            'name' => $request->name,
            'regular_price' => $request->regular_price,
            'description' => $request->description,
            'short_description' => $request->short_description,
            'categories' => [
                [
                    'id' => $request->categories,
                ]
            ],
            'images' => [
                [
                    'src' => $request->images,
                ]
            ]
        ];


        $client = new Client;
        $response = $client->request('POST', 'https://pesutscooter.com/wp-json/wc/v3/products', 
        [
            'form_params' => $data,
            'auth' => [
                'ck_5b0e6c5b59f1d1a111fa57724fd9ad60c9dd3250', 
                'cs_5cbe1cfebd77b7e19c35a14c25e6241d666d69a5'
            ] 
        ]);
        
        return response()->json([
            'success' => true,
            'message' => 'Pesan berhasil dikirim.'
        ]);

    }

    public function saveKategori(Request $request)
    {

        $data = [
            'name' => $request->name
        ];

        $client = new Client;
        $response = $client->request('POST', 'https://pesutscooter.com/wp-json/wc/v3/products/categories', 
        [
            'form_params' => $data,
            'auth' => [
                'ck_5b0e6c5b59f1d1a111fa57724fd9ad60c9dd3250', 
                'cs_5cbe1cfebd77b7e19c35a14c25e6241d666d69a5'
            ] 
        ]);
        
        return response()->json([
            'success' => true,
            'message' => 'Pesan berhasil dikirim.'
        ]);

    }

    public function getDataCategori($id){

        $client = new Client;
        $response = $client->get("https://pesutscooter.com/wp-json/wc/v3/products/categories/$id", [
            'auth' => [
                'ck_5b0e6c5b59f1d1a111fa57724fd9ad60c9dd3250', 
                'cs_5cbe1cfebd77b7e19c35a14c25e6241d666d69a5'
            ]
        ]);

        $data = $response->getBody()->getContents();

        return $data;

    }

    public function deleteCategori($id){

        $client = new Client;
        $response = $client->delete("https://pesutscooter.com/wp-json/wc/v3/products/categories/$id", 
        [
            'form_params' => ['force' => true],
            'auth' => [
                'ck_5b0e6c5b59f1d1a111fa57724fd9ad60c9dd3250', 
                'cs_5cbe1cfebd77b7e19c35a14c25e6241d666d69a5'
            ]
        ]);

        // $data = $response->getBody()->getContents();
        
        $massage = "Berhasil Hapus Data";

        return response($massage);

    }

}