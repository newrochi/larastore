<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // use HasFactory;

    /**
    * PRODUCT ATTRIBUTES
    * $this->attributes['id'] - int - contains the product primary key (id)
    * $this->attributes['name'] - string - contains the product name
    * $this->attributes['description'] - string - contains the product description
    * $this->attributes['image'] - string - contains the product image
    * $this->attributes['price'] - int - contains the product price
    * $this->attributes['created_at'] - timestamp - contains the product creation date
    * $this->attributes['updated_at'] - timestamp - contains the product update date
    *this->items - Item[] - contains the associated items
    */

    public function items()
    {
    return $this->hasMany(Item::class);
    }
    public function getItems()
    {
    return $this->items;
    }
    public function setItems($items)
    {
    $this->items = $items;
    }

    //Validation
    public static function validate($request){
        $request->validate([
            "name" => "required|max:255",
            "description" => "required",
            "price" => "required|numeric|gt:0",
            'image' => 'image',
            ]);
    }

    public static function sumPricesByQuantities($products,$producsInSession){
        $total=0;
        foreach($products as $product){
            $total=$total+$product->getPrice()*$producsInSession[$product->getId()];
        }
        return $total;
    }

    //Id getter & setter
    public function getId()
    {
        return $this->attributes['id'];
    }
    public function setId($id)
    {
    $this->attributes['id'] = $id;
    }
    //name getter & setter
    public function getName()
    {
    return $this->attributes['name'];
    }
    public function setName($name)
    {
    $this->attributes['name'] = $name;
    }
    //description getter & setter
    public function getDescription()
    {
    return $this->attributes['description'];
    }
    public function setDescription($description)
    {
    $this->attributes['description'] = $description;
    }
    //image getter & setter
    public function getImage()
    {
    return $this->attributes['image'];
    }
    public function setImage($image)
    {
    $this->attributes['image'] = $image;
    }
    //price getter & setter
    public function getPrice()
    {
    return $this->attributes['price'];
    }
    public function setPrice($price)
    {
    $this->attributes['price'] = $price;
    }
    //created_at getter & setter
    public function getCreatedAt()
    {
    return $this->attributes['created_at'];
    }
    public function setCreatedAt($createdAt)
    {
    $this->attributes['created_at'] = $createdAt;
    }
    //updated_at getter & setter
    public function getUpdatedAt()
    {
    return $this->attributes['updated_at'];
    }
    public function setUpdatedAt($updatedAt)
    {
    $this->attributes['updated_at'] = $updatedAt;
    }


}
