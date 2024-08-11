<?php
/**
 * Getting Started
 *
 */

// Changelog
if ( ! defined( 'ECOMMERCE_STORE_ELEMENTOR_CHANGELOG_URL' ) ) {
    define( 'ECOMMERCE_STORE_ELEMENTOR_CHANGELOG_URL', get_template_directory() . '/readme.txt' );
}

function ecommerce_store_elementor_changelog_screen() {
	global $wp_filesystem;
	$changelog_file = apply_filters( 'ecommerce_store_elementor_changelog_file', ECOMMERCE_STORE_ELEMENTOR_CHANGELOG_URL );
	if ( $changelog_file && is_readable( $changelog_file ) ) {
		WP_Filesystem();
		$changelog = $wp_filesystem->get_contents( $changelog_file );
		$changelog_list = ecommerce_store_elementor_parse_changelog( $changelog );
		echo wp_kses_post( $changelog_list );
	}
}

function ecommerce_store_elementor_parse_changelog( $content ) {
	$content = explode ( '== ', $content );
	$changelog_isolated = '';
	foreach ( $content as $key => $value ) {
		if (strpos( $value, 'Changelog ==') === 0) {
	    	$changelog_isolated = str_replace( 'Changelog ==', '', $value );
	    }
	}
	$changelog_array = explode( '= ', $changelog_isolated );
	unset( $changelog_array[0] );
	$changelog = '<div class="changelog">';
	foreach ( $changelog_array as $value) {
		$value = preg_replace( '/\n+/', '</span><span>', $value );
		$value = '<div class="block"><span class="heading">= ' . $value . '</span></div><hr>';
		$changelog .= str_replace( '<span></span>', '', $value );
	}
	$changelog .= '</div>';
	return wp_kses_post( $changelog );
}

if( ! function_exists( 'ecommerce_store_elementor_getting_started_menu' ) ) :
/**
 * Adding Getting Started Page in admin menu
 */
function ecommerce_store_elementor_getting_started_menu(){	
	add_theme_page(
		__( 'Getting Started', 'ecommerce-store-elementor' ),
		__( 'Ecommerce Store Elementor', 'ecommerce-store-elementor' ),
		'manage_options',
		'ecommerce-store-elementor-getting-started',
		'ecommerce_store_elementor_getting_started_page'
	);
}
endif;
add_action( 'admin_menu', 'ecommerce_store_elementor_getting_started_menu' );

if( ! function_exists( 'ecommerce_store_elementor_getting_started_admin_scripts' ) ) :
/**
 * Load Getting Started styles in the admin
 */
function ecommerce_store_elementor_getting_started_admin_scripts( $hook ){
	// Load styles only on our page
	if( 'appearance_page_ecommerce-store-elementor-getting-started' != $hook ) return;

    wp_enqueue_style( 'ecommerce-store-elementor-getting-started', get_template_directory_uri() . '/inc/getting-started/css/getting-started.css', false);
    wp_enqueue_script( 'updates' );
    wp_enqueue_script( 'ecommerce-store-elementor-getting-started', get_template_directory_uri() . '/inc/getting-started/js/getting-started.js', array( 'jquery' ), true );
}
endif;
add_action( 'admin_enqueue_scripts', 'ecommerce_store_elementor_getting_started_admin_scripts' );


if( ! function_exists( 'ecommerce_store_elementor_getting_started_page' ) ) :
/**
 * Callback function for admin page.
*/
function ecommerce_store_elementor_getting_started_page(){ ?>
	<div class="wrap getting-started">
		<h2 class="notices"></h2>
		<div class="intro-wrap">
			<div class="intro">
				<h3><?php esc_html__( 'Getting started with %1$s v%2$s', 'ecommerce-store-elementor' ); ?></h3>
    		</div>
		</div>
		<div class="panels">
            <div class="welcome-text-main">
                <div>
                    <div class="welcome-heding">
                        <h1 class="welcome-text-title"><?php echo esc_html__('Welcome to','ecommerce-store-elementor'); ?> <strong><?php echo esc_html('Ecommerce Store Elementor Theme','ecommerce-store-elementor'); ?> </strong></h1>
                    </div>
                    <div class="welcome-text-subtitle">
                        <span class="welcome-text-desc-meta"><?php echo esc_html__('MizanThemes','ecommerce-store-elementor'); ?></span>
                    </div>
                </div>
                <div class="upgrade-button">
                    <a class="button button-primary" href="<?php echo esc_url( ECOMMERCE_STORE_ELEMENTOR_BUY_NOW ); ?>"  target="_blank">
                        <?php esc_html_e( 'Buy Now', 'ecommerce-store-elementor' ); ?>
                    </a>
                    <a class="button button-primary" href="<?php echo esc_url( ECOMMERCE_STORE_ELEMENTOR_LIVE_DEMO ); ?>"  target="_blank">
                        <?php esc_html_e( 'Live Demo', 'ecommerce-store-elementor' ); ?>
                    </a>
                    <a class="button button-primary" href="<?php echo esc_url( ECOMMERCE_STORE_ELEMENTOR_PRO_DOC ); ?>"  target="_blank">
                        <?php esc_html_e( 'Pro Doc', 'ecommerce-store-elementor' ); ?>
                    </a>
                </div>
            </div>
			<ul class="inline-list">
                <li class="current">
                    <a id="help" href="javascript:void(0);">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22">
                            <defs><style>.a{fill:#354052;}</style></defs>
                            <path class="a" d="M12,23H11V16.43A5.966,5.966,0,0,1,7,18a6.083,6.083,0,0,1-6-6V11H7.57A5.966,5.966,0,0,1,6,7a6.083,6.083,0,0,1,6-6h1V7.57A5.966,5.966,0,0,1,17,6a6.083,6.083,0,0,1,6,6v1H16.43A5.966,5.966,0,0,1,18,17,6.083,6.083,0,0,1,12,23Zm1-9.87v7.74a4,4,0,0,0,0-7.74ZM3.13,13A4.07,4.07,0,0,0,7,16a4.07,4.07,0,0,0,3.87-3Zm10-2h7.74a4,4,0,0,0-7.74,0ZM11,3.13A4.08,4.08,0,0,0,8,7a4.08,4.08,0,0,0,3,3.87Z" transform="translate(-1 -1)"/>
                        </svg>
                        <?php esc_html_e( 'Setup With Elementor', 'ecommerce-store-elementor' ); ?>
                    </a>
                </li>
                <li class="get-start">
                    <a id="help" href="javascript:void(0);">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22">
                            <defs><style>.a{fill:#354052;}</style></defs>
                            <path class="a" d="M12,23H11V16.43A5.966,5.966,0,0,1,7,18a6.083,6.083,0,0,1-6-6V11H7.57A5.966,5.966,0,0,1,6,7a6.083,6.083,0,0,1,6-6h1V7.57A5.966,5.966,0,0,1,17,6a6.083,6.083,0,0,1,6,6v1H16.43A5.966,5.966,0,0,1,18,17,6.083,6.083,0,0,1,12,23Zm1-9.87v7.74a4,4,0,0,0,0-7.74ZM3.13,13A4.07,4.07,0,0,0,7,16a4.07,4.07,0,0,0,3.87-3Zm10-2h7.74a4,4,0,0,0-7.74,0ZM11,3.13A4.08,4.08,0,0,0,8,7a4.08,4.08,0,0,0,3,3.87Z" transform="translate(-1 -1)"/>
                        </svg>
                        <?php esc_html_e( 'Getting Started', 'ecommerce-store-elementor' ); ?>
                    </a>
                </li>
                
                <li>
                    <a id="support" href="javascript:void(0);">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <defs><style>.a{fill:#354052;}</style></defs>
                            <path class="a" d="M11,18h2V16H11ZM12,2A10,10,0,1,0,22,12,10,10,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8.011,8.011,0,0,1,12,20ZM12,6a4,4,0,0,0-4,4h2a2,2,0,0,1,4,0c0,2-3,1.75-3,5h2c0-2.25,3-2.5,3-5A4,4,0,0,0,12,6Z" transform="translate(-2 -2)"/>
                        </svg>
                        <?php esc_html_e( 'Changelog', 'ecommerce-store-elementor' ); ?>
                    </a>
                </li>

				<li>
                    <a id="free-pro-panel" href="javascript:void(0);">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17.297 20">
                            <defs><style>.a{fill:#354052;}</style></defs>
                            <path class="a" d="M19.384,17.534V13.75L14,19.155l5.384,5.405V20.777H31.3V17.534Zm6.53,9.189H14v3.243H25.914V33.75L31.3,28.345l-5.384-5.405Z" transform="translate(-14 -13.75)"/>
                        </svg>
                        <?php esc_html_e( 'Free Vs Pro', 'ecommerce-store-elementor' ); ?>
                    </a>
                </li>
			</ul>
			<div id="panel" class="panel">
                
                <?php require get_template_directory() . '/inc/getting-started/tabs/start-emelemtor.php'; ?>
                <?php require get_template_directory() . '/inc/getting-started/tabs/help-panel.php'; ?>
                <?php require get_template_directory() . '/inc/getting-started/tabs/support-panel.php'; ?>
				<?php require get_template_directory() . '/inc/getting-started/tabs/free-vs-pro-panel.php'; ?>
              
			</div><!-- .panel -->
		</div><!-- .panels -->
	</div><!-- .getting-started -->
	<?php
}
endif;