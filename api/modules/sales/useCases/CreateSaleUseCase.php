<?php

namespace Modules\Sales\UseCases;

use Shared\Entities\Sale;
use Shared\Entities\Item;
use Shared\Entities\Product;
use Modules\Sales\Dtos\CreateSaleDTO;
use Shared\Repositories\SaleRepository;
use Shared\Repositories\ProductRepository;
use Shared\Utils\ApiError;

class CreateSaleUseCase{
    private $saleRepository;
    private $productRepository;

    function __construct(
        SaleRepository $saleRepository,
        ProductRepository $productRepository
    ){
        $this->saleRepository = $saleRepository;
        $this->productRepository = $productRepository;
    }

    function run(CreateSaleDTO $data){

        $em = $this->saleRepository->getEntityManager();

        try {

            $em->getConnection()->beginTransaction();

            $amountSale = 0;
            $taxeSale = 0;

            $sale = new Sale();
            $sale->setCreatedAt(new \DateTime('now'));
            $em->persist($sale);
            
            foreach($data->getList() as $value){

                $productId = $value['productId'];

                $product = $this->productRepository->findById(Product::class, $productId);

                if(!isset($product)){
                    $em->getConnection()->rollBack();
                    new ApiError(404, "Product id: {$productId} not found");
                }

                $item = new Item();
                $item->setSale($sale);
                $item->setProduct($product);
                $item->setAmount($value['amount']);

                $em->persist($item);

                $amountSale += $product->getValue() * $value['amount'];

                $taxes = $product->getProductType()->getTaxes();

                foreach($taxes as $taxe){
                    $taxeSale +=  $product->getValue() * $taxe->getPercentage() * $value['amount'] / 100;
                }
            }

            $sale = $this->saleRepository->findById(Sale::class, $sale->getId());
            $sale->setAmount($amountSale);
            $sale->setTaxe($taxeSale);

            $em->persist($sale);
            
            $em->flush();

            $em->getConnection()->commit();

        } catch (\Throwable $th) {
            $em->getConnection()->rollBack();
            throw $th;
        }  

    }
}