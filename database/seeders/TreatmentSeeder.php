<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Treatment;
use Illuminate\Database\Seeder;

class TreatmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Product::all() as $prod) {
            $last = Treatment::latest()->first();

            if ($prod->name == 'Root Canal') {
                Treatment::create([
                    'product_id' => $prod->id,
                    'name' => 'Consultation',
                    'price' => 100000,
                ]);
                Treatment::create([
                    'product_id' => $prod->id,
                    'name' => 'Trepanansi',
                    'price' => 100000,
                ]);
                Treatment::create([
                    'product_id' => $prod->id,
                    'name' => 'Medication',
                    'price' => 100000,
                ]);
            } else {
                $r = rand(3, 5);
                $c = $prod->price / $r;
                for ($i = 0; $i < $r; $i++) {
                    Treatment::create([
                        'product_id' => $prod->id,
                        'name' => 'Treatment '.(is_null($last) ? 1 : $last->id + 1),
                        'price' => $c,
                    ]);
                }
            }
        }
    }
}
