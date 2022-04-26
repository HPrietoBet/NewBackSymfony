<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/campanias' => [[['_route' => 'app_campanias', '_controller' => 'App\\Controller\\CampaniasController::index'], null, null, null, false, false, null]],
        '/campanias/get' => [[['_route' => 'app_campanias_get', '_controller' => 'App\\Controller\\CampaniasController::getCampaigns'], null, null, null, false, false, null]],
        '/facturacion-datos' => [[['_route' => 'app_facturacion_datos', '_controller' => 'App\\Controller\\FacturacionDatosController::index'], null, null, null, false, false, null]],
        '/facturacion-datos/save' => [[['_route' => 'app_facturacion_datos_save', '_controller' => 'App\\Controller\\FacturacionDatosController::save'], null, null, null, false, false, null]],
        '/home' => [
            [['_route' => 'app_home', '_controller' => 'App\\Controller\\HomeController::index'], null, null, null, false, false, null],
            [['_route' => 'home', '_controller' => 'App\\Controller\\HomeController::index'], null, null, null, false, false, null],
        ],
        '/home/charts' => [[['_route' => 'app_home_charts', '_controller' => 'App\\Controller\\HomeController::charts'], null, null, null, false, false, null]],
        '/login' => [
            [['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, ['GET' => 0, 'POST' => 1], null, false, false, null],
            [['_route' => 'login', '_controller' => 'App\\Controller\\SecurityController::index'], null, null, null, false, false, null],
        ],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
        '/users/admin' => [[['_route' => 'app_super_users', '_controller' => 'App\\Controller\\SuperUsersController::index'], null, null, null, false, false, null]],
        '/user/admin/save' => [[['_route' => 'app_super_users_save', '_controller' => 'App\\Controller\\SuperUsersController::save'], null, null, null, false, false, null]],
        '/users/bookies' => [[['_route' => 'app_users_bookies', '_controller' => 'App\\Controller\\UsersBookiesController::index'], null, null, null, false, false, null]],
        '/user/bookie/save' => [[['_route' => 'app_users_bookies_save', '_controller' => 'App\\Controller\\UsersBookiesController::save'], null, null, null, false, false, null]],
        '/user/bookie/delete' => [[['_route' => 'app_users_bookies_delete', '_controller' => 'App\\Controller\\UsersBookiesController::delete'], null, null, null, false, false, null]],
        '/users' => [[['_route' => 'app_users', '_controller' => 'App\\Controller\\UsersController::index'], null, null, null, false, false, null]],
        '/user/save' => [[['_route' => 'app_users_save', '_controller' => 'App\\Controller\\UsersController::save'], null, null, null, false, false, null]],
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:102)'
                            .'|router(*:116)'
                            .'|exception(?'
                                .'|(*:136)'
                                .'|\\.css(*:149)'
                            .')'
                        .')'
                        .'|(*:159)'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        159 => [
            [['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
