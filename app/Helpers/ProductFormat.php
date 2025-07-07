<?php

namespace App\Helpers;

class ProductFormat
{
    public static function formatPriceAndDescription(array $data): array
    {
        foreach ($data as &$product) {
            if($product['categoryName'] === 'Monitori') {
                $product['price'] = round($product['price'] * 1.10, 2);
            }

            $product['description'] = str_replace("Brzina", "Performance", $product['description']);
        }

        return $data;
    }
}
