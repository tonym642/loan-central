<?php
/*
Plugin Name: Loan Central
Plugin URI: https://yourdomain.com
Description: Embeds the Loan Central web app inside WordPress using an iframe with dynamic resizing and login restriction.
Version: 1.3
Author: Tony Medina
*/

if ( ! defined( 'ABSPATH' ) ) exit;

/*--------------------------------------------------------------
# ADMIN MENU
--------------------------------------------------------------*/
function loan_central_menu() {
    add_menu_page(
        'Loan Central',
        'Loan Central',
        'manage_options',
        'loan-central',
        'loan_central_render_page',
        'dashicons-analytics',
        3
    );
}
add_action('admin_menu', 'loan_central_menu');

/*--------------------------------------------------------------
# RENDER ADMIN PAGE
--------------------------------------------------------------*/
function loan_central_render_page() {

    if ( ! is_user_logged_in() ) {
        $login_url = wp_login_url( get_permalink() );
        echo '<div style="text-align:center; margin-top:50px;">
                <p style="color:red; font-size:16px;">🚫 Access restricted.</p>
                <p>You must <a href="' . esc_url( $login_url ) . '">log in</a> to view the Loan Central app.</p>
              </div>';
        return;
    }

    $plugin_dir = plugin_dir_url( __FILE__ );
    ?>
    <div class="wrap" style="margin:0; padding:0;">
        <iframe id="loan-central-iframe"
                src="<?php echo esc_url( $plugin_dir . 'index.html' ); ?>"
                style="width:100%; height:90vh; border:none; background:#fff; overflow:hidden;">
        </iframe>
    </div>

    <script>
    (function() {
        const iframe = document.getElementById('loan-central-iframe');
        if (!iframe) return;

        // Listen for messages from the iframe
        window.addEventListener('message', function(e) {
            if (!e.data || !e.data.height) return;
            iframe.style.height = e.data.height + 'px';
        });

        // fallback for admin bar offset
        function setFallbackHeight() {
            const adminBar = document.getElementById('wpadminbar');
            const barHeight = adminBar ? adminBar.offsetHeight : 0;
            iframe.style.height = (window.innerHeight - barHeight - 10) + 'px';
        }

        window.addEventListener('resize', setFallbackHeight);
        setFallbackHeight();
    })();
    </script>
    <?php
}

/*--------------------------------------------------------------
# SHORTCODE [loan_central_app]
--------------------------------------------------------------*/
function loan_central_shortcode() {

    if ( ! is_user_logged_in() ) {
        $login_url = wp_login_url( get_permalink() );
        return '<div style="text-align:center; margin-top:50px;">
                    <p style="color:red; font-size:16px;">🚫 Access restricted.</p>
                    <p>You must <a href="' . esc_url( $login_url ) . '">log in</a> to view the Loan Central app.</p>
                </div>';
    }

    $plugin_dir = plugin_dir_url( __FILE__ );
    ob_start(); ?>
    <iframe id="loan-central-iframe-shortcode"
            src="<?php echo esc_url( $plugin_dir . 'index.html' ); ?>"
            style="width:100%; height:90vh; border:none; background:#fff; overflow:hidden;">
    </iframe>

    <script>
    (function() {
        const iframe = document.getElementById('loan-central-iframe-shortcode');
        if (!iframe) return;

        window.addEventListener('message', function(e) {
            if (!e.data || !e.data.height) return;
            iframe.style.height = e.data.height + 'px';
        });

        function setFallbackHeight() {
            iframe.style.height = (window.innerHeight - 50) + 'px';
        }

        window.addEventListener('resize', setFallbackHeight);
        setFallbackHeight();
    })();
    </script>
    <?php
    return ob_get_clean();
}
add_shortcode('loan_central_app', 'loan_central_shortcode');
