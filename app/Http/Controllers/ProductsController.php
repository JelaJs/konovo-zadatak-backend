<?php

namespace App\Http\Controllers;

use App\Facades\ResponseFacade;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductsController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $token = $request->bearerToken();
        $apiResponse = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('https://zadatak.konovo.rs/products');

        $data = $apiResponse->json();
        return ResponseFacade::jsonSuccess(data: $data);
    }
}
