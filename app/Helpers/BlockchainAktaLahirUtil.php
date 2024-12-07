<?php

namespace App\Helpers;
// request
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BlockchainAktaLahirUtil
{

    public static function getToken()
    {
        $id = 'admin';
        $secret = 'adminpw';

        // body request
        // {
        //     "id": "admin",
        //     "secret": "adminpw"
        //   }

        // call the API to get the token with the body request looks like above
        $response = Http::post('http://212.38.94.235:8801/user/enroll', [
            'id' => $id,
            'secret' => $secret
        ]);

        $token = $response->json()['token'];

        return $token;
    }

    public static function submitApplication($applicationData)
    {
        // token bearer
        $token = self::getToken();

        // call the API to submit the application
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post('http://212.38.94.235:8801/invoke/my-channel1/aktaLahir-chaincode', [
            'method' => 'submitApplication',
            'args' => $applicationData
        ]);



        return $response;
    }

    public static function queryCurrentState($formId)
    {
        // token bearer
        $token = self::getToken();

        // return  [
        //     'method' => 'queryApplication',
        //     'args' => [(string)$formId]
        // ];

        // call the API to query the current state
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post('http://212.38.94.235:8801/query/my-channel1/aktaLahir-chaincode', [
            'method' => 'queryApplication',
            'args' => [(string)$formId]
        ]);

        return $response;
    }


}
