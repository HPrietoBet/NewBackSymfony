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
        '/categories' => [[['_route' => 'app_categories', '_controller' => 'App\\Controller\\CategoriesController::index'], null, null, null, false, false, null]],
        '/category/save' => [[['_route' => 'app_categories_save', '_controller' => 'App\\Controller\\CategoriesController::save'], null, null, null, false, false, null]],
        '/clients' => [[['_route' => 'app_clients', '_controller' => 'App\\Controller\\ClientsController::index'], null, null, null, false, false, null]],
        '/client/save' => [[['_route' => 'app_clients_save', '_controller' => 'App\\Controller\\ClientsController::save'], null, null, null, false, false, null]],
        '/client/comment/delete' => [[['_route' => 'app_clients_comment_delete', '_controller' => 'App\\Controller\\ClientsController::deleteCommentClient'], null, null, null, false, false, null]],
        '/client/new' => [[['_route' => 'app_client_new', '_controller' => 'App\\Controller\\ClientsController::newClient'], null, null, null, false, false, null]],
        '/client/comment/add' => [[['_route' => 'app_client_comment_add', '_controller' => 'App\\Controller\\ClientsController::addComment'], null, null, null, false, false, null]],
        '/client/invoice/save' => [[['_route' => 'app_client_invoice_save', '_controller' => 'App\\Controller\\ClientsController::saveInvoice'], null, null, null, false, false, null]],
        '/client/deal/save' => [[['_route' => 'app_client_deal_save', '_controller' => 'App\\Controller\\ClientsController::saveDeal'], null, null, null, false, false, null]],
        '/competency' => [[['_route' => 'app_competency', '_controller' => 'App\\Controller\\CompetencyController::index'], null, null, null, false, false, null]],
        '/competency/save' => [[['_route' => 'app_competency_save', '_controller' => 'App\\Controller\\CompetencyController::save'], null, null, null, false, false, null]],
        '/competency/upload' => [[['_route' => 'app_clients_upload_logo', '_controller' => 'App\\Controller\\CompetencyController::uploadLogo'], null, null, null, false, false, null]],
        '/facturacion-datos' => [[['_route' => 'app_facturacion_datos', '_controller' => 'App\\Controller\\FacturacionDatosController::index'], null, null, null, false, false, null]],
        '/facturacion-datos/save' => [[['_route' => 'app_facturacion_datos_save', '_controller' => 'App\\Controller\\FacturacionDatosController::save'], null, null, null, false, false, null]],
        '/faqs' => [[['_route' => 'app_faq', '_controller' => 'App\\Controller\\FaqController::index'], null, null, null, false, false, null]],
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
        '/users/list' => [[['_route' => 'app_users', '_controller' => 'App\\Controller\\UsersController::index'], null, null, null, false, false, null]],
        '/user/save' => [[['_route' => 'app_users_save', '_controller' => 'App\\Controller\\UsersController::save'], null, null, null, false, false, null]],
        '/users/get' => [[['_route' => 'app_users_get', '_controller' => 'App\\Controller\\UsersController::getusersBy'], null, null, null, false, false, null]],
        '/users/terms-and-conditions' => [[['_route' => 'app_users_terms_get', '_controller' => 'App\\Controller\\UsersController::usersTermsLIst'], null, null, null, false, false, null]],
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/client/edit/([^/]++)(*:28)'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:66)'
                    .'|wdt/([^/]++)(*:85)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:130)'
                            .'|router(*:144)'
                            .'|exception(?'
                                .'|(*:164)'
                                .'|\\.css(*:177)'
                            .')'
                        .')'
                        .'|(*:187)'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        28 => [[['_route' => 'app_client_edit', '_controller' => 'App\\Controller\\ClientsController::editClient'], ['client'], null, null, false, true, null]],
        66 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        85 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        130 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        144 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        164 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        177 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        187 => [
            [['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
