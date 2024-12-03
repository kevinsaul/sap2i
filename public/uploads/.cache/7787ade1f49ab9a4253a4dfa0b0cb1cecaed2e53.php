<?php $__env->startSection('content'); ?>

    <main id="home">
        <section class="sections slider_section">  
            <?php if(empty(!$page->home_slider)): ?>
                <div id="slider_home">
                    <?php $__currentLoopData = $page->home_slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item_slider" style="background-image: url('<?php echo useResize($slide['image']['url'], 1700, 7500); ?>');">
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
            <div id="title_plus_nav" data-aos="fade-left" data-aos-offset="50" data-aos-delay="0" data-aos-duration="900" data-aos-easing="linear">
                <div class="txt_item">
                    <h1><?php echo $page->title_slide; ?></h1>
                </div>
            </div>

            <?php if(empty(!$news)): ?>
                <div id="a_la_une" data-aos="fade-left" data-aos-offset="50" data-aos-delay="250" data-aos-duration="900" data-aos-easing="linear"> 
                    <div class="actu">
                        <p class="date"><?php echo $news->published['date']; ?></p>
                        <h3><?php echo $news->title; ?></h3>
                        <p><?php echo $news->news_desc; ?></p>
                        <?php if(pll_current_language() == 'en'): ?>
                            <a href="<?php echo $news->permalink; ?>" class="see_more">Learn more</a>
                        <?php else: ?>
                            <a href="<?php echo $news->permalink; ?>" class="see_more">En savoir plus</a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </section>

        <section class="section qui_sommes_nous content" id="qui_sommes_nous">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-5">
                        <div class="content" data-aos="fade-right" data-aos-offset="50" data-aos-delay="50" data-aos-duration="900" data-aos-easing="linear">
                            <h2><?php echo $page->qui_sommes_nous['title']; ?></h2>
                            <?php if(empty(!$page->qui_sommes_nous['bloc'])): ?>
                                <?php echo $page->qui_sommes_nous['bloc']; ?>

                            <?php endif; ?>
                            <span class="blue_line"></span> 
                        </div>
                    </div>
                    <div class="col-12 col-md-7 ">
                        <div id="img_mosaique">
                            <?php if(empty(!$page->qui_sommes_nous['img_top_left'])): ?>
                                <picture class="mosaiques mos_top_left" data-aos="fade-left" data-aos-offset="50" data-aos-delay="250" data-aos-duration="900" data-aos-easing="linear">
                                    <source srcset="<?php echo useResize($page->qui_sommes_nous['img_top_left']['url'], 400, 400, true); ?>" type="image/webp">
                                    <source srcset="<?php echo useResize($page->qui_sommes_nous['img_top_left']['url'], 400, 400); ?>" type="image/jpeg">
                                    <img src="<?php echo useResize($page->qui_sommes_nous['img_top_left']['url'], 400, 400); ?>">
                                </picture>
                            <?php endif; ?>
                            <?php if(empty(!$page->qui_sommes_nous['img_top_right'])): ?>
                                <picture class="mosaiques mos_top_right" data-aos="fade-left" data-aos-offset="50" data-aos-delay="250" data-aos-duration="900" data-aos-easing="linear">
                                    <source srcset="<?php echo useResize($page->qui_sommes_nous['img_top_right']['url'], 400, 400, true); ?>" type="image/webp">
                                    <source srcset="<?php echo useResize($page->qui_sommes_nous['img_top_right']['url'], 400, 400); ?>" type="image/jpeg">
                                    <img src="<?php echo useResize($page->qui_sommes_nous['img_top_right']['url'], 400, 400); ?>">
                                </picture>
                            <?php endif; ?>
                            <?php if(empty(!$page->qui_sommes_nous['img_bottom_left'])): ?>
                                <picture class="mosaiques mos_bottom_left" data-aos="fade-left" data-aos-offset="50" data-aos-delay="250" data-aos-duration="900" data-aos-easing="linear">
                                    <source srcset="<?php echo useResize($page->qui_sommes_nous['img_bottom_left']['url'], 400, 400, true); ?>" type="image/webp">
                                    <source srcset="<?php echo useResize($page->qui_sommes_nous['img_bottom_left']['url'], 400, 400); ?>" type="image/jpeg">
                                    <img src="<?php echo useResize($page->qui_sommes_nous['img_bottom_left']['url'], 400, 400); ?>">
                                </picture>
                            <?php endif; ?>
                            <?php if(empty(!$page->qui_sommes_nous['img_bottom_right'])): ?>
                                <picture class="mosaiques mos_bottom_right" data-aos="fade-left" data-aos-offset="50" data-aos-delay="250" data-aos-duration="900" data-aos-easing="linear">
                                    <source srcset="<?php echo useResize($page->qui_sommes_nous['img_bottom_right']['url'], 400, 400, true); ?>" type="image/webp">
                                    <source srcset="<?php echo useResize($page->qui_sommes_nous['img_bottom_right']['url'], 400, 400); ?>" type="image/jpeg">
                                    <img src="<?php echo useResize($page->qui_sommes_nous['img_bottom_right']['url'], 400, 400); ?>">
                                </picture>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section content certifications">
            <div class="row">
                <div class="col-12 bandeau_bluelight">
                    <?php if(pll_current_language() == 'en'): ?>
                        <h2>Our certifications</h2>
                    <?php else: ?>
                        <h2>Nos certifications</h2>
                    <?php endif; ?>
                </div>
            </div>
            <div class="bg_white">
                <div class="container">
                    <?php if(empty(!$page->nos_certifications)): ?>
                        <div class="row align_certif">
                            <?php $__currentLoopData = $page->nos_certifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=> $certificat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-6 col-md-2">
                                    <a href="<?php echo $certificat->company_website_url; ?>" target="_blank">
                                        <div class="company">
                                            <picture data-aos="fade-down" data-aos-offset="50" data-aos-delay="<?php echo $i*200; ?>" data-aos-duration="900" data-aos-easing="linear">
                                                <source srcset="<?php echo useResize($certificat->companies_logo['url'], 200, null, true); ?>" type="image/webp">
                                                <source srcset="<?php echo useResize($certificat->companies_logo['url'], 200); ?>" type="image/jpeg">
                                                <img src="<?php echo useResize($certificat->companies_logo['url'], 200); ?>">
                                            </picture>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('global.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/websites/web500/web/releases/20210908105430/public/themes/sap2i/views/front-page.blade.php ENDPATH**/ ?>