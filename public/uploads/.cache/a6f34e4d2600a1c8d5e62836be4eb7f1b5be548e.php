<footer>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-3">
                <?php if(pll_current_language() == 'en'): ?>
                    <a href="<?php echo e(home_url().'/'.pll_current_language()); ?>" id="logo_footer">
                        <?php echo file_get_contents(get_template_directory().'/assets/images/logo-sap2i-wh.svg'); ?>

                    </a>
                <?php else: ?>
                    <a href="<?php echo e(home_url()); ?>" id="logo_footer">
                        <?php echo file_get_contents(get_template_directory().'/assets/images/logo-sap2i-wh.svg'); ?>

                    </a>
                <?php endif; ?>
            </div>
            <div class="col-12 col-md-3 offset-md-1">
                <address>
                    <p><svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="map-marker-alt" class="svg-inline--fa fa-map-marker-alt fa-w-12" role="img" viewBox="0 0 384 512"><path fill="#63c3db" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"/></svg><span> 
                    <?php echo $informations['adress']; ?></span></p>
                    <p><svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="phone" class="svg-inline--fa fa-phone fa-w-16" role="img" viewBox="0 0 512 512"><path fill="#63c3db" d="M493.4 24.6l-104-24c-11.3-2.6-22.9 3.3-27.5 13.9l-48 112c-4.2 9.8-1.4 21.3 6.9 28l60.6 49.6c-36 76.7-98.9 140.5-177.2 177.2l-49.6-60.6c-6.8-8.3-18.2-11.1-28-6.9l-112 48C3.9 366.5-2 378.1.6 389.4l24 104C27.1 504.2 36.7 512 48 512c256.1 0 464-207.5 464-464 0-11.2-7.7-20.9-18.6-23.4z"/></svg><span><?php echo $informations['phone']; ?></span></p>
                    <p><svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="envelope" class="svg-inline--fa fa-envelope fa-w-16" role="img" viewBox="0 0 512 512"><path fill="#63c3db" d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"/></svg><span><a href="mailto:<?php echo $informations['email']; ?>"><?php echo $informations['email']; ?></a></span></p>
                </address>
            </div>
            <div class="col-12 col-md-3">
                <?php echo e(wp_nav_menu(array(
                        'menu' => 'Pied de page',
                        'depth' => 1,
                        'menu_id' => 'liens_rapides',
                        'container' => 'ul',
                        'theme_location' => 'footer',
                    ))); ?>

                <a href="https://www.revelateur.fr" target="_blank" id="rev_link">
                    <?php echo file_get_contents(get_template_directory().'/assets/images/logo-revelateur-wh.svg'); ?>

                </a>
            </div>
            <div class="col-12 col-md-2">
                <picture id="datadock">
                    <source srcset="<?php echo useResize(get_template_directory_uri() . '/assets/images/datadock-ISO-9001-2.png', 200, null, true); ?>" type="image/webp">
                    <source srcset="<?php echo useResize(get_template_directory_uri() . '/assets/images/datadock-ISO-9001-2.png', 200); ?>" type="image/jpeg">
                    <img src="<?php echo useResize(get_template_directory_uri() . '/assets/images/datadock-ISO-9001-2.png', 200); ?>">
                </picture>
            </div>
        </div>
    </div>
</footer>
<?php /**PATH /var/www/websites/web500/web/releases/20210908105430/public/themes/sap2i/views/global/footer.blade.php ENDPATH**/ ?>