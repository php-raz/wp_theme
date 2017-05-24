<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Test_theme
 */

get_header(); ?>


    <!-- Main -->
    <div id="main" class="wrapper style1">
        <div class="container">

            <header class="major">
                <h2><?php bloginfo('name') ?></h2>
                <p><?php bloginfo('description') ?></p>
            </header>

            <!-- Content -->
            <div class="row 150%">
                <div class="8u 12u$(medium)">

                    <?php if (have_posts()) : while (have_posts()) :
                        the_post(); ?>


                        <section id="content">
                            <a href="<?php the_permalink(); ?>" class="image fit">
                                <?php the_post_thumbnail(array(788, 263)) ?>
                            </a>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <?php the_excerpt(); ?>
                            <a href="<?php the_permalink(); ?>">
                                Далее...
                            </a>
                        </section>


                    <?php endwhile;
                    else : ?>

                    <?php endif;
                    $args = array(
                        'show_all' => false, // показаны все страницы участвующие в пагинации
                        'end_size' => 1,     // количество страниц на концах
                        'mid_size' => 1,     // количество страниц вокруг текущей
                        'prev_next' => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
                        'prev_text' => __('Назад'),
                        'next_text' => __('Далее'),
                        'add_args' => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
                        'add_fragment' => '',     // Текст который добавиться ко всем ссылкам.
                        'screen_reader_text' => '',
                    );
                    the_posts_pagination($args) ?>
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
