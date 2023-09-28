<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $array = [
            '2' => 'ostan',
            '3' => 'cerk',
        ];
        foreach ($array as $key => $arr) {
            $category = Category::find($key);
            $imageFolderPath = public_path('images/gurman/'.$arr);
            if (File::isDirectory($imageFolderPath)) {
                $imageFiles = File::files($imageFolderPath);
                foreach ($imageFiles as $imageFile) {
                    $uploadedImagePath = upload('products/'.$arr, $imageFile); // Replace with your upload logic
                    $product = new Product();
                    $product->photo = $uploadedImagePath;
                    $category->product()->save($product);
                }
            }
        }
    }
}
