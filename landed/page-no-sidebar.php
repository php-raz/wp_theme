<?php
/*
 * Template name: Без сайдбара
 * */
get_header(); ?>


    <div id="main" class="wrapper style1">
        <div class="container">
            <header class="major">
                <h2><?php the_title(); ?></h2>
            </header>

            <!-- Content -->
            <?php if (have_posts()) : while (have_posts()) :
                the_post(); ?>

                <section id="content">

                    <?php the_post_thumbnail(array(1214, 405)) ?>
                    <?php the_content(); ?>

                </section>


            <?php endwhile;
            else : ?>

            <?php endif;
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
            ?>

        </div>
    </div>

<?php
get_footer();
