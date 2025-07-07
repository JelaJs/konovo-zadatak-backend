<?php

namespace App\Http\Controllers;

use App\Enums\NotFoundMsg;
use App\Exceptions\NotFoundException;
use App\Facades\ResponseFacade;
use App\Services\ProductsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductsController extends Controller
{
    public function index(Request $request, ProductsService $productsService): JsonResponse
    {
        $query = null;
        if($request->filled('category')) {
            $query = $request->query('category');
        }

        try {
            $data = $productsService->getProducts($request->bearerToken(), $query);

            if(!$data) {
                throw new NotFoundException(NotFoundMsg::PRODUCT_NOT_FOUND->value);
            }
        }
        catch (NotFoundException $e) {
            return ResponseFacade::jsonException($e);
        }
        catch (\Exception $e) {
            return  ResponseFacade::jsonUnhandledException();
        }

        return ResponseFacade::jsonSuccess(data: $data);
    }
}
