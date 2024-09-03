<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataGovController extends Controller
{
    public function index()
    {

        // $curl = curl_init();

        // curl_setopt_array($curl, array(
        //     CURLOPT_URL => 'https://api.data.gov.my/data-catalogue?id=ridership_headline',
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_ENCODING => '',
        //     CURLOPT_MAXREDIRS => 10,
        //     CURLOPT_TIMEOUT => 0,
        //     CURLOPT_FOLLOWLOCATION => true,
        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //     CURLOPT_CUSTOMREQUEST => 'GET',
        //     CURLOPT_HTTPHEADER => array(
        //         'Cookie: __cf_bm=h0kMcxyxtufmuBjsXwAXab98ov0H.AF9iljPsur73xA-1725345766-1.0.1.1-92UYynBiiESfmSsKcpxCiIGLd3IouSoRmhED1SeW3TgM3idnPko.YDKYOXMl0a0Dl.Hi8IwhNhp9e3v.W0aN2Q'
        //     ),
        // ));

        // $response = curl_exec($curl);

        // curl_close($curl);

        // $data = json_decode($response, true);

        // dd($data);

        return view('datagov.index');
    }

    function ajaxLoadDataRail(Request $request)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            // CURLOPT_URL => 'https://api.data.gov.my/data-catalogue?id=ridership_headline&date_start=' . $request->date_start . '@date&date_end=' . $request->date_end . '@date',
            CURLOPT_URL => 'https://api.data.gov.my/data-catalogue?id=ridership_headline&date_start=' . $request->date_start . '@date&date_end=' . $request->date_end . '@date',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Cookie: __cf_bm=h0kMcxyxtufmuBjsXwAXab98ov0H.AF9iljPsur73xA-1725345766-1.0.1.1-92UYynBiiESfmSsKcpxCiIGLd3IouSoRmhED1SeW3TgM3idnPko.YDKYOXMl0a0Dl.Hi8IwhNhp9e3v.W0aN2Q'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $data = json_decode($response, true);
        // dd($data);
        return response()->json($data);

    }
}
