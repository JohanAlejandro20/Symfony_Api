<?php

namespace App\Controller;

use App\Services\Products\ProductsService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;



/** @Route("/api/products", name="portal_") */
class ProductsController extends AbstractController
{

    /**
     * @var ProductsService
     */
    private $productService;

    public function __construct(ProductsService $productService )
    {
        $this->productService = $productService;
    } 

    /** @Route("/get-pets-product", methods={"GET"}) */
    public function getAllProducts(Request $request):JsonResponse{

        $response = $this->productService->getAllProductsPets();    
        
        return new JsonResponse(["message" => $response]);
    }
}