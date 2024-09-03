<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataGovController extends Controller
{
    //
    function index(){
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://api.data.gov.my/data-catalogue?id=ridership_headline',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Cookie: Cookie_1=value; __cf_bm=TWevYqj9bIYrRptWPeEaLp92YPg0CJKNmeHdSEPG5Tc-1725345837-1.0.1.1-P.drOBcIgLTsPn9PiGudsXMFH2E83bGDZxdH2m0nPHTGzDscbI.Z7idezLzqhixOjauaGvikE7JgTGp.eResnQ'
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            $data = json_decode($response, true);

            // return response()->json($data);
            return view('index', $data);
    }
}
