<?php
    $app_routes = [
        // Home route.
        '/' => [
            'view' => '/views/home.php',
            'title' => "Guylian Gilsing - Home",
            'content' => [
                'css' => [
                    '<link rel="stylesheet" href="https://cdn.guyliangilsing.me/frameworks/guylianize/skeleton/V1.1.0/guylianize.min.css" type="text/css">',
                    '<link rel="stylesheet" href="'.ServerBase().'/assets/fonts/fontawesome/css/all.min.css" type="text/css">',
                    '<link rel="stylesheet" href="'.ServerBase().'/assets/css/global.css" type="text/css">',
                    '<link rel="stylesheet" href="'.ServerBase().'/assets/css/pages/home.css" type="text/css">'
                ],
                'js' => [
                    '<script src="'.ServerBase().'/assets/js/global.js"></script>'
                ]
            ],
            'controller' => 'ContactFormController.php',
        ],
        '/projects' => [
            'view' => '/views/projects.php',
            'title' => "Guylian Gilsing - Projects",
            'content' => [
                'css' => [
                    '<link rel="stylesheet" href="https://cdn.guyliangilsing.me/frameworks/guylianize/skeleton/V1.1.0/guylianize.min.css" type="text/css">',
                    '<link rel="stylesheet" href="'.ServerBase().'/assets/fonts/fontawesome/css/all.min.css" type="text/css">',
                    '<link rel="stylesheet" href="'.ServerBase().'/assets/css/global.css" type="text/css">',
                    '<link rel="stylesheet" href="'.ServerBase().'/assets/css/pages/projects.css" type="text/css">'
                ],
                'js' => [
                    '<script src="'.ServerBase().'/assets/js/global.js"></script>'
                ]
            ]
        ],
        '/about' => [
            'view' => '/views/about.php',
            'title' => "Guylian Gilsing - About",
            'content' => [
                'css' => [
                    '<link rel="stylesheet" href="https://cdn.guyliangilsing.me/frameworks/guylianize/skeleton/V1.1.0/guylianize.min.css" type="text/css">',
                    '<link rel="stylesheet" href="'.ServerBase().'/assets/fonts/fontawesome/css/all.min.css" type="text/css">',
                    '<link rel="stylesheet" href="'.ServerBase().'/assets/css/global.css" type="text/css">',
                    '<link rel="stylesheet" href="'.ServerBase().'/assets/css/pages/about.css" type="text/css">'
                ],
                'js' => [
                    '<script src="'.ServerBase().'/assets/js/global.js"></script>'
                ]
            ]
        ],
        '/contact' => [
            'view' => '/views/contact.php',
            'title' => "Guylian Gilsing - Contact",
            'content' => [
                'css' => [
                    '<link rel="stylesheet" href="https://cdn.guyliangilsing.me/frameworks/guylianize/skeleton/V1.1.0/guylianize.min.css" type="text/css">',
                    '<link rel="stylesheet" href="'.ServerBase().'/assets/fonts/fontawesome/css/all.min.css" type="text/css">',
                    '<link rel="stylesheet" href="'.ServerBase().'/assets/css/global.css" type="text/css">'
                ],
                'js' => [
                    '<script src="'.ServerBase().'/assets/js/global.js"></script>'
                ]
            ],
            'controller' => 'ContactFormController.php',
        ],

        // Project details routes.
        '/project/cryptomania' => [
            'view' => '/views/projects/cryptomania.php',
            'title' => "Guylian Gilsing - Cryptomania",
            'content' => [
                'css' => [
                    '<link rel="stylesheet" href="https://cdn.guyliangilsing.me/frameworks/guylianize/skeleton/V1.1.0/guylianize.min.css" type="text/css">',
                    '<link rel="stylesheet" href="'.ServerBase().'/assets/fonts/fontawesome/css/all.min.css" type="text/css">',
                    '<link rel="stylesheet" href="'.ServerBase().'/assets/css/global.css" type="text/css">',
                    '<link rel="stylesheet" href="'.ServerBase().'/assets/css/pages/projects.css" type="text/css">'
                ],
                'js' => [
                    '<script src="'.ServerBase().'/assets/js/global.js"></script>'
                ]
            ]
        ],
        '/project/drakenvanger' => [
            'view' => '/views/projects/drakenvanger.php',
            'title' => "Guylian Gilsing - Drakenvanger",
            'content' => [
                'css' => [
                    '<link rel="stylesheet" href="https://cdn.guyliangilsing.me/frameworks/guylianize/skeleton/V1.1.0/guylianize.min.css" type="text/css">',
                    '<link rel="stylesheet" href="'.ServerBase().'/assets/fonts/fontawesome/css/all.min.css" type="text/css">',
                    '<link rel="stylesheet" href="'.ServerBase().'/assets/css/global.css" type="text/css">',
                    '<link rel="stylesheet" href="'.ServerBase().'/assets/css/pages/projects.css" type="text/css">'
                ],
                'js' => [
                    '<script src="'.ServerBase().'/assets/js/global.js"></script>'
                ]
            ]
        ],
        '/project/fluidify' => [
            'view' => '/views/projects/fluidify.php',
            'title' => "Guylian Gilsing - Fluidify",
            'content' => [
                'css' => [
                    '<link rel="stylesheet" href="https://cdn.guyliangilsing.me/frameworks/guylianize/skeleton/V1.1.0/guylianize.min.css" type="text/css">',
                    '<link rel="stylesheet" href="'.ServerBase().'/assets/fonts/fontawesome/css/all.min.css" type="text/css">',
                    '<link rel="stylesheet" href="'.ServerBase().'/assets/css/global.css" type="text/css">',
                    '<link rel="stylesheet" href="'.ServerBase().'/assets/css/pages/projects.css" type="text/css">'
                ],
                'js' => [
                    '<script src="'.ServerBase().'/assets/js/global.js"></script>'
                ]
            ]
        ],
        '/project/mt-unirepair' => [
            'view' => '/views/projects/mt-unirepair.php',
            'title' => "Guylian Gilsing - MT Unirepair",
            'content' => [
                'css' => [
                    '<link rel="stylesheet" href="https://cdn.guyliangilsing.me/frameworks/guylianize/skeleton/V1.1.0/guylianize.min.css" type="text/css">',
                    '<link rel="stylesheet" href="'.ServerBase().'/assets/fonts/fontawesome/css/all.min.css" type="text/css">',
                    '<link rel="stylesheet" href="'.ServerBase().'/assets/css/global.css" type="text/css">',
                    '<link rel="stylesheet" href="'.ServerBase().'/assets/css/pages/projects.css" type="text/css">'
                ],
                'js' => [
                    '<script src="'.ServerBase().'/assets/js/global.js"></script>'
                ]
            ]
        ],

        // Preview routes.
        '/preview/project/mt-unirepair' => [
            'view' => '/views/preview/mt-unirepair/index.php',
            'title' => "Guylian Gilsing - Preview - MT Unirepair",
            'content' => [
                'css' => [
                    '<link rel="stylesheet" href="'.ServerBase().'/views/preview/mt-unirepair/css/fluidify_latest.css" type="text/css">',
                    '<link rel="stylesheet" href="'.ServerBase().'/views/preview/mt-unirepair/css/style.css" type="text/css">'
                ],
                'js' => [
                    '<script> </script>'
                ]
            ]
        ],

        // Response routes.
        '/mail/success' => [
            'view' => '/views/response_pages/mailsuccess.php',
            'title' => "Guylian Gilsing - Email send",
            'content' => [
                'css' => [
                    '<link rel="stylesheet" href="https://cdn.guyliangilsing.me/frameworks/guylianize/skeleton/V1.1.0/guylianize.min.css" type="text/css">',
                    '<link rel="stylesheet" href="'.ServerBase().'/assets/css/global.css" type="text/css">',
                    '<link rel="stylesheet" href="'.ServerBase().'/assets/css/pages/mailsuccess.css" type="text/css">'
                ],
                'js' => [
                    '<script src="'.ServerBase().'/assets/js/global.js"></script>'
                ]
            ]
        ],
        '/mail/failed' => [
            'view' => '/views/response_pages/mailfailed.php',
            'title' => "Guylian Gilsing - Email send",
            'content' => [
                'css' => [
                    '<link rel="stylesheet" href="https://cdn.guyliangilsing.me/frameworks/guylianize/skeleton/V1.1.0/guylianize.min.css" type="text/css">',
                    '<link rel="stylesheet" href="'.ServerBase().'/assets/css/global.css" type="text/css">',
                    '<link rel="stylesheet" href="'.ServerBase().'/assets/css/pages/mailsuccess.css" type="text/css">'
                ],
                'js' => [
                    '<script src="'.ServerBase().'/assets/js/global.js"></script>'
                ]
            ]
        ],
    ];