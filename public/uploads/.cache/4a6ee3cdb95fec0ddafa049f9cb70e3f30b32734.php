<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="<?php echo e(get_template_directory_uri()); ?>/assets/images/favicon.png"/>

    <?php if(!is_plugin_active('wordpress-seo/wp-seo.php')): ?>
        <title><?php echo e(wp_title("|", true, "right")); ?></title>
    <?php endif; ?>

    <?php echo e(wp_head()); ?>

</head>
    <body>

        <?php echo $__env->make('global.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->yieldContent('content'); ?>

        <?php echo $__env->make('global.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php if ($__env->exists('global.stats')) echo $__env->make('global.stats', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo e(wp_footer()); ?>


    </body>
</html>
<?php /**PATH /var/www/websites/web500/web/releases/20210908105430/public/themes/sap2i/views/global/base.blade.php ENDPATH**/ ?>