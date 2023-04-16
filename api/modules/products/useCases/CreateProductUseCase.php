<?php

namespace Modules\Products\UseCases;

use Shared\Entities\Product;
use Shared\Entities\ProductType;
use Modules\Products\Dtos\CreateProductDTO;
use Shared\Repositories\ProductRepository;
use Shared\Repositories\ProductTypeRepository;
use Shared\Utils\ApiError;

class CreateProductUseCase{
    private $productRepository;
    private $productTypeRepository;

    function __construct(ProductRepository $productRepository, ProductTypeRepository $productTypeRepository){
        $this->productRepository = $productRepository;
        $this->productTypeRepository = $productTypeRepository;
    }

    function run(CreateProductDTO $data){

        $productsType = $this->productTypeRepository->findById(ProductType::class, $data->getProductTypeId());
        if(!isset($productsType)) new ApiError(404, "ProductType id not found");

        $entity = new Product();
        $entity->setProductType($productsType);
        $entity->setName($data->getName());
        $entity->setValue($data->getValue());
        $entity->setDescription($data->getDescription());
        $entity->setCreatedAt(new \DateTime('now'));

        return $this->productRepository->save($entity);
    }
}