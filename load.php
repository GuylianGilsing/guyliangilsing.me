<?php
    // Load core files and classes.

    // Lanuage directory.
    require_once(dirname(__FILE__).'/language/config.php');

    // Core directory.
    require_once(dirname(__FILE__).'/core/tools.php');
    require_once(dirname(__FILE__).'/core/database.php');
    require_once(dirname(__FILE__).'/core/contentLoader.php');

    // Create all of the URL variables.
    ConstructUrlVars($app_language_config);

    // Require the translations.
    require_once($app_language_config[$_GET['lang']]['file']);

    // Create important objects.
    $contentLoader = new ContentLoader();

    
    // Load in the router.
    require_once(dirname(__FILE__).'/router.php');

    // Match the route parameters to the current $_GET['page'] value.

    if(isset($app_routes[$_GET['page']]))
    {
        $route = $app_routes[$_GET['page']];

        // Load the controller.
        if(isset($route['controller']))
            require_once(dirname(__FILE__).'/controllers/'.$route['controller']);

        // Load the page title.
        if(isset($route['title']))
            $contentLoader->registerPageTitle($route['title']);

        // Load all of the content.
        if(isset($route['content']['meta']))
            $contentLoader->registerMeta($route['content']['meta']);

        if(isset($route['content']['css']))
            $contentLoader->registerCss($route['content']['css']);

        if(isset($route['content']['js']))
            $contentLoader->registerJavascript($route['content']['js']);

        // Load the view.
        if(isset($route['view']))
            $contentLoader->registerPage($route['view']);
    }
    else
    {
        $_POST['404'] = true;

        // Show the 404 page.
        $contentLoader->registerCss([
            '<link rel="stylesheet" href="http://cdn.guyliangilsing.me/frameworks/guylianize/skeleton/V1.1.0/guylianize.min.css">',
            '<link rel="stylesheet" href="'.ServerBase().'/assets/css/global.css">',
        ]);

        $contentLoader->registerPage('views/404.php');
        $contentLoader->registerJavascript('<script> </script>');
    }