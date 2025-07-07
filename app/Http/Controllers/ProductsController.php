<?php

namespace App\Http\Controllers;

use App\Facades\ResponseFacade;
use App\Services\ProductsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductsController extends Controller
{
    public function index(Request $request, ProductsService $productsService): JsonResponse
    {
        try {
            $data = $productsService->getAllProducts($request->bearerToken());
        } catch (\Exception $e) {
            return  ResponseFacade::jsonUnhandledException();
        }

        return ResponseFacade::jsonSuccess(data: $data);
    }
}
