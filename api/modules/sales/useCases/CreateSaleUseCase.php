<?php

namespace Modules\Sales\UseCases;

use Shared\Entities\Sale;
use Shared\Entities\Item;
use Modules\Sales\Dtos\CreateSaleDTO;
use Shared\Repositories\SaleRepository;
use Shared\Repositories\ItemRepository;

class CreateSaleUseCase{
    private $saleRepository;
    private $itemRepository;

    function __construct(SaleRepository $saleRepository, ItemRepository $itemRepository){
        $this->saleRepository = $saleRepository;
        $this->itemRepository = $itemRepository;
    }

    function run(CreateSaleDTO $data){

        $sale = new Sale();
        // $entity->setName($data->getName());
        $sale->setCreatedAt(new \DateTime('now'));

        // return $this->productRepository->save($entity);
    }
}