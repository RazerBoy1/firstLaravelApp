<?php

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client;

class TransactionController extends BaseController
{
    public function showTransaction()
    {
        return View::make('transaction');
    }

    public function submitForm()
    {
        $validator = Validator::make(Input::all(), array(
            'txHash' => 'required'
        ));

        if ($validator->fails())
            return Redirect::to('transaction')->withInput()->withErrors($validator->errors());
        else {
            $txId = Input::get('txHash');

            $client = new Client();
            $response = $client->request('GET', 'https://blockchain.info/rawtx/' . $txId);
            $statusCode = $response->getStatusCode();

            if ($statusCode < 300 && $statusCode >= 200) $result = $response->getBody()->getContents();
            else $result = 'The external API call failed. Our team of highly trained monkeys is trying to find a solution as we speak';

            return View::make('transaction', compact('result'));
        }
    }
}
