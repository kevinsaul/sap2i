<?php $__env->startSection('content'); ?>

    <main id="inter" class="no_banner">
        <?php echo $__env->make('views.modules.content_actualite', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <section>
            <div class="container">
                <?php if(pll_current_language() == 'en'): ?>
                    <a href="<?php echo e(get_post_type_archive_link('news')); ?>" class="big_btn">Back to news</a>
                <?php else: ?>
                    <a href="<?php echo e(get_post_type_archive_link('news')); ?>" class="big_btn">Retour aux actualités</a>
                <?php endif; ?>
            </div>
        </section>
        
    </main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('global.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/websites/web500/web/releases/20210908105430/public/themes/sap2i/views/single-news.blade.php ENDPATH**/ ?>