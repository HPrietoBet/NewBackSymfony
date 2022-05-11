<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    'app_campanias' => [[], ['_controller' => 'App\\Controller\\CampaniasController::index'], [], [['text', '/campanias']], [], [], []],
    'app_campanias_get' => [[], ['_controller' => 'App\\Controller\\CampaniasController::getCampaigns'], [], [['text', '/campanias/get']], [], [], []],
    'app_clients' => [[], ['_controller' => 'App\\Controller\\ClientsController::index'], [], [['text', '/clients']], [], [], []],
    'app_clients_upload_logo' => [[], ['_controller' => 'App\\Controller\\ClientsController::uploadLogo'], [], [['text', '/clients/upload']], [], [], []],
    'app_clients_save' => [[], ['_controller' => 'App\\Controller\\ClientsController::save'], [], [['text', '/client/save']], [], [], []],
    'app_clients_comment_delete' => [[], ['_controller' => 'App\\Controller\\ClientsController::deleteCommentClient'], [], [['text', '/client/comment/delete']], [], [], []],
    'app_client_edit' => [['client'], ['_controller' => 'App\\Controller\\ClientsController::editClient'], [], [['variable', '/', '[^/]++', 'client', true], ['text', '/client/edit']], [], [], []],
    'app_client_new' => [[], ['_controller' => 'App\\Controller\\ClientsController::newClient'], [], [['text', '/client/new']], [], [], []],
    'app_client_comment_add' => [[], ['_controller' => 'App\\Controller\\ClientsController::addComment'], [], [['text', '/client/comment/add']], [], [], []],
    'app_client_invoice_save' => [[], ['_controller' => 'App\\Controller\\ClientsController::saveInvoice'], [], [['text', '/client/invoice/save']], [], [], []],
    'app_client_deal_save' => [[], ['_controller' => 'App\\Controller\\ClientsController::saveDeal'], [], [['text', '/client/deal/save']], [], [], []],
    'app_facturacion_datos' => [[], ['_controller' => 'App\\Controller\\FacturacionDatosController::index'], [], [['text', '/facturacion-datos']], [], [], []],
    'app_facturacion_datos_save' => [[], ['_controller' => 'App\\Controller\\FacturacionDatosController::save'], [], [['text', '/facturacion-datos/save']], [], [], []],
    'app_home' => [[], ['_controller' => 'App\\Controller\\HomeController::index'], [], [['text', '/home']], [], [], []],
    'app_home_charts' => [[], ['_controller' => 'App\\Controller\\HomeController::charts'], [], [['text', '/home/charts']], [], [], []],
    'app_login' => [[], ['_controller' => 'App\\Controller\\SecurityController::login'], [], [['text', '/login']], [], [], []],
    'app_logout' => [[], ['_controller' => 'App\\Controller\\SecurityController::logout'], [], [['text', '/logout']], [], [], []],
    'app_super_users' => [[], ['_controller' => 'App\\Controller\\SuperUsersController::index'], [], [['text', '/users/admin']], [], [], []],
    'app_super_users_save' => [[], ['_controller' => 'App\\Controller\\SuperUsersController::save'], [], [['text', '/user/admin/save']], [], [], []],
    'app_users_bookies' => [[], ['_controller' => 'App\\Controller\\UsersBookiesController::index'], [], [['text', '/users/bookies']], [], [], []],
    'app_users_bookies_save' => [[], ['_controller' => 'App\\Controller\\UsersBookiesController::save'], [], [['text', '/user/bookie/save']], [], [], []],
    'app_users_bookies_delete' => [[], ['_controller' => 'App\\Controller\\UsersBookiesController::delete'], [], [['text', '/user/bookie/delete']], [], [], []],
    'app_users' => [[], ['_controller' => 'App\\Controller\\UsersController::index'], [], [['text', '/users/list']], [], [], []],
    'app_users_save' => [[], ['_controller' => 'App\\Controller\\UsersController::save'], [], [['text', '/user/save']], [], [], []],
    'app_users_get' => [[], ['_controller' => 'App\\Controller\\UsersController::getusersBy'], [], [['text', '/users/get']], [], [], []],
    'app_users_terms_get' => [[], ['_controller' => 'App\\Controller\\UsersController::usersTermsLIst'], [], [['text', '/users/terms-and-conditions']], [], [], []],
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '\\d+', 'code', true], ['text', '/_error']], [], [], []],
    '_wdt' => [['token'], ['_controller' => 'web_profiler.controller.profiler::toolbarAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_wdt']], [], [], []],
    '_profiler_home' => [[], ['_controller' => 'web_profiler.controller.profiler::homeAction'], [], [['text', '/_profiler/']], [], [], []],
    '_profiler_search' => [[], ['_controller' => 'web_profiler.controller.profiler::searchAction'], [], [['text', '/_profiler/search']], [], [], []],
    '_profiler_search_bar' => [[], ['_controller' => 'web_profiler.controller.profiler::searchBarAction'], [], [['text', '/_profiler/search_bar']], [], [], []],
    '_profiler_phpinfo' => [[], ['_controller' => 'web_profiler.controller.profiler::phpinfoAction'], [], [['text', '/_profiler/phpinfo']], [], [], []],
    '_profiler_search_results' => [['token'], ['_controller' => 'web_profiler.controller.profiler::searchResultsAction'], [], [['text', '/search/results'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_open_file' => [[], ['_controller' => 'web_profiler.controller.profiler::openAction'], [], [['text', '/_profiler/open']], [], [], []],
    '_profiler' => [['token'], ['_controller' => 'web_profiler.controller.profiler::panelAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_router' => [['token'], ['_controller' => 'web_profiler.controller.router::panelAction'], [], [['text', '/router'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_exception' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::body'], [], [['text', '/exception'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_exception_css' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::stylesheet'], [], [['text', '/exception.css'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    'home' => [[], ['_controller' => 'App\\Controller\\HomeController::index'], [], [['text', '/home']], [], [], []],
    'login' => [[], ['_controller' => 'App\\Controller\\SecurityController::index'], [], [['text', '/login']], [], [], []],
];
