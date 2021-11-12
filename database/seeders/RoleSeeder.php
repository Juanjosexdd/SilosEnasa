<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'ADMINISTRADOR']);
        $role2 = Role::create(['name' => 'USUARIO']);

        // 1
        Permission::create([
            'name' => 'home',
            'description' => 'Ver el dashboard'
        ])->syncRoles([$role1, $role2]);

        ###################################····USUARIOS····############################################
        //2
        Permission::create([
            'name'        => 'admin.users.index',
            'description' => 'Ver listado de usuarios'
        ])->syncRoles([$role1]);
        //3
        Permission::create([
            'name'        => 'admin.users.create',
            'description' => 'Crear usuarios'
        ])->syncRoles([$role1]);
        //4
        Permission::create([
            'name'        => 'admin.users.edit',
            'description' => 'Eliminar usuarios'
        ])->syncRoles([$role1]);
        //5
        Permission::create([
            'name'        => 'admin.users.destroy',
            'description' => 'Cambiar estatus de usuarios'
        ])->syncRoles([$role1]);
        //6
        Permission::create([
            'name'        => 'admin.users.UpdateStatus',
            'description' => 'Cambiar estatus de usuarios'
        ])->syncRoles([$role1]);

        ################################····ROLES Y PERMISOS····########################################
        //7
        Permission::create([
            'name'        => 'admin.roles.index',
            'description' => 'Ver listado de Roles'
        ])->syncRoles([$role1]);
        //8
        Permission::create([
            'name'        => 'admin.roles.create',
            'description' => 'Crear Roles'
        ])->syncRoles([$role1]);
        //9
        Permission::create([
            'name'        => 'admin.roles.edit',
            'description' => 'Eliminar Roles'
        ])->syncRoles([$role1]);
        //10
        Permission::create([
            'name'        => 'admin.roles.destroy',
            'description' => 'Cambiar estatus de Roles'
        ])->syncRoles([$role1]);
        #################################····LOGS Y SESIONES····########################################
        //11
        Permission::create([
            'name'        => 'admin.logs.index',
            'description' => 'Ver listado de Registros'
        ])->syncRoles([$role1]);
        //12
        Permission::create([
            'name'        => 'admin.logins.index',
            'description' => 'Ver listado de Sesiones'
        ])->syncRoles([$role1]);

        ###################################····TIPO DOCUMENTOS····################################
        //13
        Permission::create([
            'name'        => 'admin.tipodocumentos.index',
            'description' => 'Ver listado de tipo documentos'
        ])->syncRoles([$role1]);
        //14                
        Permission::create([
            'name'        => 'admin.tipodocumentos.create',
            'description' => 'Crear tipo documentos'
        ])->syncRoles([$role1]);
        //15                
        Permission::create([
            'name'        => 'admin.tipodocumentos.edit',
            'description' => 'Eliminar tipo documentos'
        ])->syncRoles([$role1]);
        //16                
        Permission::create([
            'name'        => 'admin.tipodocumentos.destroy',
            'description' => 'Cambiar estatus de tipo documentos'
        ])->syncRoles([$role1]);
        //17
        Permission::create([
            'name'        => 'admin.tipodocumentos.estatutipodocumento',
            'description' => 'Cambiar estatus de tipo documentos'
        ])->syncRoles([$role1]);


        ###################################····CARGOS····################################
        //18
        Permission::create([
            'name'        => 'admin.cargos.index',
            'description' => 'Ver listado de cargos'
        ])->syncRoles([$role1]);
        //19                
        Permission::create([
            'name'        => 'admin.cargos.create',
            'description' => 'Crear cargos'
        ])->syncRoles([$role1]);
        //20               
        Permission::create([
            'name'        => 'admin.cargos.edit',
            'description' => 'Editar cargos'
        ])->syncRoles([$role1]);
        //21                
        Permission::create([
            'name'        => 'admin.cargos.destroy',
            'description' => 'Eliminar estatus de cargos'
        ])->syncRoles([$role1]);
        //22
        Permission::create([
            'name'        => 'admin.cargos.estatucargo',
            'description' => 'Cambiar estatus de cargos'
        ])->syncRoles([$role1]);

        ###################################····DEPARTAMENTOS····################################
        //23
        Permission::create([
            'name'        => 'admin.departamentos.index',
            'description' => 'Ver listado de departamentos'
        ])->syncRoles([$role1]);
        //24                
        Permission::create([
            'name'        => 'admin.departamentos.create',
            'description' => 'Crear departamentos'
        ])->syncRoles([$role1]);
        //25               
        Permission::create([
            'name'        => 'admin.departamentos.edit',
            'description' => 'editar departamentos'
        ])->syncRoles([$role1]);
        //26               
        Permission::create([
            'name'        => 'admin.departamentos.destroy',
            'description' => 'eliminar departamentos'
        ])->syncRoles([$role1]);
        //27
        Permission::create([
            'name'        => 'admin.departamentos.estatudepartamento',
            'description' => 'Cambiar estatus de departamentos'
        ])->syncRoles([$role1]);

        ###################################····ESTADOS····################################
        //28
        Permission::create([
            'name'        => 'admin.estados.index',
            'description' => 'Ver listado de estados'
        ])->syncRoles([$role1]);
        //29
        Permission::create([
            'name'        => 'admin.estados.create',
            'description' => 'Crear estados'
        ])->syncRoles([$role1]);
        //30              
        Permission::create([
            'name'        => 'admin.estados.edit',
            'description' => 'Editar estados'
        ])->syncRoles([$role1]);
        //31              
        Permission::create([
            'name'        => 'admin.estados.destroy',
            'description' => 'Eliminar estados'
        ])->syncRoles([$role1]);
        //32
        Permission::create([
            'name'        => 'admin.estados.estatuestado',
            'description' => 'Cambiar estatus de estados'
        ])->syncRoles([$role1]);

        ###################################····MUNICIPIOS····################################
        //33
        Permission::create([
            'name'        => 'admin.ciudads.index',
            'description' => 'Ver listado de municipios'
        ])->syncRoles([$role1]);
        //34              
        Permission::create([
            'name'        => 'admin.ciudads.create',
            'description' => 'Crear municipios'
        ])->syncRoles([$role1]);
        //35               
        Permission::create([
            'name'        => 'admin.ciudads.edit',
            'description' => 'Editar municipios'
        ])->syncRoles([$role1]);
        //36               
        Permission::create([
            'name'        => 'admin.ciudads.destroy',
            'description' => 'Eliminar municipios'
        ])->syncRoles([$role1]);
        //37
        Permission::create([
            'name'        => 'admin.ciudads.estatuciudad',
            'description' => 'Cambiar estatus de municipios'
        ])->syncRoles([$role1]);

        ###################################····EMPLEADOS····################################
        //38
        Permission::create([
            'name'        => 'admin.empleados.index',
            'description' => 'Ver listado de empleados'
        ])->syncRoles([$role1]);
        //39             
        Permission::create([
            'name'        => 'admin.empleados.create',
            'description' => 'Crear empleados'
        ])->syncRoles([$role1]);
        //40            
        Permission::create([
            'name'        => 'admin.empleados.edit',
            'description' => 'Editar empleados'
        ])->syncRoles([$role1]);
        //41              
        Permission::create([
            'name'        => 'admin.empleados.destroy',
            'description' => 'Eliminar empleados'
        ])->syncRoles([$role1]);
        //42
        Permission::create([
            'name'        => 'admin.empleados.estatuempleado',
            'description' => 'Cambiar estatus de empleados'
        ])->syncRoles([$role1]);

        ###################################····ALMACENES····################################
        //43
        Permission::create([
            'name'        => 'admin.almacens.index',
            'description' => 'Ver listado de almacens'
        ])->syncRoles([$role1]);
        //44              
        Permission::create([
            'name'        => 'admin.almacens.create',
            'description' => 'Crear almacens'
        ])->syncRoles([$role1]);
        //45               
        Permission::create([
            'name'        => 'admin.almacens.edit',
            'description' => 'Editar almacens'
        ])->syncRoles([$role1]);
        //46             
        Permission::create([
            'name'        => 'admin.almacens.destroy',
            'description' => 'Eliminar almacens'
        ])->syncRoles([$role1]);
        //47
        Permission::create([
            'name'        => 'admin.almacens.estatualmacen',
            'description' => 'Cambiar estatus de almacens'
        ])->syncRoles([$role1]);

        ###################################····CLACIFICACION····################################
        //48
        Permission::create([
            'name'        => 'admin.clacificacions.index',
            'description' => 'Ver listado de clacificacion'
        ])->syncRoles([$role1]);
        //49               
        Permission::create([
            'name'        => 'admin.clacificacions.create',
            'description' => 'Crear clacificacion'
        ])->syncRoles([$role1]);
        //50           
        Permission::create([
            'name'        => 'admin.clacificacions.edit',
            'description' => 'Editar clacificacion'
        ])->syncRoles([$role1]);
        //51              
        Permission::create([
            'name'        => 'admin.clacificacions.destroy',
            'description' => 'Eliminar clacificacion'
        ])->syncRoles([$role1]);
        //52
        Permission::create([
            'name'        => 'admin.clacificacions.estatuclacificacion',
            'description' => 'Cambiar estatus de clacificacion'
        ])->syncRoles([$role1]);

        ###################################····PRODUCTOS····################################
        //53
        Permission::create([
            'name'        => 'admin.productos.index',
            'description' => 'Ver listado de productos'
        ])->syncRoles([$role1]);
        //54               
        Permission::create([
            'name'        => 'admin.productos.create',
            'description' => 'Crear productos'
        ])->syncRoles([$role1]);
        //55             
        Permission::create([
            'name'        => 'admin.productos.edit',
            'description' => 'Editar productos'
        ])->syncRoles([$role1]);
        //56               
        Permission::create([
            'name'        => 'admin.productos.destroy',
            'description' => 'Eliminar productos'
        ])->syncRoles([$role1]);
        //57
        Permission::create([
            'name'        => 'admin.productos.estatuproducto',
            'description' => 'Cambiar estatus de productos'
        ])->syncRoles([$role1]);

         ###################################····PRODUCTOS····################################
        //58
        Permission::create([
            'name'        => 'admin.proveedors.index',
            'description' => 'Ver listado de proveedores'
        ])->syncRoles([$role1]);
        //59               
        Permission::create([
            'name'        => 'admin.proveedors.create',
            'description' => 'Crear proveedores'
        ])->syncRoles([$role1]);
        //60             
        Permission::create([
            'name'        => 'admin.proveedors.edit',
            'description' => 'Editar proveedores'
        ])->syncRoles([$role1]);
        //61               
        Permission::create([
            'name'        => 'admin.proveedors.destroy',
            'description' => 'Eliminar proveedores'
        ])->syncRoles([$role1]);
        //62
        Permission::create([
            'name'        => 'admin.proveedors.estatuproveedor',
            'description' => 'Cambiar estatus de proveedores'
        ])->syncRoles([$role1]);

        #############################################################################################
        //63
        Permission::create([
            'name'        => 'seguridadsistema',
            'description' => 'Acceso a seguridad del sistema'
        ])->syncRoles([$role1]);
        //64
        Permission::create([
            'name'        => 'ajustessistema',
            'description' => 'Acceso a ajustes del sistema'
        ])->syncRoles([$role1]);
        //65
        Permission::create([
            'name'        => 'inventariosistema',
            'description' => 'Acceso a inventario del sistema'
        ])->syncRoles([$role1]);
        //66
        Permission::create([
            'name'        => 'movimientossistema',
            'description' => 'Acceso a movimientos del sistema'
        ])->syncRoles([$role1]);

        ###################################····INGRESOS····################################
        //67
        Permission::create([
            'name'        => 'admin.ingresos.index',
            'description' => 'Ver listado de ingresos'
        ])->syncRoles([$role1]);
        //68               
        Permission::create([
            'name'        => 'admin.ingresos.create',
            'description' => 'Crear ingresos'
        ])->syncRoles([$role1]);
        //69
        Permission::create([
            'name'        => 'admin.ingresos.estatuingresos',
            'description' => 'Cambiar estatus de ingresos'
        ])->syncRoles([$role1]);
        ###################################····EGRESOS····################################
        //70
        Permission::create([
            'name'        => 'admin.egresos.index',
            'description' => 'Ver listado de egresos'
        ])->syncRoles([$role1]);
        //71              
        Permission::create([
            'name'        => 'admin.egresos.create',
            'description' => 'Crear egresos'
        ])->syncRoles([$role1]);
        //72
        Permission::create([
            'name'        => 'admin.egresos.estatuegresos',
            'description' => 'Cambiar estatus de egresos'
        ])->syncRoles([$role1]);
        ###################################····REQUISICION····################################
        //73
        Permission::create([
            'name'        => 'admin.requisicions.index',
            'description' => 'Ver listado de requisicions'
        ])->syncRoles([$role1]);
        //74              
        Permission::create([
            'name'        => 'admin.requisicions.create',
            'description' => 'Crear requisicions'
        ])->syncRoles([$role1]);
        //75
        Permission::create([
            'name'        => 'admin.requisicions.estaturequisicions',
            'description' => 'Cambiar estatus de requisicions'
        ])->syncRoles([$role1]);
        ###################################····RESPALDOS····################################
        //76
        Permission::create([
            'name'        => 'admin.respaldos.index',
            'description' => 'Ver listado de Respaldos'
        ])->syncRoles([$role1]);

        ###################################····CLACIFICACION BIENES····################################
        //82
        Permission::create([
            'name'        => 'bienesnacionales',
            'description' => 'Acceso a movimientos del sistema'
        ])->syncRoles([$role1]);
        //77
        Permission::create([
            'name'        => 'admin.clacificacionbienes.index',
            'description' => 'Ver listado de clacificacion de bienes'
        ])->syncRoles([$role1]);
        //78             
        Permission::create([
            'name'        => 'admin.clacificacionbienes.create',
            'description' => 'Crear clacificacion de bienes'
        ])->syncRoles([$role1]);
        //79               
        Permission::create([
            'name'        => 'admin.clacificacionbienes.edit',
            'description' => 'Editar clacificacion de bienes'
        ])->syncRoles([$role1]);
        //80             
        Permission::create([
            'name'        => 'admin.clacificacionbienes.destroy',
            'description' => 'Eliminar clacificacion de bienes'
        ])->syncRoles([$role1]);
        //81
        Permission::create([
            'name'        => 'admin.clacificacionbienes.estatuclacificacionbien',
            'description' => 'Cambiar estatus de clacificacion de bienes'
        ])->syncRoles([$role1]);

        ###################################····BIENES····################################
        //83
        Permission::create([
            'name'        => 'admin.biennacionals.index',
            'description' => 'Ver listado de  bienes'
        ])->syncRoles([$role1]);
        //84             
        Permission::create([
            'name'        => 'admin.biennacionals.create',
            'description' => 'Crear  bienes'
        ])->syncRoles([$role1]);
        //85               
        Permission::create([
            'name'        => 'admin.biennacionals.edit',
            'description' => 'Editar  bienes'
        ])->syncRoles([$role1]);
        //86             
        Permission::create([
            'name'        => 'admin.biennacionals.destroy',
            'description' => 'Eliminar almacens'
        ])->syncRoles([$role1]);
        //87
        Permission::create([
            'name'        => 'admin.biennacionals.estatuclacificacionbien',
            'description' => 'Cambiar estatus de  bienes'
        ])->syncRoles([$role1]);

        ###################################····ASIGNACIONBIENES····################################
        //88
        Permission::create([
            'name'        => 'admin.asignacions.index',
            'description' => 'Ver listado de asignaciones'
        ])->syncRoles([$role1]);
        //89              
        Permission::create([
            'name'        => 'admin.asignacions.create',
            'description' => 'Crear asignaciones'
        ])->syncRoles([$role1]);
        //90
        Permission::create([
            'name'        => 'admin.asignacions.estatuasignacion',
            'description' => 'Cambiar estatus de asignaciones'
        ])->syncRoles([$role1]);


    }

}
