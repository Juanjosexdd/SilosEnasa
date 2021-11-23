<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'title' => 'AdminLTE 3',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_ico_only' => true,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'logo' => '<b>ENASA</b>',
    'logo_img' => 'vendor/adminlte/dist/img/logo.png',
    'logo_img_class' => 'brand-image elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'ENASA',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => true,
    'usermenu_header_class' => 'bg-navy',
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => true,
    'layout_fixed_navbar' => true,
    'layout_fixed_footer' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_body' => '',
    'classes_brand' => 'brand-link navbar-navy',
    'classes_brand_text' => 'text-white',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-light-navy elevation-4',
    'classes_sidebar_nav' => ' nav-child-indent ',
    'classes_topnav' => 'navbar-dark navbar-navy text-info',
    'classes_topnav_nav' => 'navbar-expand text-info',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => true,
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => 'admin',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'menu' => [
        [
            'text' => 'search',
            'search' => false,
            'sidebar' => false,
        ],
        [
            'text' => 'blog',
            'url'  => 'admin/blog',
            'can'  => 'manage-blog',
        ],
        [
            'text'        => 'Inicio',
            'url'         => 'admin',
            'icon'        => 'fas fa-tachometer-alt fa-fw text-blue'
        ],
        [
            'text'        => 'Mi Perfil',
            'url'         => 'user/profile',
            'icon'        => 'fas fa-user text-blue'
        ],
        [
            'text' => 'Mis solicitudes',
            'route'  => 'admin.solicituds.index',
            'icon' => 'fas fa-clipboard-list text-blue',
            'active' => ['admin/solicituds*'],
        ],

        [
            'header' => 'MOVIMIENTOS',
            'can' => 'movimientossistema'
        ],
        [
            'text'    => 'MOVIMIENTOS',
            'icon'    => 'fas fa-truck-loading text-blue',
            'can'  => 'movimientossistema',
            'submenu' => [
                [
                    'text' => 'Proveedores',
                    'route'  => 'admin.proveedors.index',
                    'icon' => 'fas fa-user-tie text-blue',
                    'active' => ['admin/proveedors*'],
                    'can'  => 'admin.proveedors.index',

                ],
                [
                    'text' => 'Ingreso',
                    'route'  => 'admin.ingresos.index',
                    'icon' => 'fas fa-people-carry text-blue',
                    'active' => ['admin/ingresos*'],
                    'can'  => 'admin.ingresos.index',

                ],
                [
                    'text' => 'Egreso',
                    'route'  => 'admin.egresos.index',
                    'icon' => 'fas fa-dolly text-blue',
                    'active' => ['admin/egresos*'],
                    'can'  => 'admin.egresos.index',

                ],
                [
                    'text' => 'Requisición',
                    'route'  => 'admin.requisicions.index',
                    'icon' => 'fas fa-clipboard-list text-blue',
                    'active' => ['admin/requisicions*'],
                    'can'  => 'admin.requisicions.index',
                ],
                [
                    'text' => 'Solicitudes',
                    'route'  => 'admin.solicitudes.index',
                    'icon' => 'fas fa-clipboard-list text-blue',
                    'active' => ['admin/solicitudes*'],
                ],
            ],
        ],
        [
            'text'    => 'BIENES NACIONALES',
            'icon'    => 'fas fa-archive text-blue',
            'can'  => 'bienesnacionales',
            'submenu' => [
                [
                    'text' => 'Clasificación',
                    'route'  => 'admin.clacificacionbienes.index',
                    'icon' => 'fas fa-boxes text-blue',
                    'active' => ['admin/clacificacionbienes*'],
                    'can'  => 'admin.clacificacionbienes.index',

                ],
                [
                    'text' => 'Bienes',
                    'route'  => 'admin.biennacionals.index',
                    'icon' => 'fas fa-archive text-blue',
                    'active' => ['admin/biennacionals*'],
                    'can'  => 'admin.biennacionals.index',

                ],
                [
                    'text' => 'Asignacion',
                    'route'  => 'admin.asignacions.index',
                    'icon' => 'fas fa-child text-blue',
                    'active' => ['admin/asignacions*'],
                    'can'  => 'admin.asignacions.index',

                ]
            ],
        ],
        [
            'header' => 'INVENTARIO',
            'can'  => 'inventariosistema'
        ],
        [
            'text'    => 'INVENTARIO',
            'icon'    => 'fas fa-warehouse text-blue',
            'can'  => 'inventariosistema',
            'submenu' => [
                [
                    'text' => 'Empleados',
                    'route'  => 'admin.empleados.index',
                    'icon' => 'fas fa-fw fa-users text-blue',
                    'active' => ['admin/empleados*'],
                    'can'  => 'admin.empleados.index',
                ],
                [
                    'text' => 'Almacenes',
                    'route'  => 'admin.almacens.index',
                    'icon' => 'fas fa-warehouse text-blue',
                    'active' => ['admin/almacens*'],
                    'can'  => 'admin.almacens.index',
                ],
                [
                    'text' => 'Clasificación',
                    'route'  => 'admin.clacificacions.index',
                    'icon' => 'fas fa-boxes text-blue',
                    'active' => ['admin/clacificacions*'],
                    'can'  => 'admin.clacificacions.index',
                ],
                [
                    'text' => 'Productos',
                    'route'  => 'admin.productos.index',
                    'icon' => 'fab fa-product-hunt text-blue',
                    'active' => ['admin/productos*'],
                    'can'  => 'admin.productos.index',
                ],
            ],
        ],
        [
            'header' => 'REPORTES',
            // 'can' => 'movimientossistema'
        ],
        [
            'text'    => 'Reportes',
            'icon'    => 'far fa-file-pdf text-blue',
            // 'can'  => 'movimientossistema',
            'submenu' => [
                [
                    'text' => 'Reportes',
                    'route'  => 'admin.report.index',
                    'icon' => 'fas fa-clipboard-list text-blue',
                    'active' => ['admin/report*'],
                    // 'can'  => 'admin.proveedors.index',

                ],
            ],
        ],
        [
            'header' => 'AJUSTES DE SISTEMA',
            'can'  => 'ajustessistema'
        ],
        [
            'text'    => 'AJUSTES EMPRESA',
            'icon'    => 'fas fa-cogs text-blue',
            'can'  => 'ajustessistema',
            'submenu' => [
                [
                    'text' => 'Tipo Documentos',
                    'route'  => 'admin.tipodocumentos.index',
                    'icon' => 'far fa-file-alt text-blue',
                    'active' => ['admin/tipodocumentos*'],
                    'can'  => 'admin.tipodocumentos.index',
                ],
                [
                    'text' => 'Cargos',
                    'route'  => 'admin.cargos.index',
                    'icon' => 'fas fa-project-diagram text-blue',
                    'active' => ['admin/cargos*'],
                    'can'  => 'admin.cargos.index',

                ],
                [
                    'text' => 'Departamentos',
                    'route'  => 'admin.departamentos.index',
                    'icon' => 'fas fa-sitemap text-blue',
                    'active' => ['admin/departamentos*'],
                    'can'  => 'admin.departamentos.index',
                ],
                [
                    'text' => 'Estados',
                    'route'  => 'admin.estados.index',
                    'icon' => 'fas fa-map-marked-alt text-blue',
                    'active' => ['admin/estados*'],
                    'can'  => 'admin.estados.index',
                ],

                [
                    'text' => 'Municipios',
                    'route'  => 'admin.ciudads.index',
                    'icon' => 'fas fa-map-marked-alt text-blue',
                    'active' => ['admin/ciudads*'],
                    'can'  => 'admin.ciudads.index',
                ]
            ],
        ],
        [
            'header' => 'SEGURIDAD DEL SISTEMA',
            'can'  => 'seguridadsistema'
        ],
        [
            'text'    => 'SEGURIDAD SISTEMA',
            'icon'    => 'fas fa-fw fa-user-shield text-blue',
            'can'  => 'seguridadsistema',
            'submenu' => [
                [
                    'text' => 'Usuarios',
                    'route'  => 'admin.users.index',
                    'icon' => 'fas fa-fw fa-users-cog text-blue',
                    'active' => ['admin/users*'],
                    'can'    => 'admin.users.index',
                ],
                [
                    'text' => 'Roles y permisos',
                    'route'  => 'admin.roles.index',
                    'icon' => 'fas fa-code-branch text-blue',
                    'active' => ['admin/roles*'],
                    'can' => 'admin.roles.index',
                ],
                [
                    'text' => 'Registros',
                    'route'  => 'admin.logs.index',
                    'icon' => 'fas fa-clipboard-list text-blue',
                    'active' => ['admin/logs*'],
                    'can' => 'admin.logs.index',
                ],
                [
                    'text' => 'Sesiones',
                    'route'  => 'admin.logins.index',
                    'icon' => 'fas fa-traffic-light text-blue',
                    'active' => ['admin/logins*'],
                    'can' => 'admin.logins.index',
                ],
                [
                    'text' => 'Respaldos',
                    'route'  => 'admin.respaldos.index',
                    'icon' => 'fas fa-cloud-download-alt text-blue',
                    'active' => ['admin/backup*'],
                ],
            ],

        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
        'BsCustomFileInput' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/bs-custom-file-input/bs-custom-file-input.min.js',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    */

    'livewire' => true,
];
