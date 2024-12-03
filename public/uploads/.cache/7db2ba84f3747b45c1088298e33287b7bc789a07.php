<header>
    <nav>
        <div id="open_mobile">
            <span></span>
        </div>
        <a href="<?php echo e(pll_home_url()); ?>" class="logo"><img src="<?php echo get_template_directory_uri() . '/assets/images/logo-sap2i.png'; ?>"></a>
        <div id="navbar" class="menu">
            <div id="nav_top">
                
                <?php if(empty(!$languages)): ?>
                    <ul id="langues">
                        <?php echo $languages; ?>

                    </ul>
                <?php endif; ?>
                
                <?php if(empty(!$social_networks['linkedin_link'])): ?>
                    <ul id="reseaux_sociaux">
                        <li id="linkedin"><a href="<?php echo $social_networks['linkedin_link']; ?>" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="linkedin-in" class="svg-inline--fa fa-linkedin-in fa-w-14" role="img" viewBox="0 0 448 512"><path fill="#13225b" d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"/></svg></a></li>
                    </ul>
                <?php endif; ?>
            </div>
            <?php echo e(wp_nav_menu(array(
                    'menu' => 'Menu Principal',
                    'depth' => 3,
                    'menu_id' => 'primary_menu',
                    'container' => 'ul',
                    'theme_location' => 'primary',
                ))); ?>

        </div>
    </nav>
</header>
<?php /**PATH /var/www/websites/web500/web/releases/20210908105430/public/themes/sap2i/views/global/navigation.blade.php ENDPATH**/ ?>