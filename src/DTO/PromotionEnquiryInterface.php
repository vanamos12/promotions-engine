<?php

namespace App\DTO;

use JsonSerializable;

interface PromotionEnquiryInterface extends JsonSerializable{
    public function getProduct();

    public function setPromotionId(int $promotionId);

    public function setPromotionName(string $promotionName);
}