<?php

namespace App\Services;

use App\Helpers\ProductFormat;
use Illuminate\Support\Facades\Http;

class ProductsService
{
    public function getProducts(string $token, string|null $query): array
    {
        $apiResponse = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('https://zadatak.konovo.rs/products');

        $data = ProductFormat::formatPriceAndDescription($apiResponse->json());

        if(!$query) {
            return $data;
        }

        $filteredData = collect($data)
            ->filter(fn($product) => strtolower($product['categoryName']) === strtolower($query))
            ->values()
            ->all();

        return $filteredData;
    }

    public function getSingleProduct(string $token, int $productId): array|null
    {
        $apiResponse = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('https://zadatak.konovo.rs/products');

        $data = ProductFormat::formatPriceAndDescription($apiResponse->json());

        return collect($data)
            ->first(fn($product) => $product['sku'] == $productId);
    }
}
