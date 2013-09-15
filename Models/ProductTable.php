<?php 
require_once __DIR__.'/TableAbstract.php';
require_once __DIR__.'/Product.php';

class ProductTable extends TableAbstract{
    protected $name="Product";
    protected $primaryKey='ID';
    
    public function fetchAllInSection($section){
        //Fetches all the products in a given section
        $query = 'SELECT * FROM `'.$this->name.'` WHERE Section=:Section';        
        $sth=$this->dbh->prepare($query);
        $sth->execute([ 
            ':Section' => strtoupper($section)
        ]);
        $productArray=[];
        while($row=$sth->fetch()){
            $productArray[ ]=new Product($row);
        }
        return $productArray;
    }
    
    public function addProduct($name, $imageName, $price, $inStock, $isVisible, $section, $description){
        $query='INSERT INTO `Product`(Name, ImageName, Price, InStock, IsVisible, Section, Description) VALUES(:Name, :ImageName, :Price, :InStock, :IsVisible, :Section, :Description)';     
        $sth = $this->dbh->prepare($query);
        $sth->execute([
            ':Name' => $name, 
            ':ImageName'=> $imageName,
            ':Price' => $price,
            ':InStock' => $inStock,
            ':IsVisible' => $isVisible,
            ':Section' => $section,
            ':Description' => $description
        ]);
    }
    
    public function deleteProduct($productID){
        $query='DELETE FROM `Product` WHERE ID=:ProductID';
        $sth = $this->dbh->prepare($query);                         
        $sth->execute([
            ':ProductID' =>$productID        
        ]);
    }
        
    public function editProduct($ID, $name, $imageName, $price, $inStock, $isVisible, $section, $description){
        $sql='UPDATE `Product` SET Name=:Name, ImageName=:ImageName, Price=:Price, InStock=:InStock, IsVisible=:IsVisible, Section=:Section, Description=:Description WHERE ID=:ID';
        $sth = $this->dbh->prepare($sql);
        $sth->execute([
            ':ID' => $ID,
            ':Name' => htmlentities($name),
            ':ImageName' => $imageName,
            ':Price' => $price,
            ':InStock' => $inStock,
            ':IsVisible' => $isVisible,
            ':Section' => $section,
            ':Description' => htmlentities($description)
        ]);
    }
    
    public function getNumberOfSections(){
        $result=$this->dbh->prepare('SELECT count(DISTINCT Section) FROM Product');
        $result->execute();
        $results=$result->fetch();   
        return $results[0];
    }
}