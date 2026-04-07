<?php get_header(); ?>

<main id="primary" class="site-main front-page">
    <section class="hero-section">
        <div class="hero-background">
            <div class="hero-overlay"></div>
        </div>
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">Программное обеспечение для бизнеса</h1>
                <p class="hero-subtitle">Авторизованный партнер Autodesk, Trimble, MagiCAD. Профессиональные решения для архитектуры, машиностроения и строительства.</p>
                <div class="hero-buttons">
                    <a href="/shop/" class="btn btn-primary">Каталог продуктов</a>
                    <a href="/contacts/" class="btn btn-secondary">Связаться с нами</a>
                </div>
            </div>
            <div class="hero-features">
                <div class="feature-item">
                    <span class="feature-number">20+</span>
                    <span class="feature-label">Лет на рынке</span>
                </div>
                <div class="feature-item">
                    <span class="feature-number">500+</span>
                    <span class="feature-label">Клиентов</span>
                </div>
                <div class="feature-item">
                    <span class="feature-number">1000+</span>
                    <span class="feature-label">Проектов</span>
                </div>
            </div>
        </div>
    </section>

    <section class="products-section">
        <div class="container">
            <h2 class="section-title">Продукты</h2>
            <p class="section-subtitle">Профессиональное программное обеспечение для вашего бизнеса</p>
            
            <div class="products-grid">
                <a href="/product-category/autodesk/" class="product-card">
                    <div class="product-icon autodesk">
                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none">
                            <rect width="60" height="60" rx="8"/>
                            <path d="M15 20h10v20H15V20z" fill="white"/>
                            <path d="M30 15h10v30H30V15z" fill="white"/>
                            <path d="M45 25h-10v20h10V25z" fill="white"/>
                        </svg>
                    </div>
                    <h3 class="product-title">Autodesk</h3>
                    <p class="product-description">AutoCAD, Revit, 3ds Max, Maya, Fusion 360 и др.</p>
                </a>

                <a href="/product-category/trimble/" class="product-card">
                    <div class="product-icon trimble">
                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none">
                            <rect width="60" height="60" rx="8"/>
                            <circle cx="30" cy="30" r="15" fill="white"/>
                        </svg>
                    </div>
                    <h3 class="product-title">Trimble</h3>
                    <p class="product-description">SketchUp, Tekla, Vico Office</p>
                </a>

                <a href="/product-category/magicad/" class="product-card">
                    <div class="product-icon magicad">
                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none">
                            <rect width="60" height="60" rx="8"/>
                            <path d="M15 45L30 15l15 30H15z" fill="white"/>
                        </svg>
                    </div>
                    <h3 class="product-title">MagiCAD</h3>
                    <p class="product-description">MEP для Revit и AutoCAD</p>
                </a>

                <a href="/products/" class="product-card">
                    <div class="product-icon all">
                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none">
                            <rect width="60" height="60" rx="8"/>
                            <path d="M25 20h10v20H25V20z" fill="white"/>
                            <path d="M25 20h10v-5H25v5z" fill="white"/>
                        </svg>
                    </div>
                    <h3 class="product-title">Все продукты</h3>
                    <p class="product-description">Полный каталог решений</p>
                </a>
            </div>
        </div>
    </section>

    <section class="categories-section">
        <div class="container">
            <h2 class="section-title">Решения</h2>
            
            <div class="categories-grid">
                <a href="/solutions/architecture/" class="category-card">
                    <div class="category-image" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/category-architecture.jpg')"></div>
                    <div class="category-content">
                        <h3>Архитектура</h3>
                        <p>Проектирование и BIM</p>
                    </div>
                </a>

                <a href="/solutions/engineer/" class="category-card">
                    <div class="category-image" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/category-engineering.jpg')"></div>
                    <div class="category-content">
                        <h3>Машиностроение</h3>
                        <p>CAD/CAM/CAE решения</p>
                    </div>
                </a>

                <a href="/solutions/construction/" class="category-card">
                    <div class="category-image" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/category-construction.jpg')"></div>
                    <div class="category-content">
                        <h3>Строительство</h3>
                        <p>Управление стройкой</p>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <section class="news-section">
        <div class="container">
            <h2 class="section-title">Новости</h2>
            
            <?php
            $news_args = array(
                'post_type' => 'post',
                'posts_per_page' => 4,
                'post_status' => 'publish',
            );
            $news_query = new WP_Query($news_args);
            ?>
            
            <?php if ($news_query->have_posts()): ?>
                <div class="news-grid">
                    <?php while ($news_query->have_posts()): $news_query->the_post(); ?>
                        <article class="news-card">
                            <?php if (has_post_thumbnail()): ?>
                                <a href="<?php the_permalink(); ?>" class="news-thumbnail">
                                    <?php the_post_thumbnail('medium', array('alt' => get_the_title())); ?>
                                </a>
                            <?php endif; ?>
                            <div class="news-content">
                                <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>
                                <a href="<?php the_permalink(); ?>">
                                    <h3><?php the_title(); ?></h3>
                                </a>
                                <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                            </div>
                        </article>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
                
                <div class="news-archive-link">
                    <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="btn btn-outline">Все новости</a>
                </div>
            <?php else: ?>
                <p>Пока нет новостей.</p>
            <?php endif; ?>
        </div>
    </section>

    <section class="cta-section">
        <div class="container">
            <h2>Нужна консультация?</h2>
            <p>Свяжитесь с нами, и наши специалисты помогут подобрать оптимальное решение</p>
            <a href="/contacts/" class="btn btn-primary btn-large">Получить консультацию</a>
        </div>
    </section>
</main>

<?php get_footer(); ?>