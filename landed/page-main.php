<?php
/**
 * Template Name: Главная
 */

get_header(); ?>


    <!-- Banner -->
    <section id="banner">
        <div class="content">
            <header>
                <h2><?php echo get_post_meta($post->ID, 'banner_header', true) ?></h2>
                <p><?php echo get_post_meta($post->ID, 'banner_subtitle', true) ?></p>
            </header>
            <span class="image"><img src="<?php echo get_post_meta($post->ID, 'banner_upload', true) ?>" alt=""/></span>
        </div>
        <a href="#one" class="goto-next scrolly">Next</a>
    </section>

    <!-- One -->
    <section id="one" class="spotlight style1 bottom">
        <span class="image fit main"><img src="<?php echo get_post_meta($post->ID, 'block_1_upload', true) ?>" alt=""/></span>
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="4u 12u$(medium)">
                        <header>
                            <h2><?php echo get_post_meta($post->ID, 'block_1_header', true) ?></h2>
                            <p><?php echo get_post_meta($post->ID, 'block_1_subtitle', true) ?></p>
                        </header>
                    </div>
                    <div class="4u 12u$(medium)">
                        <p><?php echo get_post_meta($post->ID, 'block_1_kol_1', true) ?></p>
                    </div>
                    <div class="4u$ 12u$(medium)">
                        <p><?php echo get_post_meta($post->ID, 'block_1_kol_2', true) ?></p>
                    </div>
                </div>
            </div>
        </div>
        <a href="#two" class="goto-next scrolly">Next</a>
    </section>

    <!-- Two -->
    <section id="two" class="spotlight style2 right">
        <span class="image fit main"><img src="<?php echo get_post_meta($post->ID, 'block_2_upload', true) ?>" alt=""/></span>
        <div class="content">
            <header>
                <h2><?php echo get_post_meta($post->ID, 'block_2_header', true) ?></h2>
                <p><?php echo get_post_meta($post->ID, 'block_2_subtitle', true) ?></p>
            </header>
            <p><?php echo get_post_meta($post->ID, 'block_2_text', true) ?></p>
            <?php if (get_post_meta($post->ID, 'block_2_button', true) != 'off') { ?>
                <ul class="actions">
                    <li>
                        <a href="#"
                           class="button"><?php echo get_post_meta($post->ID, 'block_2_button_header', true) ?>
                        </a>
                    </li>
                </ul>
            <?php } ?>
        </div>
        <a href="#three" class="goto-next scrolly">Next</a>
    </section>

    <!-- Three -->
    <section id="three" class="spotlight style3 left">
        <span class="image fit main bottom">
            <img src="<?php echo get_post_meta($post->ID, 'block_3_upload', true) ?>"
                 alt=""/>
        </span>
        <div class="content">
            <header>
                <h2><?php echo get_post_meta($post->ID, 'block_3_header', true) ?></h2>
                <p><?php echo get_post_meta($post->ID, 'block_3_subtitle', true) ?></p>
            </header>
            <p><?php echo get_post_meta($post->ID, 'block_3_text', true) ?></p>
            <?php if (get_post_meta($post->ID, 'block_3_button', true) != 'off') { ?>
                <ul class="actions">
                    <li>
                        <a href="#"
                           class="button"><?php echo get_post_meta($post->ID, 'block_2_button_header', true) ?>
                        </a>
                    </li>
                </ul>
            <?php } ?>
        </div>
        <a href="#four" class="goto-next scrolly">Next</a>
    </section>

    <!-- Four -->
    <section id="four" class="wrapper style1 special fade-up">
        <div class="container">
            <header class="major">
                <h2><?php echo get_post_meta($post->ID, 'block_4_header', true) ?></h2>
                <p><?php echo get_post_meta($post->ID, 'block_4_subtitle', true) ?></p>
            </header>
            <div class="box alt">
                <div class="row uniform">
                    <section class="4u 6u(medium) 12u$(xsmall)">
                        <span class="icon alt major fa-area-chart"></span>
                        <h3><?php echo get_post_meta($post->ID, 'block_4_header_1', true) ?></h3>
                        <p><?php echo get_post_meta($post->ID, 'block_4_subtitle_1', true) ?></p>
                    </section>
                    <section class="4u 6u$(medium) 12u$(xsmall)">
                        <span class="icon alt major fa-comment"></span>
                        <h3><?php echo get_post_meta($post->ID, 'block_4_header_2', true) ?></h3>
                        <p><?php echo get_post_meta($post->ID, 'block_4_subtitle_2', true) ?></p>
                    </section>
                    <section class="4u$ 6u(medium) 12u$(xsmall)">
                        <span class="icon alt major fa-flask"></span>
                        <h3><?php echo get_post_meta($post->ID, 'block_4_header_3', true) ?></h3>
                        <p><?php echo get_post_meta($post->ID, 'block_4_subtitle_3', true) ?></p>
                    </section>
                    <section class="4u 6u$(medium) 12u$(xsmall)">
                        <span class="icon alt major fa-paper-plane"></span>
                        <h3><?php echo get_post_meta($post->ID, 'block_4_header_4', true) ?></h3>
                        <p><?php echo get_post_meta($post->ID, 'block_4_subtitle_4', true) ?></p>
                    </section>
                    <section class="4u 6u(medium) 12u$(xsmall)">
                        <span class="icon alt major fa-file"></span>
                        <h3><?php echo get_post_meta($post->ID, 'block_4_header_5', true) ?></h3>
                        <p><?php echo get_post_meta($post->ID, 'block_4_subtitle_5', true) ?></p>
                    </section>
                    <section class="4u$ 6u$(medium) 12u$(xsmall)">
                        <span class="icon alt major fa-lock"></span>
                        <h3><?php echo get_post_meta($post->ID, 'block_4_header_6', true) ?></h3>
                        <p><?php echo get_post_meta($post->ID, 'block_4_subtitle_6', true) ?></p>
                    </section>
                </div>
            </div>
            <?php if (get_post_meta($post->ID, 'block_4_button', true) != 'off') { ?>
                <footer class="major">
                    <ul class="actions">
                        <li><a href="#"
                               class="button"><?php echo get_post_meta($post->ID, 'block_4_button_header', true) ?></a>
                        </li>
                    </ul>
                </footer>
            <?php } ?>
        </div>
    </section>

    <!-- Five -->
    <section id="five" class="wrapper style2 special fade">
        <div class="container">
            <header>
                <h2><?php echo get_post_meta($post->ID, 'block_5_header', true) ?></h2>
                <p><?php echo get_post_meta($post->ID, 'block_5_subtitle', true) ?></p>
            </header>
            <div class="container 50%">
                <?php echo do_shortcode(get_post_meta($post->ID, 'block_5_short', true)); ?>
            </div>
        </div>
    </section>



<?php
get_footer();
