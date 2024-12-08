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

    public static function updateApplication($applicationData)
    {
        // token bearer
        $token = self::getToken();

        // call the API to update the application
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post('http://212.38.94.235:8801/invoke/my-channel1/aktaLahir-chaincode', [
            'method' => 'modifyApplicationAttribute',
            'args' => $applicationData
        ]);

        return $response;
    }

    public static function verifyApplication($formId, $verifiedBy)
    {
        // token bearer
        $token = self::getToken();


        // call the API to approve the application
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            ])->post('http://212.38.94.235:8801/invoke/my-channel1/aktaLahir-chaincode', [
                'method' => 'verifyApplication',
                'args' => [(string)$formId, (string)$verifiedBy]
            ]);
        return $response;
    }

    public static function issueApplication($formId, $issuedBy)
    {
        // token bearer
        $token = self::getToken();

        $certificateNumber = 'AKTA-LAHIR-' . \Illuminate\Support\Str::uuid();

        // call the API to issue the application
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post('http://212.38.94.235:8801/invoke/my-channel1/aktaLahir-chaincode', [
            'method' => 'issueCertificate',
            'args' => [(string)$formId, (string)$certificateNumber,(string)$issuedBy]
        ]);

        return $response;
    }

    public static function rejectApplication($formId, $rejectedBy)
    {
        // token bearer
        $token = self::getToken();

        // call the API to reject the application
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post('http://212.38.94.235:8801/invoke/my-channel1/aktaLahir-chaincode', [
            'method' => 'repealApplication',
            'args' => [(string)$formId, (string)$rejectedBy]
        ]);

        return $response;
    }

    public static function approveApplication($formId, $approvedBy)
    {
        // token bearer
        $token = self::getToken();

        // call the API to approve the application
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post('http://212.38.94.235:8801/invoke/my-channel1/aktaLahir-chaincode', [
            'method' => 'approveApplication',
            'args' => [(string)$formId, (string)$approvedBy]
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


    public static function queryHistory($formId)
    {
        // token bearer
        $token = self::getToken();

        // call the API to query the history
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post('http://212.38.94.235:8801/query/my-channel1/aktaLahir-chaincode', [
            'method' => 'queryHistory',
            'args' => [(string)$formId]
        ]);

        return $response;
    }


}
