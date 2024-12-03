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
                            <h2>Les actualités de SAP2I</h2>
                        </div>
                        <div class="col-12">
                            <?php if(empty(!$options['accroche'])): ?>
                                <?php echo $options['accroche']; ?>

                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row">
                        <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="actu" data-aos="fade-down" data-aos-offset="50" data-aos-delay="<?php echo $i*200; ?>" data-aos-duration="900" data-aos-easing="ease-in-out">
                                    <p class="date"><?php echo $new->published['date']; ?></p>
                                    <h3><?php echo $new->title; ?></h3>
                                    <p><?php echo $new->news_desc; ?></p>
                                    <a href="<?php echo $new->permalink; ?>" class="see_more">En savoir plus</a>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>
            </div>
        </section>
    </main>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('global.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/websites/web500/web/releases/20210908105430/public/themes/sap2i/views/archive-news.blade.php ENDPATH**/ ?>