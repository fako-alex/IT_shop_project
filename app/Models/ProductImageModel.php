<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImageModel extends Model
{
    use HasFactory;
    protected $table = 'product_image';

    public function getLogo()
    {
        //dd($this->all());
        if(!empty($this->image_name) && file_exists('uploads/products/'.$this->image_name)) 
        {
            return url('uploads/products/'.$this->image_name);
        }
        else
        {
            return"Images pas trouvée.";
            
        }
    }
}
