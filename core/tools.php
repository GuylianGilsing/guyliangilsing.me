<?php
    /*
    This file contains core functionality for the whole system.
    */

    /**
     * Creates the following $_GET variables: $_GET['page'], $_GET['lang'].
     * @param array $languageConfig The language configuration file, can be found in: 'language/config.php'
     */
    function ConstructUrlVars($languageConfig)
    {
        if(isset($_GET['page']) == false)
        {
            $_GET['page'] = '/';
        }

        $rawUrl = $_GET['page'];

        // Make sure that the rawUrl has more parts.
        if($rawUrl != "/")
        {
            $_GET['page'] = "/";

            // Get the parts from the URL.
            $regex = '([^/](.[^/]*))';
            preg_match_all($regex, $rawUrl, $urlParts);
            $urlParts = $urlParts[0];

            $curPart = 1;

            // Check if the first url part is a language code.
            foreach($languageConfig as $lang => $options)
            {
                if($urlParts[0] == $lang)
                {
                    $_GET['lang'] = $lang;
                    $curPart += 1;
                    break;
                }
            }

            for($part = $curPart - 1; $part < count($urlParts); $part += 1)
            {
                if($_GET['page'] == '/')
                    $_GET['page'] .= $urlParts[$part];
                else
                    $_GET['page'] .= '/'.$urlParts[$part];
            }
        }

        // Check if $_GET['lang'] is set, if not set it to the default language value.
        if(isset($_GET['lang']) == false)
            $_GET['lang'] = $languageConfig['default'];
    }

    /**
     * Returns the server base e.g: http://example.com/
     * @return string Returns the HTTP protocol + domain name.
     */
    function ServerBase()
    {
        $protocol = 'http://';

        if(isset($_SERVER['HTTPS']) == true)
            $protocol = 'https://';

        $base = $_SERVER['HTTP_HOST'];

        return $protocol.$base;
    }

    /**
     * Only starts a session when no sessions are started.
     */
    function StartSession()
    {
        if(session_status() == PHP_SESSION_NONE)
            session_start();
    }

    /**
     * Redirects the user with the base of the existing URL.
     * NOTE: this function only redirects within the bounds of this website.
     */
    function RedirectRelative($url)
    {
        $redirect = ServerBase();

        if(isset($_GET['lang']))
            $redirect .= '/'.$_GET['lang'];

        $redirect .= $url;

        header('location: '.$redirect);
        exit;
    }

    function RelativeURL($url)
    {
        global $app_language_config;

        $output = ServerBase();

        if(isset($_GET['lang']) && $_GET['lang'] != $app_language_config['default'])
            $output .= '/'.$_GET['lang'];

        $output .= $url;

        return $output;
    }

    /**
     * Adds 'class="active"' to any needed element.
     * @param mixed $route A string or array containing the routes, eg:
     * ['/page1', '/page2'] OR '/page1'
     */
    function AddActiveClass($route)
    {
        $output = '';

        if(is_array($route) == false)
        {
            if($_GET['page'] == $route)
                $output = 'class="active"';
        }
        else
        {
            foreach($route as $r)
            {
                if($_GET['page'] == $r)
                    $output = 'class="active"';       
            }
        }

        if(isset($_POST['404']) == false)
            return $output;
    }

    /*
    
        --- CSRF protection ---
    
    */

    /**
     * Generates and registers a CSRF token.
     * @return string Returns the token that is registered.
     */
    function CSRF_GEN_TOKEN()
    {
        // Make sure that a session can be created.
        if(session_status() == PHP_SESSION_DISABLED)
            die("Please enable session functionality for CSRF protection.");

        // Start a session.
        if(session_status() == PHP_SESSION_NONE)
            session_start();

        // Generate a random token.
        $token = bin2hex(random_bytes(32));

        $_SESSION['validatetoken'] = $token;

        return $token;
    }

    /**
     * Generates a form input with the CSRF token applied to it.
     * @param string $token The generated token from the CRSF() function.
     */
    function CSRF_FIELD($token)
    {
        echo '<input type="hidden" id="form-csrf" name="csrf" value="'.$token.'">';
    }

    /**
     * Validates a given CSRF token.
     * @param string $token A generated token.
     * @return bool Returns true on a valid token, but false on a invalid token.
     */
    function CSRF_VALIDATE($token)
    {
        $validToken = false;

        // Make sure that a session can be created.
        if(session_status() == PHP_SESSION_DISABLED)
            die("Please enable session functionality for CSRF protection.");

        // Start a session.
        if(session_status() == PHP_SESSION_NONE)
            session_start();

        if(isset($_SESSION['validatetoken']))
            $validToken = hash_equals($_SESSION['validatetoken'], $token);

        if($validToken)
            unset($_SESSION['validatetoken']);
        
        return $validToken;
    }