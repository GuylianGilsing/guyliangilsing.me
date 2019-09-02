<?php
    class ContentLoader
    {
        private $content = [
            'page' => [],
            'title' => "Guylian Gilsing",
            'meta' => [],
            'css' => [],
            'js' => [],
            'loadscripts' => [],
        ];
        
        /**
         * Registers the page.
         * @param mixed $page Either an include path for backend loading, or a json string for page parsing.
         */
        public function registerPage($page)
        {
            $this->content['page'] = $page;
        }

        /**
         * Displays the page.
         */
        public function renderPage()
        {
            if(empty($this->content['page']) == false)
            {
                if(is_file(dirname(__FILE__).'/../'.$this->content['page']) == true)
                    require_once(dirname(__FILE__).'/../'.$this->content['page']);
            }
        }

        /**
         * Registers the page title.
         * @param string $title A string that will show up as the <title>.
         */
        public function registerPageTitle($title)
        {
            if(empty($title) == false)
                $this->content['title'] = $title;
        }

        /**
         * Displays the page <title>.
         */
        public function renderPageTitle()
        {
            echo '<title>'.$this->content['title'].'</title>';
        }

        /**
         * Registers CSS tags.
         * @param array $css An array with HTML <link> or <style> tags.
         */
        public function registerCss($css)
        {
            // Make sure that there are entries in the $css function parameter.
            if(is_array($css) && count($css) > 0)
            {
                // Insert the tags into the appropiate content array.
                foreach($css as $tag)
                {
                    $this->content['css'][] = $tag;
                }
            }
            else if(empty($css) == false)
            {
                $this->content['css'][] = $css;
            }
        }

        /**
         * Shows the registered CSS tags.
         */
        public function renderCss()
        {
            $output = '';

            // Make sure there are scripts registered.
            if(count($this->content['css']) > 0)
            {
                // Loop over the scripts and put them in the $output variable.
                foreach($this->content['css'] as $script)
                {
                    // Add the script.
                    $output .= $script;
                }
            }

            // Show the scripts.
            echo $output;
        }

        /**
         * Registers Javascript tags.
         * @param array $javascript An array with HTML <script> tags.
         */
        public function registerJavascript($javascript)
        {
            // Make sure that there are entries in the $css function parameter.
            if(is_array($javascript) && count($javascript) > 0)
            {
                // Insert the tags into the appropiate content array.
                foreach($javascript as $tag)
                {
                    $this->content['js'][] = $tag;
                }
            }
            else if(empty($javascript) == false)
            {
                $this->content['js'][] = $javascript;
            }
        }

        /**
         * Shows the registered Javascript tags.
         */
        public function renderJavascript()
        {
            $output = '';

            // Make sure there are scripts registered.
            if(count($this->content['js']) > 0)
            {
                // Loop over the scripts and put them in the $output variable.
                foreach($this->content['js'] as $script)
                {
                    // Add the script.
                    $output .= $script;
                }
            }

            // Show the scripts.
            echo $output;
        }

        /**
         * Registers meta tags.
         * @param array $meta An array with HTML <meta> / <link> tags.
         */
        public function registerMeta($meta)
        {
            // Make sure that there are entries in the $css function parameter.
            if(is_array($meta) == true && count($meta) > 0)
            {
                // Insert the tags into the appropiate content array.
                foreach($meta as $tag)
                {
                    $this->content['meta'][] = $tag;
                }
            }
            else if(empty($meta) == false)
            {
                $this->content['meta'][] = $meta;
            }
        }

        /**
         * Shows the registered meta tags.
         */
        public function renderMeta()
        {
            $output = '';

            // Make sure there are scripts registered.
            if(count($this->content['meta']) > 0)
            {
                // Loop over the scripts and put them in the $output variable.
                foreach($this->content['meta'] as $script)
                {
                    // Add the script.
                    $output .= $script;
                }
            }

            // Show the scripts.
            echo $output;
        }

        /**
         * Registers a load.php script that gets executed when all of the normal scripts and styles are loaded.
         * This function can be used to load in modules.
         */
        public function RegisterLoadScript($path)
        {
            if($path != "")
            {
                $this->content['loadscripts'][] = $path;
            }
        }

        /**
         * Renders all of the registered load scripts.
         */
        public function ActivateLoadScripts()
        {
            // Make sure there are scripts registered.
            if(count($this->content['loadscripts']) > 0)
            {
                // Loop over the scripts and put them in the $output variable.
                foreach($this->content['loadscripts'] as $script)
                {
                    // Load the script.
                    require_once($script);
                }
            }   
        }
    }