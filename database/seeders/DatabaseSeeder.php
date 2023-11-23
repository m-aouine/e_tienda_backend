<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       // Commands for seeder
        //php artisan db:seed
        //php artisan make:seeder ProductsTableSeeder


        
     // Insert data into the 'products' table
     $this->insertProduct('BRAV-001', 'Balon de Futbol', 29.30, '', 0);
     $this->insertProduct('BRAV-002', 'Balon de Basket', 22.00, 'https://wilsonstore.com.co/wp-content/uploads/2023/02/WTB9300XB07-1_0000_WTB9300XB_0_7_NBA_DRV_BSKT_OR.png.cq5dam.web_.1200.1200.jpg', 1);
     $this->insertProduct('BRAV-003', 'Pelota de tenis', 8.99, 'https://assets.stickpng.com/images/580b585b2edbce24c47b2b90.png', 1);
     $this->insertProduct('BRAV-004', 'Raqueta', 49.50, 'https://larrytennis.com/cdn/shop/products/WR074011U_9_900x.jpg', 1);
     $this->insertProduct('BRAV-005', 'Palo de Golf', 85.99, 'https://i.ebayimg.com/thumbs/images/g/TEsAAOSwIK5fsjRp/s-l225.jpg', 1);
 }
 
 private function insertProduct($code, $name, $price, $image, $active)
 {
     $productId = DB::table('products')->insertGetId([
         'product_code' => $code,
         'product_name' => $name,
         'product_price' => $price,
         'product_image' => $image,
         'product_active' => $active,
         'product_created_by' => 1,
         'product_modified_by' => 1,
         'product_delete' => 0,
         'product_created_at' => now(),
         'product_modified_at' => null,
     ]);
 
     return $productId;
        
        
        













        
    }
}
