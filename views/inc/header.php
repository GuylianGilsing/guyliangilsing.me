<?php
    $portfolioRoutes = [
        '/projects',
        '/project/cryptomania',
        '/project/drakenvanger',
        '/project/eftelinfo',
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
            <li <?php echo AddActiveClass(['/about']); ?>>
                <a href="<?php echo RelativeURL('/about'); ?>"><?php echo $_GET['translation']['about']; ?></a>
            </li>
            <li <?php echo AddActiveClass(['/contact']); ?>>
                <a href="<?php echo RelativeURL('/contact'); ?>"><?php echo $_GET['translation']['contact']; ?></a>
            </li>
            <ul class="dropdown">
                <p class="title">Language</p>
            </ul>
        </ul>
    </nav>
</header>