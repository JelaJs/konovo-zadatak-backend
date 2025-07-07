<?php

namespace App\Services;

use App\Helpers\ProductFormat;
use Illuminate\Support\Facades\Http;

class ProductsService
{
    public function getAllProducts(string $token)
    {
        $apiResponse = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('https://zadatak.konovo.rs/products');

        return ProductFormat::formatPriceAndDescription($apiResponse->json());
    }
}
