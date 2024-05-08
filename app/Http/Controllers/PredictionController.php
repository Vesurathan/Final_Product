<?php

namespace App\Http\Controllers;

use App\Models\DeliveryPrediction;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Redirect;



class PredictionController extends Controller
{
    public function view_prediction_page()
    {
        // This method returns the view where the user inputs the prediction data
        return view('prediction');
    }

    public function check_probability(Request $request)
    {

        $prediction = DeliveryPrediction::create($request->all());

        $client = new Client();
        $query = http_build_query([
            'customer_name' => $request->customer_name,
            'customer_address' => $request->customer_address,
            'customer_phone' => $request->customer_phone,
            'customer_email' => $request->customer_email,
            'cod' => $request->cod,
            'weight' => $request->weight,
            'pickup_address' => $request->pickup_address,
            'origin_city_name' => $request->origin_city_name,
            'destination_city_name' => $request->destination_city_name,
            'origin_country' => $request->origin_country,
        ]);

        $url = 'https://viswa00-research-test-api.hf.space/predict?' . $query;

        try {
            $response = $client->request('POST', $url, [
                'headers' => [
                    'Accept' => 'application/json',
                ],
            ]);

            $responseBody = json_decode($response->getBody(), true);

            $probability = $responseBody['Probability'] ?? 'N/A'; // Adjust based on actual API response structure

            return redirect()->back()->with('success', 'Probability: ' . $probability);
        } catch (GuzzleException $e) {
            return redirect()->back()->with('error', 'Failed to get prediction: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An unexpected error occurred: ' . $e->getMessage());
        }
    }
}
