<?php
    $app_routes = [
        // Home route.
        '/' => [
            'view' => '/views/home.php',
            'title' => "Guylian Gilsing - Home",
            'content' => [
                'css' => [
                    '<link rel="stylesheet" href="http://cdn.guyliangilsing.me/frameworks/guylianize/skeleton/V1.1.0/guylianize.min.css" type="text/css">',
                    '<link rel="stylesheet" href="'.ServerBase().'/assets/css/global.css" type="text/css">',
                    '<link rel="stylesheet" href="'.ServerBase().'/assets/css/pages/home.css" type="text/css">'
                ],
                'js' => [
                    '<script> </script>'
                ]
            ]
        ],
        '/projects' => [
            'view' => '/views/projects.php',
            'title' => "Guylian Gilsing - Projects",
            'content' => [
                'css' => [
                    '<link rel="stylesheet" href="http://cdn.guyliangilsing.me/frameworks/guylianize/skeleton/V1.1.0/guylianize.min.css" type="text/css">',
                    '<link rel="stylesheet" href="'.ServerBase().'/assets/css/global.css" type="text/css">',
                    '<link rel="stylesheet" href="'.ServerBase().'/assets/css/pages/projects.css" type="text/css">'
                ],
                'js' => [
                    '<script> </script>'
                ]
            ]
        ],
        '/about' => [
            'view' => '/views/about.php',
            'title' => "Guylian Gilsing - About",
            'content' => [
                'css' => [
                    '<link rel="stylesheet" href="http://cdn.guyliangilsing.me/frameworks/guylianize/skeleton/V1.1.0/guylianize.min.css" type="text/css">',
                    '<link rel="stylesheet" href="'.ServerBase().'/assets/css/global.css" type="text/css">',
                    '<link rel="stylesheet" href="'.ServerBase().'/assets/css/pages/about.css" type="text/css">'
                ],
                'js' => [
                    '<script> </script>'
                ]
            ]
        ],
        '/contact' => [
            'view' => '/views/contact.php',
            'title' => "Guylian Gilsing - Contact",
            'content' => [
                'css' => [
                    '<link rel="stylesheet" href="http://cdn.guyliangilsing.me/frameworks/guylianize/skeleton/V1.1.0/guylianize.min.css" type="text/css">',
                    '<link rel="stylesheet" href="'.ServerBase().'/assets/css/global.css" type="text/css">'
                ],
                'js' => [
                    '<script> </script>'
                ]
            ]
        ],

        // Project details routes.
        '/project/cryptomania' => [
            'view' => '/views/projects/cryptomania.php',
            'title' => "Guylian Gilsing - Cryptomania",
            'content' => [
                'css' => [
                    '<link rel="stylesheet" href="http://cdn.guyliangilsing.me/frameworks/guylianize/skeleton/V1.1.0/guylianize.min.css" type="text/css">',
                    '<link rel="stylesheet" href="'.ServerBase().'/assets/fonts/fontawesome/css/all.min.css" type="text/css">',
                    '<link rel="stylesheet" href="'.ServerBase().'/assets/css/global.css" type="text/css">',
                    '<link rel="stylesheet" href="'.ServerBase().'/assets/css/pages/projects.css" type="text/css">'
                ],
                'js' => [
                    '<script> </script>'
                ]
            ]
        ],
        '/project/drakenvanger' => [
            'view' => '/views/projects/drakenvanger.php',
            'title' => "Guylian Gilsing - Drakenvanger",
            'content' => [
                'css' => [
                    '<link rel="stylesheet" href="http://cdn.guyliangilsing.me/frameworks/guylianize/skeleton/V1.1.0/guylianize.min.css" type="text/css">',
                    '<link rel="stylesheet" href="'.ServerBase().'/assets/fonts/fontawesome/css/all.min.css" type="text/css">',
                    '<link rel="stylesheet" href="'.ServerBase().'/assets/css/global.css" type="text/css">',
                    '<link rel="stylesheet" href="'.ServerBase().'/assets/css/pages/projects.css" type="text/css">'
                ],
                'js' => [
                    '<script> </script>'
                ]
            ]
        ],
        '/project/fluidify' => [
            'view' => '/views/projects/fluidify.php',
            'title' => "Guylian Gilsing - Fluidify",
            'content' => [
                'css' => [
                    '<link rel="stylesheet" href="http://cdn.guyliangilsing.me/frameworks/guylianize/skeleton/V1.1.0/guylianize.min.css" type="text/css">',
                    '<link rel="stylesheet" href="'.ServerBase().'/assets/fonts/fontawesome/css/all.min.css" type="text/css">',
                    '<link rel="stylesheet" href="'.ServerBase().'/assets/css/global.css" type="text/css">',
                    '<link rel="stylesheet" href="'.ServerBase().'/assets/css/pages/projects.css" type="text/css">'
                ],
                'js' => [
                    '<script> </script>'
                ]
            ]
        ],
        '/project/mt-unirepair' => [
            'view' => '/views/projects/mt-unirepair.php',
            'title' => "Guylian Gilsing - MT Unirepair",
            'content' => [
                'css' => [
                    '<link rel="stylesheet" href="http://cdn.guyliangilsing.me/frameworks/guylianize/skeleton/V1.1.0/guylianize.min.css" type="text/css">',
                    '<link rel="stylesheet" href="'.ServerBase().'/assets/fonts/fontawesome/css/all.min.css" type="text/css">',
                    '<link rel="stylesheet" href="'.ServerBase().'/assets/css/global.css" type="text/css">',
                    '<link rel="stylesheet" href="'.ServerBase().'/assets/css/pages/projects.css" type="text/css">'
                ],
                'js' => [
                    '<script> </script>'
                ]
            ]
        ],

        // Preview routes.
        '/preview/project/mt-unirepair' => [
            'view' => '/views/preview/mt-unirepair/index.php',
            'title' => "Guylian Gilsing - Preview - MT Unirepair",
            'content' => [
                'css' => [
                    '<link rel="stylesheet" href="http://cdn.influid.nl/fluidify/fluidify_latest.css" type="text/css">',
                    '<link rel="stylesheet" href="'.ServerBase().'/views/preview/mt-unirepair/css/style.css" type="text/css">'
                ],
                'js' => [
                    '<script> </script>'
                ]
            ]
        ],
    ];