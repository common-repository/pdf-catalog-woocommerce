<?php
/**
* This class is loaded on the back-end since its main job is
* to display the Admin to box.
*/
class GMWCP_Admin {
	
	public function __construct () {
		add_action( 'admin_init', array( $this, 'GMWCP_register_settings' ) );
		add_action( 'admin_menu', array( $this, 'GMWCP_admin_menu' ) );
		add_action('admin_enqueue_scripts', array( $this, 'GMWCP_admin_script' ));
		add_filter( 'woocommerce_product_data_tabs', array( $this, 'GMWCP_custom_product_tabs' ) );
		add_filter( 'woocommerce_product_data_panels', array( $this, 'GMWCP_custom_product_panels' ) );
		add_action( 'woocommerce_process_product_meta', array( $this, 'GMWCP_custom_save' ) );
		if ( is_admin() ) {
			return;
		}
		
	}
	public function GMWCP_admin_script ($hook) {
		
		if($hook=='toplevel_page_gmwcp-catalog'){
		    wp_enqueue_style( 'gmwcp_select2_css' , GMWCP_PLUGINURL.'js/select2/select2.css');
		    wp_enqueue_script('gmwcp_select2_js', GMWCP_PLUGINURL.'js/select2/select2.js');
			wp_enqueue_script( 'wp-color-picker' ); 
			wp_enqueue_style('gmwcp_admin_css', GMWCP_PLUGINURL.'css/admin-style.css');
			wp_enqueue_script('gmwcp_admin_js', GMWCP_PLUGINURL.'js/admin-script.js');
		}
		
	}
	
	public function GMWCP_admin_menu () {
		add_menu_page('Woo Catalog PDF', 'Woo Catalog PDF', 'manage_options', 'gmwcp-catalog', array( $this, 'GMWCP_page' ));
		
	}
	public function GMWCP_page() {
		
	?>
	<div class="wrap">
		<div class="headingmc">
			<h1 class="wp-heading-inline"><?php _e('Woo Catalog PDF', 'gmwcp'); ?></h1>
			 <div class="about-text">
		        <p>
					Thank you for using our plugin! If you are satisfied, please reward it a full five-star <span style="color:#ffb900">★★★★★</span> rating.                        <br>
		            <a href="https://wordpress.org/support/plugin/pdf-catalog-woocommerce/reviews/?filter=5" target="_blank">Reviews</a>
		            | <a href="https://www.codesmade.com/contact-us/" target="_blank">Support</a>
		        </p>
		    </div>
		</div>
		<hr class="wp-header-end">
		
			<div class="postbox">
					
					<div class="inside">
						<?php
						$navarr = array(
							'page=gmwcp-catalog'=>'Category & Shop Page Setting',
							'page=gmwcp-catalog&view=single'=>'Single Product Page Setting',
							'page=gmwcp-catalog&view=layout'=>'Layout',
							'page=gmwcp-catalog&view=exclude'=>'Exclude',
							'page=gmwcp-catalog&view=trasnlation'=>'Translation',
							
						);
						?>
						<h2 class="nav-tab-wrapper">
							<?php
							foreach ($navarr as $keya => $valuea) {
								$pagexl = explode("=",$keya);
								if(!isset($pagexl[2])){
									$pagexl[2] = '';
								}
								if(!isset($_REQUEST['view'])){
									$_REQUEST['view'] = '';
								}
								?>
								<a href="<?php echo admin_url( 'admin.php?'.$keya);?>" class="nav-tab <?php if($pagexl[2]==$_REQUEST['view']){echo 'nav-tab-active';} ?>"><?php echo $valuea;?></a>
								<?php
							}
							?>
						</h2>
						
					   <?php

						if($_REQUEST['view']==''){
							include(GMWCP_PLUGINDIR.'includes/GMWCP_Shop_Admin.php');
						}
						if($_REQUEST['view']=='single'){
							include(GMWCP_PLUGINDIR.'includes/GMWCP_Single_Admin.php');
						}
						if($_REQUEST['view']=='layout'){
							include(GMWCP_PLUGINDIR.'includes/GMWCP_layout.php');
						}
						if($_REQUEST['view']=='exclude'){
							include(GMWCP_PLUGINDIR.'includes/GMWCP_Exclude.php');
						}
						if($_REQUEST['view']=='trasnlation'){
							include(GMWCP_PLUGINDIR.'includes/GMWCP_trasnlation.php');
						}
						?>
					</div>
			</div>
			
	</div>

	<?php
	}

	public function GMWCP_register_settings() {
		register_setting( 'gmwcp_shop_options_group', 'gmwcp_shop_enable_product', array( $this, 'gmwqp_callbackcheckbox' )  );

		register_setting( 'gmwcp_shop_options_group', 'gmwcp_shop_display_location', array( $this, 'gmwqp_callback' )  );



		register_setting( 'gmwcp_options_group', 'gmwcp_enable_single_product' , array( $this, 'gmwqp_callbackcheckbox' ) );
		register_setting( 'gmwcp_options_group', 'gmwcp_single_display_location' , array( $this, 'gmwqp_callback' ) );

		register_setting( 'gmpcp_exclude_options_group', 'gmwcp_exclude_out_of_stock', array( $this, 'gmwqp_callback' ) );
		register_setting( 'gmpcp_exclude_options_group', 'gmpcp_exclude_category', array( $this, 'gmwqp_callback' ) );
		register_setting( 'gmpcp_exclude_options_group', 'gmpcp_exclude_role', array( $this, 'gmwqp_callback' ) );
		

		if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'wp_gmpcp_layout'){
			if(!isset( $_POST['gmpcp_nonce_field_layout'] ) || !wp_verify_nonce( $_POST['gmpcp_nonce_field_layout'], 'gmpcp_nonce_action_layout' ) ){
                print 'Sorry, your nonce did not verify.';
                exit;
            }else{
            	update_option( 'gmwcp_show_hide', $_REQUEST['gmwcp_show_hide'] );
            	foreach ($_REQUEST['gmpcplayotarr'] as $keya => $valuea) {
            		if($keya=='gmpcp_footer_text'){
            			//$textToStore = htmlspecialchars($valuea, ENT_QUOTES | ENT_HTML5);
            			update_option( $keya, wp_kses_post($valuea) );
            		}else{
            			update_option( $keya, sanitize_text_field($valuea) );
            		}
            		
            	}
				wp_redirect( admin_url( 'admin.php?page=gmwcp-catalog&view=layout&msg=layout') );
			}
			exit;
		}
		if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'wp_gmpcp_trasnlation'){
			if(!isset( $_POST['gmpcp_nonce_field_trasnlation'] ) || !wp_verify_nonce( $_POST['gmpcp_nonce_field_trasnlation'], 'gmpcp_nonce_action_trasnlation' ) ){
                print 'Sorry, your nonce did not verify.';
                exit;
            }else{
            	foreach ($_REQUEST['gmpcp_trasnlation_arr'] as $keya => $valuea) {
            			update_option( $keya, sanitize_text_field($valuea) );
            	}
				wp_redirect( admin_url( 'admin.php?page=gmwcp-catalog&view=trasnlation&msg=trasnlation') );
			}
			exit;
		}
	}
	public function gmwqp_callbackcheckbox($option) {
		if($option==''){
			return 'no';
		}
		return $option;
	}
	public function gmwqp_accesstoken_callback($option) {
		return $option;
	}
	
	public function GMWCP_custom_product_tabs( $tabs) {
		$tabs['gmwcp_tab'] = array(
			'label'		=> __( 'Pdf Catalog', 'gmwcp' ),
			'target'  =>  'gmwcp_tab_content',
	        'priority' => 60,
	        'class'   => array()
		);
		return $tabs;
	}

	public function GMWCP_custom_product_panels() {
		global $post;
		?>
		<div id='gmwcp_tab_content' class='panel woocommerce_options_panel'>
			<div class='options_group'>
				<?php
					woocommerce_wp_checkbox( array(
						'id' 		=> '_gmwcp_exclude_product_single',
						'label' 	=> __( 'Exclude Pdf Catalog', 'gmwcp' ),
						'description'   => __( 'Enable this option to exclude single Pdf Catalog on shop & category pages.', 'gmwcp' ) 
					) );
				?>
				
		</div>
	</div>
		<?php
	}

	public function GMWCP_custom_save( $post_id ) {
	
		
		if(isset( $_POST['_gmwcp_exclude_product_single'] )){
			$gmwcp_exclude_product_single = isset( $_POST['_gmwcp_exclude_product_single'] ) ? 'yes' : 'no';
			update_post_meta( $post_id, '_gmwcp_exclude_product_single', $gmwcp_exclude_product_single );
		}else{
			delete_post_meta( $post_id, '_gmwcp_exclude_product_single' );
		}
		
		
	}

}


?>