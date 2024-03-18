<?php

namespace App\Filter;

use App\DTO\PriceEnquiryInterface;
use App\DTO\PromotionEnquiryInterface;
use App\Entity\Promotion;
use App\Filter\Modifier\Factory\PriceModifierFactoryInterface;
use App\Filter\Modifier\PriceModifierInterface;

class LowestPriceFilter implements PriceFilterInterface{

    public function __construct(private PriceModifierFactoryInterface $priceModifierFactory)
    {
        
    }

    public function apply(PriceEnquiryInterface $enquiry, Promotion ...$promotions): PriceEnquiryInterface
    {
        $price = $enquiry->getProduct()->getPrice();
        $enquiry->setPrice($price);
        $quantity = $enquiry->getQuantity();
        $lowestPrice = $quantity * $price;

        foreach($promotions as $promotion){
            $priceModifier = $this->priceModifierFactory->create($promotion->getType());
            $modifiedPrice = $priceModifier->modify($price, $quantity, $promotion, $enquiry);
            
            if ($modifiedPrice < $lowestPrice){
                $enquiry
                    ->setDiscountedPrice($modifiedPrice)
                    ->setPromotionId($promotion->getId())
                    ->setPromotionName($promotion->getName());
                    
                $lowestPrice = $modifiedPrice;
            }
        
        }
        
        return $enquiry;

    }

}