<section class="section nos_partenaires content">
    <h2 class="bandeau_bluelight"><span><?php echo $bloc['titre_bloc_all']; ?></span></h2>
    <div class="bg_blanc shadow">
        <div class="container">
            <div class="col">
                <?php if(empty(!$bloc['logos_selected_all'])): ?>
                    <?php $__currentLoopData = $bloc['logos_selected_all']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $logo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-12 col-md-2 col-lg-3 col-sm-3 picture-company slide">
                            <?php $__currentLoopData = $logo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $logos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="company">
                                    <div>
                                        <picture data-aos-offset="50" data-aos-delay="<?php echo $i*200; ?>" data-aos-duration="900" data-aos-easing="linear">
                                            <source srcset="<?php echo useResize($logos->companies_logo['url'], 400, null, true); ?>" type="image/webp">
                                            <source srcset="<?php echo useResize($logos->companies_logo['url'], 400); ?>" type="image/jpeg">
                                            <img src="<?php echo useResize($logos->companies_logo['url'], 400); ?>">
                                        </picture>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /var/www/websites/web500/web/releases/20210908105430/public/themes/sap2i/views/modules/blocs/bloc_logos_liste_all.blade.php ENDPATH**/ ?>