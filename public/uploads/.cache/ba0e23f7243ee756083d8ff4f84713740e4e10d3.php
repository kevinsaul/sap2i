<?php $__env->startSection('content'); ?>

    <main id="inter" class="<?php echo (empty($page->banner_contact['url']) ? 'no_banner' : ''); ?>">
        
        <?php if(empty(!$page->banner_contact)): ?>
            <div id="banner" style="background-image: url(<?php echo useResize($page->banner_contact['url'], 1700, 750); ?>);"></div>
        <?php endif; ?>


        <section class="section content">
            <div class="bg_blanc shadow">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-10 offset-md-1">
                            <?php if(pll_current_language() == 'en'): ?>
                                <h3>Contact Us</h3>
                            <?php else: ?>
                                <h3>Contactez-nous</h3>
                            <?php endif; ?>
                            <?php if(empty(!$page->accroche_contact)): ?>
                                <?php echo $page->accroche_contact; ?>

                            <?php endif; ?>
                            <br>

                            <?php if(empty(!$contact_form)): ?>
                                <?php echo $contact_form; ?>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('global.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/websites/web500/web/releases/20210908105430/public/themes/sap2i/views/tpl-contact.blade.php ENDPATH**/ ?>