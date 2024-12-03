<?php if(empty(!$blocs)): ?>
    <?php $__currentLoopData = $blocs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $bloc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(empty(!$bloc['acf_fc_layout'])): ?>
            <?php echo $__env->make('views.modules.blocs.'.$bloc['acf_fc_layout'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
   
<?php /**PATH /var/www/websites/web500/web/releases/20210908105430/public/themes/sap2i/views/modules/blocs/blocs.blade.php ENDPATH**/ ?>