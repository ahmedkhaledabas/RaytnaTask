<?php
namespace App\Database\Models;

use App\Database\Config\Connection;
use App\Database\Contracts\Crud;

class Product extends Connection implements Crud{

    private $id , $name , $price , $image , $status;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     */
    public function setPrice($price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     */
    public function setImage($image): self
    {
        $this->image = $image;

        return $this;
    }

    public function create(){

    }
    public function read(){
        $query = "SELECT * FROM `products` WHERE `status` = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i',$this->status);
        $stmt->execute();
        return $stmt->get_result();
    }
    public function update(){

    }
    public function delete(){

    }

    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     */
    public function setStatus($status): self
    {
        $this->status = $status;

        return $this;
    }

}