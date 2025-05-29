<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void
    {


        $service1 = Service::create([
            'status' => '2',
            'nombre' => 'Efficient Planning',
            'detalle' => 'An intuitive tool that allows teachers to plan quickly, optimizing time and effort.',

        ]);


        $service2 = Service::create([
            'status' => '2',
            'nombre' => 'Global Access to Content',
            'detalle' => 'Integrates educational resources from different countries for teaching aligned with international standards.',

        ]);


        $service3 = Service::create([
            'status' => '2',
            'nombre' => 'Improved Teacher Performance',
            'detalle' => 'Automates repetitive tasks, allowing teachers to focus on teaching and enhance their performance.',

        ]);

        $service4 = Service::create([
            'status' => '2',
            'nombre' => 'Smart Tools',
            'detalle' => 'Create customized lessons with AI, making planning easier for each group of students.',

        ]);

        $service5 = Service::create([
            'status' => '2',
            'nombre' => 'Full Flexibility',
            'detalle' => 'Access from any device, enabling teachers to plan anytime and anywhere.',

        ]);

        $service6 = Service::create([
            'status' => '2',
            'nombre' => 'Global Educator Community',
            'detalle' => 'Connect with a community of educators to share resources and teaching experiences.',

        ]);
    }
}
