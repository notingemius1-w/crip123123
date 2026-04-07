<?php get_header(); ?>

<main id="primary" class="site-main">
    <?php while (have_posts()): the_post(); ?>
        
        <article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>
            <div class="container">
                <header class="entry-header">
                    <div class="entry-meta">
                        <time datetime="<?php echo get_the_date('c'); ?>">
                            <?php echo get_the_date(); ?>
                        </time>
                        <?php if (has_category()): ?>
                            <span class="entry-categories">
                                <?php the_category(', '); ?>
                            </span>
                        <?php endif; ?>
                    </div>
                    
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header>

                <?php if (has_post_thumbnail()): ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail('large', array('alt' => get_the_title())); ?>
                    </div>
                <?php endif; ?>

                <div class="entry-content">
                    <?php the_content(); ?>
                </div>

                <footer class="entry-footer">
                    <?php if (has_tag()): ?>
                        <div class="entry-tags">
                            <?php the_tags('<span class="tag-label">Теги:</span> ', ', '); ?>
                        </div>
                    <?php endif; ?>
                </footer>
            </div>
        </article>

        <nav class="post-navigation">
            <div class="container">
                <div class="nav-links">
                    <div class="nav-previous">
                        <?php previous_post_link('%link', '&larr; Предыдущая статья'); ?>
                    </div>
                    <div class="nav-next">
                        <?php next_post_link('%link', 'Следующая статья &rarr;'); ?>
                    </div>
                </div>
            </div>
        </nav>

        <?php if (comments_open() || get_comments_number()): ?>
            <div class="comments-section">
                <div class="container">
                    <?php comments_template(); ?>
                </div>
            </div>
        <?php endif; ?>

    <?php endwhile; ?>
</main>

<?php get_footer(); ?>