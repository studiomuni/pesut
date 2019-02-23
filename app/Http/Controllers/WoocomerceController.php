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

    

}