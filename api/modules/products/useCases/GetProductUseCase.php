<?php

namespace Modules\Products\UseCases;

use Shared\Repositories\BaseRepository;
use Shared\Entities\Product;
use Shared\Entities\ProductType;
use Modules\Products\Dtos\GetProductDTO;
use Shared\Utils\ApiError;

class GetProductUseCase{

    private $baseRepository;

    function __construct(BaseRepository $baseRepository){
        $this->baseRepository = $baseRepository;
    }

    public function run(GetProductDTO $data){

        $product = $this->baseRepository->findById(Product::class, $data->getId());

        if(!isset($product)){
            new ApiError(404, "Product with id:{$data->getId()} not found");
        }

        $productType = $this->baseRepository->findById(ProductType::class, $product->getProductType()->getId());

        

        return [
            'id'=> $product->getId(),
            'name'=> $product->getName(),
            'value'=> $product->getValue(),
            'description'=> $product->getDescription(),
            'createdAt'=> $product->getCreatedAt(),
            'updatedAt'=> $product->getUpdatedAt(),
            'productType'=> [
                'id'=> $product->getProductType()->getId(),
                'name'=> $product->getProductType()->getName(),
                'createdAt'=> $product->getProductType()->getCreatedAt(),
                'updatedAt'=> $product->getProductType()->getUpdatedAt(),
            ],
            // 'taxes'=> $this->getTaxes($productType),
            'taxes'=> [
                ['id'=> 1, 'name'=> 'ICMS', 'percentage'=>10],
                ['id'=> 2, 'name'=> 'PIS', 'percentage'=>6],
            ],
        ];
    }

    public function getTaxes($productType)
    {
        $qb = $this->baseRepository->getEntityManager()->createQueryBuilder("t")
        ->where(':productType MEMBER OF t.taxe')
        ->setParameters(array('productType' => $productType));
        return $qb->getQuery()->getResult();
    }
}