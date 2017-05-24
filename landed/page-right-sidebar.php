<?php
/*
 * Template name: Сайдбар справа
 * */
get_header(); ?>

    <div id="main" class="wrapper style1">
        <div class="container">

            <header class="major">
                <h2><?php the_title(); ?></h2>
            </header>

            <!-- Content -->
            <div class="row 150%">
                <div class="8u 12u$(medium)">

                    <?php if (have_posts()) : while (have_posts()) :
                        the_post(); ?>

                        <section id="content">

                            <?php the_post_thumbnail(array(788, 263)) ?>
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

                <div class="4u$ 12u$(medium)">

                    <!-- Sidebar -->
                    <section id="sidebar">
                        <?php get_sidebar(); ?>
                    </section>

                </div>
            </div>
        </div>
    </div>


<?php
get_footer();
