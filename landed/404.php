<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Test_theme
 */

get_header(); ?>

    <div id="main" class="wrapper style1">
        <div class="container">

            <header class="major">
                <h2>404. Упс, такой страницы у нас нет</h2>
            </header>

            <!-- Content -->
            <div class="row 150%">
                <div class="8u 12u$(medium)">
                    <h3>Что делать в таком случае:</h3>
                    <ul>
                        <li>не паниковать</li>
                        <li>глубоко вздохнуть</li>
                        <li>попробовать зайти на <a href="<?php echo home_url(); ?>">главную</a> или воспользоваться поиском.</li>
                    </ul>

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
