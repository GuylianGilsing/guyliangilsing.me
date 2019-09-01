<?php
    $portfolioRoutes = [
        '/projects',
        '/project/cryptomania',
        '/project/drakenvanger',
        '/project/fluidify',
        '/project/mt-unirepair',
    ];
?>
<header class="mainnav">
    <nav>
        <a href="<?php echo RelativeURL('/'); ?>" class="logo">
            <span class="txt-color-purple">G</span>uylian <span class="txt-color-purple">G</span>ilsing
        </a>
        <ul>
            <li <?php echo AddActiveClass(['/']); ?>>
                <a href="<?php echo RelativeURL('/'); ?>"><?php echo $_GET['translation']['home']; ?></a>
            </li>
            <li <?php echo AddActiveClass($portfolioRoutes); ?>>
                <a href="<?php echo RelativeURL('/projects'); ?>"><?php echo $_GET['translation']['projects']; ?></a>
            </li>
            <!-- <li <?php //echo AddActiveClass(['/about']); ?>>
                <a href="<?php //echo RelativeURL('/about'); ?>"><?php //echo $_GET['translation']['about']; ?></a>
            </li> -->
            <li <?php echo AddActiveClass(['/contact']); ?>>
                <a href="<?php echo RelativeURL('/contact'); ?>"><?php echo $_GET['translation']['contact']; ?></a>
            </li>
            <li class="dropdown">
                <p class="title"><?php echo $_GET['translation']['language']; ?><i class="icon-down fas fa-caret-down"></i></p>
                <ul class="dropdown-items">
                    <?php
                        foreach($_GET['languages'] as $language)
                        {
                            $active = "";

                            if($language['short'] == $_GET['lang'])
                                $active = ' class="active"';

                            if($language['short'] != $_GET['default_lang'])
                                echo '<li'.$active.'>'.'<a href="'.ServerBase().'/'.$language['short'].$_GET['page'].'">'.$language['title'].'</a>'.'</li>';
                            else
                                echo '<li'.$active.'>'.'<a href="'.ServerBase().$_GET['page'].'">'.$language['title'].'</a>'.'</li>';
                        }
                    ?>
                </ul>
            </li>
        </ul>
        <i class="mobile-icon fas fa-bars"></i>
    </nav>
</header>