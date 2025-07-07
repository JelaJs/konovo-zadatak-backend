<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ProductsService
{
    public function getAllProducts(string $token)
    {
        $apiResponse = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('https://zadatak.konovo.rs/products');

        $data = $apiResponse->json();

        foreach ($data as &$product) {
            if($product['categoryName'] === 'Monitori') {
                $product['price'] = round($product['price'] * 1.10, 2);
            }

            $product['description'] = str_replace("Brzina", "Performance", $product['description']);
        }

        return $data;
    }
}
