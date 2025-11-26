<?php

declare(strict_types=1);

$config = array_merge(config('translation-manager.route'), ['namespace' => 'Barryvdh\TranslationManager']);
Route::group($config, function($router)
{
    $router->get('/{namespace?}', 'Controller@getNameSpace');
    $router->get('/{namespace?}/{groupKey?}', 'Controller@getView')->where('groupKey', '.*');

    $router->get('/{groupKey?}', 'Controller@getIndex')->where('groupKey', '.*');
    $router->post('/add/{groupKey}', 'Controller@postAdd')->where('groupKey', '.*');
    $router->post('/edit/{namespace?}/{groupKey}', 'Controller@postEdit')->where('groupKey', '.*');
    $router->post('/groups/add', 'Controller@postAddGroup');
    $router->post('/delete/{namespace?}/{groupKey}/{translationKey}', 'Controller@postDelete')->where('groupKey', '.*');
    $router->post('/import', 'Controller@postImport');
    $router->post('/find', 'Controller@postFind');
    $router->post('/locales/add', 'Controller@postAddLocale');
    $router->post('/locales/remove', 'Controller@postRemoveLocale');
    $router->post('/publish/{namespace?}/{groupKey?}', 'Controller@postPublish')->where('groupKey', '.*');
    $router->post('/translate-missing', 'Controller@postTranslateMissing');
});
