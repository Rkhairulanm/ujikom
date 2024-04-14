<?php

namespace Database\Factories;

use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class ProdukFactory extends Factory
{
    protected $model = Produk::class;

    public function definition()
    {
        return [
            'nama_produk' => $this->faker->word,
            'image' => $this->faker->randomElement([
                'burgir-1711603318.jpg',
                'kue blueberry-1711605340.jpg',
                'saos-1711605354.jpg',
                '123-1711605360.jpg'
            ]),
            'harga' => $this->faker->numberBetween(15000, 50000),
            'stok' => $this->faker->numberBetween(1, 50),
        ];
    }
}
