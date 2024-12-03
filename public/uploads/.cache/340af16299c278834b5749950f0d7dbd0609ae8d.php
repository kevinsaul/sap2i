

<?php $__env->startSection('content'); ?>

    <main id="inter" class="<?php echo (empty($page->banner['url']) ? 'no_banner' : ''); ?>">
        
        <?php if(empty(!$page->banner)): ?>
            <div id="banner" style="background-image: url(<?php echo useResize($page->banner['url'], 1700, 7500); ?>);"></div>
        <?php endif; ?>

        <?php echo $__env->make('views.modules.blocs.blocs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('global.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/websites/web500/web/releases/20210908105430/public/themes/sap2i/views/page.blade.php ENDPATH**/ ?>