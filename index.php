<?php get_header(); ?>

<main id="primary" class="site-main">

    <?php if (have_posts()): ?>

        <?php if (is_home() && !is_front_page()): ?>
            <header class="page-header">
                <h1 class="page-title"><?php single_post_title(); ?></h1>
            </header>
        <?php endif; ?>

        <div class="posts-container">
            <?php while (have_posts()): the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class('post-item'); ?>>
                    <?php if (has_post_thumbnail()): ?>
                        <div class="post-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('large', array('alt' => get_the_title())); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                    <div class="post-content">
                        <header class="post-header">
                            <div class="post-meta">
                                <time datetime="<?php echo get_the_date('c'); ?>">
                                    <?php echo get_the_date(); ?>
                                </time>
                                <span class="post-author">
                                    <?php the_author(); ?>
                                </span>
                            </div>
                            <h2 class="post-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                        </header>

                        <div class="post-excerpt">
                            <?php the_excerpt(); ?>
                        </div>

                        <footer class="post-footer">
                            <a href="<?php the_permalink(); ?>" class="read-more">
                                <?php esc_html_e('Read More', 'arcada'); ?>
                            </a>
                            <div class="post-categories">
                                <?php the_category(', '); ?>
                            </div>
                        </footer>
                    </div>
                </article>

            <?php endwhile; ?>
        </div>

        <nav class="pagination">
            <?php
            the_posts_pagination(array(
                'mid_size' => 2,
                'prev_text' => __('&laquo; Previous', 'arcada'),
                'next_text' => __('Next &raquo;', 'arcada'),
            ));
            ?>
        </nav>

    <?php else: ?>

        <section class="no-results not-found">
            <header class="page-header">
                <h1 class="page-title"><?php esc_html_e('Nothing Found', 'arcada'); ?></h1>
            </header>

            <div class="page-content">
                <?php if (is_search()): ?>
                    <p><?php esc_html_e('Sorry, nothing matched your search terms. Please try again with some different keywords.', 'arcada'); ?></p>
                    <?php get_search_form(); ?>
                <?php else: ?>
                    <p><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'arcada'); ?></p>
                    <?php get_search_form(); ?>
                <?php endif; ?>
            </div>
        </section>

    <?php endif; ?>

</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>