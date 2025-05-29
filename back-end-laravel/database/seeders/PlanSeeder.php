<?php

namespace Database\Seeders;

use App\Models\Benefit;
use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $beneficios = [
            'Herramientas de planificación esenciales',
            'Herramientas impulsadas por IA para la planificación personalizada de lecciones',
            'Plantillas personalizables para la planificación de lecciones',
            'Plantillas avanzadas para diferentes estilos de enseñanza.',
            'Administrador de cuenta dedicado para configuración y capacitación',
            'Panel de análisis completo para supervisar el uso del plan de estudios'
        ];

        // Crear los beneficios en la base de datos
        $createdBenefits = [];
        foreach ($beneficios as $beneficio) {
            $createdBenefits[] = Benefit::create(['description' => $beneficio]);
        }

        // Crear los planes
        $startPlan = Plan::create([
            'status' => '2',
            'name' => 'Plan de Inicio',
            'monthly_price' => 9.00,
            'description' => 'Ideal para educadores individuales que comienzan con la planificación de clases',
            'team_size' => 1, // Usuario único
            'premium_support_months' => 0,
            'free_updates_months' => 1, // Duración del plan de 1 mes
        ]);

        $professionalPlan = Plan::create([
            'status' => '2',
            'name' => 'Plan Profesional',
            'monthly_price' => 39.00,
            'description' => 'Perfecto para pequeños equipos de enseñanza o usuarios individuales avanzados.',
            'team_size' => 5, // Hasta 5 usuarios
            'premium_support_months' => 3, // 3 meses de soporte premium
            'free_updates_months' => 6, // Duración del plan de 6 meses
        ]);

        $institutionalPlan = Plan::create([
            'status' => '2',
            'name' => 'Plan Institucional',
            'monthly_price' => 199.00,
            'description' => 'Ideal para uso a gran escala por parte de escuelas y organizaciones educativas.',
            'team_size' => 100, // Usuarios ilimitados
            'premium_support_months' => 6, // Soporte premium de 6 meses
            'free_updates_months' => 12, // Duración del plan de 12 meses
        ]);

        // Asignar beneficios a los planes
        // Plan de Inicio: los primeros 2 beneficios
        $startPlan->benefits()->sync($createdBenefits[0]->id, $createdBenefits[1]->id);

        // Plan Profesional: los primeros 4 beneficios
        $professionalPlan->benefits()->sync([
            $createdBenefits[0]->id,
            $createdBenefits[1]->id,
            $createdBenefits[2]->id,
            $createdBenefits[3]->id,
        ]);

        // Plan Institucional: todos los beneficios
        $institutionalPlan->benefits()->sync(array_map(fn($benefit) => $benefit->id, $createdBenefits));
    }
}
