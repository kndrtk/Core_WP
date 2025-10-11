<?php
/**
 * 
 * Savana - Ecommerce WordPress Theme
 * Footer Template
 * 
 * @encoding     UTF-8
 * @copyright    Copyright (C) 2025 IDLayers (http://idlayers.com). All rights reserved.
 * @license      Envato Standard License http://themeforest.net/licenses/standard?ref=IDLayers
 * @author       Oleksandr Kondratiuk (alex.sledg@gmail.com)
 * @support      alex.sledg@gmail.com
 * 
 */
?>

    <footer id="colophon" class="site-footer">
        <div class="footer-content">
            
            <?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ) : ?>
                <div class="footer-widgets">
                    <div class="footer-widget-area">
                        <?php
                        if ( is_active_sidebar( 'footer-1' ) ) {
                            dynamic_sidebar( 'footer-1' );
                        }
                        ?>
                    </div>
                    <div class="footer-widget-area">
                        <?php
                        if ( is_active_sidebar( 'footer-2' ) ) {
                            dynamic_sidebar( 'footer-2' );
                        }
                        ?>
                    </div>
                    <div class="footer-widget-area">
                        <?php
                        if ( is_active_sidebar( 'footer-3' ) ) {
                            dynamic_sidebar( 'footer-3' );
                        }
                        ?>
                    </div>
                    <div class="footer-widget-area">
                        <?php
                        if ( is_active_sidebar( 'footer-4' ) ) {
                            dynamic_sidebar( 'footer-4' );
                        }
                        ?>
                    </div>
                </div><!-- .footer-widgets -->
            <?php endif; ?>
            
            <div class="site-info">
                <p>
                    <?php
                    /* translators: 1: Theme name, 2: Theme author. */
                    printf( esc_html__( 'Theme: %1$s by %2$s.', 'New_theme' ), 'New_theme', '<a href="http://idlayers.tk">IDLayers</a>' );
                    ?>
                </p>
                <p>
                    &copy; <?php echo esc_html( date( 'Y' ) ); ?> 
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>. 
                    <?php esc_html_e( 'All rights reserved.', 'New_theme' ); ?>
                </p>
            </div><!-- .site-info -->
            
        </div><!-- .footer-content -->
    </footer><!-- #colophon -->
    
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>