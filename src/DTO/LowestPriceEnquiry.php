<?php

namespace App\DTO;

use App\Entity\Product;
use Symfony\Component\Serializer\Attribute\Ignore;
use Symfony\Component\Validator\Constraints as Assert;

class LowestPriceEnquiry implements PriceEnquiryInterface{
    #[Ignore]
    private ?Product $product;

    #[Assert\NotBlank]
    #[Assert\Positive]
    private ?int $quantity;

    private ?string $requestLocation;

    private ?string $voucherCode;

    #[Assert\NotBlank]
    private ?string $requestDate;

    #[Assert\Positive]
    private ?int $price;

    private ?int $discountedPrice;

    private ?int $promotionId;

    private ?string $promotionName;


    
    /**
     * Get the value of quantity
     */ 
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Get the value of requestLocation
     */ 
    public function getRequestLocation()
    {
        return $this->requestLocation;
    }

    /**
     * Get the value of voucherCode
     */ 
    public function getVoucherCode()
    {
        return $this->voucherCode;
    }

    /**
     * Get the value of requestDate
     */ 
    public function getRequestDate()
    {
        return $this->requestDate;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Get the value of discountedPrice
     */ 
    public function getDiscountedPrice()
    {
        return $this->discountedPrice;
    }

    /**
     * Get the value of promotionId
     */ 
    public function getPromotionId()
    {
        return $this->promotionId;
    }

    /**
     * Get the value of promotionName
     */ 
    public function getPromotionName()
    {
        return $this->promotionName;
    }

    

    /**
     * Set the value of quantity
     *
     * @return  self
     */ 
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Set the value of requestLocation
     *
     * @return  self
     */ 
    public function setRequestLocation($requestLocation)
    {
        $this->requestLocation = $requestLocation;

        return $this;
    }

    /**
     * Set the value of voucherCode
     *
     * @return  self
     */ 
    public function setVoucherCode($voucherCode)
    {
        $this->voucherCode = $voucherCode;

        return $this;
    }

    /**
     * Set the value of requestDate
     *
     * @return  self
     */ 
    public function setRequestDate($requestDate)
    {
        $this->requestDate = $requestDate;

        return $this;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Set the value of discountedPrice
     *
     * @return  self
     */ 
    public function setDiscountedPrice($discountedPrice)
    {
        $this->discountedPrice = $discountedPrice;

        return $this;
    }

    /**
     * Set the value of promotionId
     *
     * @return  self
     */ 
    public function setPromotionId($promotionId)
    {
        $this->promotionId = $promotionId;

        return $this;
    }

    /**
     * Set the value of promotionName
     *
     * @return  self
     */ 
    public function setPromotionName($promotionName)
    {
        $this->promotionName = $promotionName;

        return $this;
    }

    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
    }

    /**
     * Get the value of product
     */ 
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set the value of product
     *
     * @return  self
     */ 
    public function setProduct($product)
    {
        $this->product = $product;

        return $this;
    }
}