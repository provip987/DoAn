<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class favorite_product extends Model
{
    use HasFactory;
    
    protected $table="favorite_products";
    protected $fillable = ['user_id', 'products'];
    public $timestamps = false;

    public function add($userId, $productId) {
        $productIdsArray = [];
        $existingProductIds = $this->where('user_id', $userId)->value('products');
        if ($existingProductIds) {
            $existingProductIdsArray = json_decode($existingProductIds, true);
            $existed = false;
            foreach($existingProductIdsArray as $key => $value) {
                if($productId == $value) {
                    unset($existingProductIdsArray[$key]);
                    $existed = true;
                    break;
                }
            }
            if(!$existed) {
                $existingProductIdsArray[] = $productId;
                
            }
            $productIdsArray = array_values($existingProductIdsArray);
        } else {
            $productIdsArray[] = $productId;
        }
        $this->where('user_id', $userId)->delete();
        $this->create([
            'user_id' => $userId,
            'products' => json_encode($productIdsArray)
        ]);
    }
}
