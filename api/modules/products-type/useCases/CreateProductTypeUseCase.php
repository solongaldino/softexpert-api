<?php

namespace Modules\ProductsType\UseCases;

use Modules\ProductsType\Dtos\CreateProductTypeDTO;
use Shared\Entities\ProductType;
use Shared\Repositories\ProductTypeRepository;
use Shared\Repositories\TaxeRepository;
use Shared\Entities\Taxe;
use Shared\Utils\ApiError;

class CreateProductTypeUseCase{
    private $productTypeRepository;
    private $taxeRepository;

    function __construct(ProductTypeRepository $productTypeRepository, TaxeRepository $taxeRepository){
        $this->productTypeRepository = $productTypeRepository;
        $this->taxeRepository = $taxeRepository;
    }

    function run(CreateProductTypeDTO $data){

        $taxe = $this->taxeRepository->findById(Taxe::class, $data->getTaxeId());
        if(!isset($taxe)) new ApiError(404, "Taxe not found");

        $entity = new ProductType();
        $entity->setName($data->getName());
        $entity->addTaxe($taxe);
        $entity->setCreatedAt(new \DateTime('now'));

        return $this->productTypeRepository->save($entity);
    }
}