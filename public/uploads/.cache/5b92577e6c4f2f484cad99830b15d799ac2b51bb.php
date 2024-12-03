<section class="section content">
    <div class="shadow">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-10 offset-md-1">
                    <?php if(!empty($news->news_title)): ?>
                        <h2><?php echo $news->news_title; ?></h2>
                    <?php else: ?>
                        <h2><?php echo $news->title; ?></h2>
                    <?php endif; ?>
                    <div class="content_news_mod">
                        <?php echo $news->content_desc_actu; ?>

                        <picture>
                            <source media="(max-width: 450px)" srcset="<?php echo e(useResize($news->img_actu['url'], 450, 300, true)); ?>" type="image/webp">
                            <source media="(max-width: 992px)" srcset="<?php echo e(useResize($news->img_actu['url'], 950, 500, true)); ?>" type="image/webp">
                            <source srcset="<?php echo e(useResize($news->img_actu['url'], 950, 500, true)); ?>" type="image/webp">
                            <source media="(max-width: 450px)" srcset="<?php echo e(useResize($news->img_actu['url'], 450, 300)); ?>" type="image/jpeg">
                            <source media="(max-width: 992px)" srcset="<?php echo e(useResize($news->img_actu['url'], 950, 500)); ?>" type="image/jpeg">
                            <source srcset="<?php echo e(useResize($news->img_actu['url'], 950, 500)); ?>" type="image/jpeg">
                            <img alt="<?php echo e($news->img_actu['alt']); ?>" loading="lazy">
                        </picture>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><?php /**PATH /var/www/websites/web500/web/releases/20210908105430/public/themes/sap2i/views/modules/content_actualite.blade.php ENDPATH**/ ?>