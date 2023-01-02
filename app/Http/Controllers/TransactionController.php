<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.transaction.transaction_index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('admin.transaction.transaction_detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getProvince(Request $request)
    {
        $api_key = env('API_RAJA_ONGKIR');
        $id = 1;
        $url = 'https://api.rajaongkir.com/starter/province?id='.$id;

        $responses = Http::withHeaders([
            'Content-Type' => 'application/x-www-form-urlencoded',
            'key' => $api_key
        ])->get($url);

        return $responses;

        // dd($responses);
    }

    public function getCity(Request $request)
    {
        $api_key = env('API_RAJA_ONGKIR');
        $id = 39;
        $url = 'https://api.rajaongkir.com/starter/city?province=5&id='.$id;

        $responses = Http::withHeaders([
            'Content-Type' => 'application/x-www-form-urlencoded',
            'key' => $api_key
        ])->get($url);

        return $responses;

        // dd($responses);
    }

    public function getCost(Request $request)
    {
        $api_key = env('API_RAJA_ONGKIR');
        $id = 39;
        $url = 'https://api.rajaongkir.com/starter/cost';

        $data = array(
            'origin' => 23,
            'destination' => 22,
            'weight' => 1000,
            'courier' => 'jne',
        );

        $responses = Http::withHeaders([
            'Content-Type' => 'application/x-www-form-urlencoded',
            'key' => $api_key
        ])->post($url, $data);

        return $responses;
    }
}
