<?php

namespace Database\Seeders;

use App\Models\Reason;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       

        $reason1 = Reason::create([
            'status' => '2',
            'nombre' => 'National Curricula in One Place',
            'detalle' => 'Access study plans tailored to the curricula of various countries. Plan effortlessly while aligning with official educational standards.',

        ]);


        $reason2 = Reason::create([
            'status' => '2',
            'nombre' => 'Time Optimization for Teachers',
            'detalle' => 'Simplify your administrative tasks and focus on what truly matters: teaching. Our application helps you create plans in minutes.',

        ]);


        $reason3 = Reason::create([
            'status' => '2',
            'nombre' => 'AI-Powered Customization for Every Class',
            'detalle' => 'Create unique plans for your students with AI-powered tools tailored to your pedagogical needs and academic level',

        ]);

        $reason4 = Reason::create([
            'status' => '2',
            'nombre' => 'Collaborate and Share Ideas',
            'detalle' => 'Share your lesson plans with educators from around the globe. Learn new methodologies and enhance your teaching practice.',

        ]);

        $reason5 = Reason::create([
            'status' => '2',
            'nombre' => 'Accessible Anytime, Anywhere',
            'detalle' => 'Use the app on any device. Work on your plans wherever and whenever you need, even offline.',

        ]);

        $Reason6 = Reason::create([
            'status' => '2',
            'nombre' => 'Multilingual Support and Cultural Diversity',
            'detalle' => 'A platform designed for educators worldwide, compatible with multiple languages and adapted to diverse cultural realities.',

        ]);
    }
}
