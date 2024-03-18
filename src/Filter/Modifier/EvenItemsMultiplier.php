<?php

namespace App\Filter\Modifier;

use App\Entity\Promotion;
use App\DTO\PromotionEnquiryInterface;

class EvenItemsMultiplier implements PriceModifierInterface{
    public function modify(int $price, int $quantity, Promotion $promotion, PromotionEnquiryInterface $enquiry): int
    {
        if ($quantity < 2){
            return $price * $quantity;
        }

        // Get the odd item..if there is one
        $oddCount = $quantity % 2;  // 0 or 1

        // Count how many even items
        $eventCount = $quantity - $oddCount; // deduct either 0 or 1

        return (($eventCount * $price) * $promotion->getAdjustment()) + ($oddCount * $price);

    }
}