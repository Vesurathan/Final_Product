<?php

namespace App\Http\Controllers;

use App\Models\DeviceInfo;
use App\Models\IpInfo;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Agent\Facades\Agent;


class StoreUserDataController extends Controller
{
    public function storeDeviceInfo()
    {
        $user = Auth::user();

        if ($user) {
            // Store user's device details in the device_info table
            $deviceInfo = new DeviceInfo([
                'device' => Agent::device(),
                'platform' => Agent::platform(),
                'browser' => Agent::browser(),
            ]);

            $user->deviceInfo()->save($deviceInfo);
        }

        return $deviceInfo;
    }

    public static function getIpInfo()
    {
        try {
            $client = new Client();
            $res = $client->request('GET', 'https://ipinfo.io/?token=e7a3c97bd8a7a1', ['form_params' => []]);
            $response = $res->getBody()->getContents();
            $responseData = json_decode($response, true); // Convert to array

            // Check if the response data is not null
            if ($responseData) {
                // Store the IP information in the database
                // Create a new instance of the IpInfo model
                $ipInfo = new IpInfo([
                    'ip' => $responseData['ip'],
                    'city' => $responseData['city'],
                    'region' => $responseData['region'],
                    'country' => $responseData['country'],
                    'loc' => $responseData['loc'],
                    'org' => $responseData['org'],
                    'postal' => $responseData['postal'],
                    'timezone' => $responseData['timezone'],
                ]);

                // Set the user_id using the currently authenticated user's ID
                if (Auth::check()) {
                    $ipInfo->user_id = Auth::id();
                    $ipInfo->save();
                }

                return $ipInfo;
            }
        } catch (\Throwable $e) {
            // An error occurred during the HTTP request
            // Log::error($e);
            dd($e->getMessage());
        }

    }
}
