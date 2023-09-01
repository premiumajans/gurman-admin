<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class SliderSeeder extends Seeder
{
    public function run(): void
    {
        $imageFolderPath = public_path('images/gurman/slider');
        if (File::isDirectory($imageFolderPath)) {
            $imageFiles = File::files($imageFolderPath);
            foreach ($imageFiles as $key => $imageFile) {
                $uploadedImagePath = upload('slider', $imageFile);
                $slider = new Slider();
                $slider->photo = $uploadedImagePath;
                $slider->order = $key + 1;
                $slider->save();
            }
        }
    }
}
