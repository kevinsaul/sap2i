<section class="section content">
    <div class="bg_<?php echo $bloc['background_color']; ?> shadow">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-5 center_vertical">
                    <?php echo $bloc['content_left']; ?>

                </div>
                <div class="col-12 col-md-6 offset-md-1">
                    <?php if(empty(!$bloc['img_right'])): ?>
                        <picture data-aos="fade-down" data-aos-offset="50" data-aos-delay="100" data-aos-duration="900" data-aos-easing="linear">
                            <source srcset="<?php echo useResize($bloc['img_right']['url'], 500, 500, true); ?>" type="image/webp">
                            <source srcset="<?php echo useResize($bloc['img_right']['url'], 500, 500); ?>" type="image/jpeg">
                            <img src="<?php echo useResize($bloc['img_right']['url'], 500, 500); ?>">
                        </picture>
                    <?php endif; ?>
                </div>
            </div>
           </div>
    </div>
</section><?php /**PATH /var/www/websites/web500/web/releases/20210908105430/public/themes/sap2i/views/modules/blocs/content_img_right.blade.php ENDPATH**/ ?>