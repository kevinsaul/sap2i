<section class="section nos_partenaires content">
    <h2 class="bandeau_bluelight"><span><?php echo $bloc['titre_bloc']; ?></span></h2>
    <div class="bg_blanc shadow">
        <div class="container">
            <div id="slide-logos" class="row slide-logos">
                <?php if(empty(!$bloc['logos_selected'])): ?>
                    <?php $__currentLoopData = $bloc['logos_selected']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $logo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-6 col-md-2 col-lg-2 picture-company slide">
                            <div class="company">
                                <picture data-aos="fade-down" data-aos-offset="50" data-aos-delay="<?php echo $i*200; ?>" data-aos-duration="900" data-aos-easing="linear">
                                    <source srcset="<?php echo useResize($logo->companies_logo['url'], 200, null, true); ?>" type="image/webp">
                                    <source srcset="<?php echo useResize($logo->companies_logo['url'], 200); ?>" type="image/jpeg">
                                    <img src="<?php echo useResize($logo->companies_logo['url'], 200); ?>">
                                </picture>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /var/www/websites/web500/web/releases/20210908105430/public/themes/sap2i/views/modules/blocs/bloc_logos_liste.blade.php ENDPATH**/ ?>