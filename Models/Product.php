<?php
Class Product{
    protected $id, $name, $imageName, $price, $inStock, $isVisible, $section, $description, $quantity;
    
    public function __construct($dbrow) {
        $this->id = $dbrow['ID'];                    //The ID of the product
        $this->name = $dbrow['Name'];                //The name of the product
        $this->description = $dbrow['Description'];
        $this->imageName = $dbrow['ImageName'];      //The name of the image of the product
        $this->price = $dbrow['Price'];              //The price of the product
        $this->inStock = $dbrow['InStock'];          //The number in stock
        $this->isVisible = $dbrow['IsVisible'];      //If it is displayed on the website - toggleable through the admin section
        $this->section = $dbrow['Section'];          //Which section it is displayed in
    }
    
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getImageName() {
        return $this->imageName;
    }

    public function getPriceFormatted() {
        return number_format($this->price, 2, '.', ',');
    }

    public function getPrice() {
        return $this->price;
    }

    public function getInStock() {
        return $this->inStock;
    }

    public function getIsVisible() {
        if($this->isVisible == 1){
            return true;
        }
        
        return false;
            
    }

    public function getSection() {
        return $this->section;
    }

    public function getDescription() {
        return $this->description;
    }    
    
    public function setQuantity($q){
        $this->quantity = $q;
    }
    
    public function getQuantity(){
        return $this->quantity;
    }
}


