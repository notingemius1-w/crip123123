</main><!-- #main -->
</div><!-- #page -->

<footer id="colophon" class="site-footer">
    <div class="footer-top">
        <div class="container">
            <div class="footer-widgets">
                <div class="footer-column">
                    <div class="footer-about">
                        <h3 class="footer-logo">ARCADA</h3>
                        <p>Авторизованный партнер<br>Autodesk, Trimble, MagiCAD</p>
                        <p>Программное обеспечение для<br>архитектуры, машиностроения<br>и строительства</p>
                    </div>
                </div>

                <div class="footer-column">
                    <h4>Контакты</h4>
                    <address class="footer-contact">
                        <?php 
                        $address = arcada_get_option('arcada_address', 'г. Киев, ул. Столичное шоссе, 103');
                        $phone = arcada_get_option('arcada_phone', '+380 44 502-33-35');
                        $email = arcada_get_option('arcada_email', 'common@arcada.com.ua');
                        $phone_clean = preg_replace('/[^0-9+]/', '', $phone);
                        ?>
                        <p>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                                <circle cx="12" cy="10" r="3"/>
                            </svg>
                            <?php echo esc_html($address); ?>
                        </p>
                        <p>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                            </svg>
                            <a href="tel:<?php echo esc_attr($phone_clean); ?>"><?php echo esc_html($phone); ?></a>
                        </p>
                        <p>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                <polyline points="22,6 12,13 2,6"/>
                            </svg>
                            <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>
                        </p>
                    </address>
                </div>

                <div class="footer-column">
                    <h4>Продукты</h4>
                    <ul class="footer-links">
                        <li><a href="/product-category/autodesk/">Autodesk</a></li>
                        <li><a href="/product-category/trimble/">Trimble</a></li>
                        <li><a href="/product-category/magicad/">MagiCAD</a></li>
                        <li><a href="/products/">Все продукты</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h4>Соцсети</h4>
                    <div class="social-links">
                        <a href="https://facebook.com/arcadua" target="_blank" rel="noopener" aria-label="Facebook">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M18 77.5C18 84.6197 12.4018 90.5 5.5 90.5C-1.40184 90.5-7 84.6197-7 77.5C-7 70.3803-1.40184 64.5 5.5 64.5C12.4018 64.5 18 70.3803 18 77.5Z"/>
                                <path d="M12.2522 86.4987V77.5257H14.9824L14.9824 71.5257H12.2522C10.7942 71.5257 9.5 70.2317 9.5 68.7737V65.7737C9.5 64.3157 10.7942 63.0217 12.2522 63.0217H14.9824V57.0217C14.9824 56.5237 15.3782 56.1277 15.8762 56.1277C16.3742 56.1277 16.7702 56.5237 16.7702 57.0217V60.0217H18.0002V63.0217H16.7702V86.4987H12.2522Z"/>
                            </svg>
                        </a>
                        <a href="https://linkedin.com/company/arcada" target="_blank" rel="noopener" aria-label="LinkedIn">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M19.8 18.4V18.388C19.8 17.53 19.146 16.836 18.308 16.836C17.458 16.836 16.82 17.542 16.82 18.414V18.8H14.82V12.8H18.822V13.6C18.822 13.6 18.822 13.6 18.822 13.6C19.25 12.978 19.954 12.35 20.908 12.35C21.908 12.35 22.8 13.162 22.8 14.4V18.4H19.8ZM9.8 12.8C8.806 12.8 7.8 11.794 7.8 11.794C7.8 11.794 7.794 11.794 7.792 11.794C7.792 11.794 7.792 11.794 7.792 11.794C5.8 11.794 4 13.594 4 15.598C4.002 17.604 5.8 19.406 7.806 19.406C9.81 19.406 11.61 17.606 11.61 15.602C11.61 15.602 11.606 12.8 11.608 12.8H9.8ZM10 16.2C8.898 16.2 8 15.302 8 14.2C8 13.098 8.898 12.2 10 12.2C11.102 12.2 12 13.098 12 14.2C12 15.302 11.102 16.2 10 16.2Z"/>
                            </svg>
                        </a>
                        <a href="https://youtube.com/@arcada" target="_blank" rel="noopener" aria-label="YouTube">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M10 15L15 12L10 9V15ZM23 12L14 6V18L23 12ZM1 12L10 6L10 18L1 12Z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-partners">
        <div class="container">
            <p class="partners-label">Наши партнеры:</p>
            <div class="partners-logos">
                <div class="partner-logo autodesk">Autodesk</div>
                <div class="partner-logo trimble">Trimble</div>
                <div class="partner-logo magicad">MagiCAD</div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> Arcada. Все права защищены.</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>