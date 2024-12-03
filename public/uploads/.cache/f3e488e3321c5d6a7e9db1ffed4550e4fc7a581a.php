<section class="section nos_partenaires content">
    <?php if(empty(!$bloc['titre_bloc_categories'])): ?>
        <h2 class="bandeau_bluelight"><span><?php echo $bloc['titre_bloc_categories']; ?></span></h2>
    <?php endif; ?>
    <div class="bg_blanc shadow">
        <div class="container">
            <div class="row">
                <?php if(empty(!$bloc['categories'])): ?>
                    <?php $__currentLoopData = $bloc['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-12 col-sm-6 col-md-3 md_category">
                        <h3><?php echo $categorie['nom_cat']; ?></h3>
                            <div class="col-12 col-sm-6 col-md-10">
                                <?php if(empty(!$categorie['logos_selected_par_cat'])): ?>
                                    <?php $__currentLoopData = $categorie['logos_selected_par_cat']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $logo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="company">
                                            <picture data-aos="fade-down" data-aos-offset="50" data-aos-delay="<?php echo $i*200; ?>" data-aos-duration="900" data-aos-easing="linear">
                                                <source srcset="<?php echo useResize($logo->companies_logo['url'], 200, null, true); ?>" type="image/webp">
                                                <source srcset="<?php echo useResize($logo->companies_logo['url'], 200); ?>" type="image/jpeg">
                                                <img src="<?php echo useResize($logo->companies_logo['url'], 200); ?>">
                                            </picture>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /var/www/websites/web500/web/releases/20210908105430/public/themes/sap2i/views/modules/blocs/bloc_logos_liste_categories.blade.php ENDPATH**/ ?>