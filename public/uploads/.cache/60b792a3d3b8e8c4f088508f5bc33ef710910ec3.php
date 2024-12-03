<?php $__env->startSection('content'); ?>

    <main id="inter" class="<?php echo (empty($options['banner']['url']) ? 'no_banner' : ''); ?>">
        
        <?php if(empty(!$options['banner'])): ?>
            <div id="banner" style="background-image: url(<?php echo $options['banner']['url']; ?>);"></div>
        <?php endif; ?>
        
        <section class="section content">
            <div class="bg_blanc shadow">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h3>Nos partenaires</h3>
                        </div>
                        <div class="col-12">
                            <?php if(empty(!$options['accroche'])): ?>
                                <?php echo $options['accroche']; ?>

                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row">
                        <!-- code -->
                        <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-6 col-md-4 col-lg-2 picture-company">
                                <a class="company" href="<?php echo $company->company_website_url; ?>" target="_blank">
                                    <picture data-aos="fade-down" data-aos-offset="50" data-aos-delay="<?php echo $i*200; ?>" data-aos-duration="900" data-aos-easing="linear">
                                        <source srcset="<?php echo useResize($company->companies_logo['url'], 200, null, true); ?>" type="image/webp">
                                        <source srcset="<?php echo useResize($company->companies_logo['url'], 200); ?>" type="image/jpeg">
                                        <img src="<?php echo useResize($company->companies_logo['url'], 200); ?>">
                                    </picture>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>
            </div>
        </section>
    </main>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('global.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/websites/web500/web/releases/20210908105430/public/themes/sap2i/views/archive-companies.blade.php ENDPATH**/ ?>