<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear roles
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Empresa']);
        $role3 = Role::create(['name' => 'Cliente']);
        $role4 = Role::create(['name' => 'Usuario']);



        //autenticacion
        Permission::create(['name' => 'auth.logout', 'description' => 'Cerrar sesión'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'auth.me', 'description' => 'Ver usuario autenticado'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'auth.refresh', 'description' => 'Refrescar token de sesión'])->syncRoles([$role1, $role2, $role3, $role4]);
        //roles
        Permission::create(['name' => 'admin.roles', 'description' => 'Ver listado de roles'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.roles.edit', 'description' => 'Editar roles'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.roles.create', 'description' => 'Crear roles'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.roles.assign.permission', 'description' => 'Asignar permisos al rol'])->syncRoles([$role1, $role2]);
        //categorias
        Permission::create(['name' => 'admin.categories', 'description' => 'Ver listado de categorias'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.categories.create', 'description' => 'Crear categorias'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.categories.edit', 'description' => 'Editar categorias'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.categories.delete', 'description' => 'Eliminar categorias'])->syncRoles([$role1, $role2]);
        //usuarios por compañia
        Permission::create(['name' => 'admin.usercompanies', 'description' => 'Ver listado usuarios por empresa'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.usercompanies.create', 'description' => 'Crear usuarios por empresa'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.usercompanies.edit', 'description' => 'Editar usuarios por empresa'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.usercompanies.delete', 'description' => 'Eliminar usuarios por empresa'])->syncRoles([$role1, $role2]);
        //usuarios
        Permission::create(['name' => 'admin.users', 'description' => 'Ver listado de usuarios'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.users.create', 'description' => 'Crear usuarios'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.users.edit', 'description' => 'Editar usuarios'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.users.delete', 'description' => 'Eliminar usuarios'])->syncRoles([$role1, $role2]);
        //beneficios
        Permission::create(['name' => 'admin.benefits', 'description' => 'Ver listado de beneficios'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.benefits.create', 'description' => 'Crear beneficios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.benefits.edit', 'description' => 'Editar beneficios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.benefits.delete', 'description' => 'Eliminar beneficios'])->syncRoles([$role1]);
        //planes
        Permission::create(['name' => 'admin.plans', 'description' => 'Ver listado de planes'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.plans.create', 'description' => 'Crear planes'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.plans.edit', 'description' => 'Editar planes'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.plans.delete', 'description' => 'Eliminar planes'])->syncRoles([$role1]);
        //servicios
        Permission::create(['name' => 'admin.services', 'description' => 'Ver listado de servicios'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.services.create', 'description' => 'Crear servicios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.services.edit', 'description' => 'Editar servicios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.services.delete', 'description' => 'Eliminar servicios'])->syncRoles([$role1]);
        //rason
        Permission::create(['name' => 'admin.reasons', 'description' => 'Ver listado de razones'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.reasons.create', 'description' => 'Crear razones'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.reasons.edit', 'description' => 'Editar razones'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.reasons.delete', 'description' => 'Eliminar razones'])->syncRoles([$role1]);
        //clientes
        Permission::create(['name' => 'admin.clients', 'description' => 'Ver listado de clientes'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.clients.create', 'description' => 'Crear clientes'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.clients.edit', 'description' => 'Editar clientes'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.clients.delete', 'description' => 'Eliminar clientes'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.home', 'description' => 'Ver la página principal'])->syncRoles([$role1, $role2, $role3, $role4]);
    }
}
