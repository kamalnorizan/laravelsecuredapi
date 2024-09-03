<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataGovController extends Controller
{
    public function index()
    {



        return view('datagov.index');
    }

    function ajaxLoadDataRail(Request $request) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.data.gov.my/data-catalogue?id=ridership_headline&date_start='.$request->date_start.'@date&date_end='.date('Y-m-d').'@date',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Cookie: __cf_bm=MMCO6Mi3TC14lWUnWz865W6x82aCOoL6SXU8vMruJ9Q-1725345480-1.0.1.1-oRWRs63L6iq3UABbadfnug7K.Z2as703d.H69aiePZWhOZpjBdHHvH_UQM90i4MdFJJinHW_4lDwSDHLVz.YLg'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $data = json_decode($response, true);

        return response()->json($data);
    }
}
