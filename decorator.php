<?php
interface iProduct
{
    public function setPrice();
    public function getPrice();
}
 
class Product implements iProduct
{
    protected $_product;
    protected $_price;
    protected $_size;
    protected $_weight;
    
    public function __construct($price)
    {
        $this->_price = $price;
        $this->_size = 5;
        $this->_weight = 5;
    }
 
    public function setPrice(){}
    
    public function getPrice(){
        return $this->_price;
    }
}
 
class ProdWithVat extends Product
{
    
    public function __construct(Product $product)
    {
        $this->_product = $product;
        $this->setPrice();
    }
 
    public function setPrice()
    {
        $price = $this->_product->getPrice();
        $this->_price = $price + $this->getVat();
    }
    
    public function getVat(){
        //5% tax
        return ($this->_product->getPrice()*5)/100;
    }
}
 
class ProdWithShippingCost extends Product
{
    
    public function __construct(Product $product)
    {
        $this->_product = $product;
        $this->setPrice();
    }
 
    public function setPrice()
    {
        $price = $this->_product->getPrice();  
        $this->_price = $price + $this->getShippingCost();
    }
    
    public function getShippingCost(){
        return $this->_product->getPrice() + $this->_size + $this->_weight;
    }
}

class ProdWithDiscount extends Product
{
    
    public function __construct(Product $product)
    {
        $this->_product = $product;
        $this->setPrice();
    }
 
    public function setPrice()
    {
        $price = $this->_product->getPrice();
        $this->_price = $price - $this->getDiscount();
    }
    
    public function getDiscount(){
        return 2;
    }
}
 
$product = new Product(10);
echo "Standard Product Price: ".$product->getPrice();

$productWithVat = new ProdWithVat($product);
echo "<br/>Price After addind 5% VAT: ".$productWithVat->getPrice();

$productWithShipping = new ProdWithShippingCost($productWithVat);
echo "<br/>Price After addind Shipping Cost: ".$productWithShipping->getPrice();


$productWithDiscount = new ProdWithShippingCost(new ProdWithVat(new ProdWithDiscount($product)));
echo '<br/><br/>Final Price after discount: '.$productWithDiscount->getPrice();