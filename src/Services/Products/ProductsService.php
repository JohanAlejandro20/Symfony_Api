<?php

namespace App\Services\Products;

use App\Document\Products;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ProductsService
{
    private $logger;

    /**
     * @var ContainerInterface
     */
    private $container;



    private const DEFAULT_CONNECTION = 'doctrine_mongodb.odm.default_document_manager';

    /**
     * @var DocumentManager
     */
    private $docManager;

    
     
    public function __construct(
        // LoggerInterface $logger,
        ContainerInterface  $container
    )
    {
        $this->container = $container;
        $this->docManager = $this->container->get(self::DEFAULT_CONNECTION);


    }



    public function getAllProductsPets(){
        $products = $this->docManager->getRepository(Products::class)->findAll();


        foreach ($products as $product) {
            var_dump($product);    
        }

        return (object)$products;
    }



    
}