<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
              

        $client1 = Client::create([
            'status' => '2',
            'tipo' => 'Happy Educators',
            'detalle' => 'Empowering teachers worldwide',
            'total' => '521',

        ]);


        $client2 = Client::create([
            'status' => '2',
            'tipo' => 'Plans Created',
            'detalle' => 'Tailored lesson plans generated',
            'total' => '453',

        ]);


        $client3 = Client::create([
            'status' => '2',
            'tipo' => 'Hours Saved',
            'detalle' => 'Time optimized with our tools',
            'total' => '892',

        ]);

        $client4 = Client::create([
            'status' => '2',
            'tipo' => 'Countries Supported',
            'detalle' => 'National curricula included',
            'total' => '36',

        ]);

        $client5 = Client::create([
            'status' => '2',
            'tipo' => 'Community Members',
            'detalle' => 'Educators connected globally',
            'total' => '1200',

        ]);

        $Client6 = Client::create([
            'status' => '2',
            'tipo' => 'Feedback Received',
            'detalle' => 'Reviews and suggestions implemented',
            'total' => '350',
        ]);
    }
}
