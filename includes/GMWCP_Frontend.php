<?php
/**
 * This class is loaded on the back-end since its main job is 
 * to display the Admin to box.
 */

class GMWCP_Frontend {
	
	public function __construct () {
		
		add_action( 'init', array( $this, 'GMWCP_init' )); 
	}
	function GMWCP_init(){
		global $gmpcp_arr;
		$gmwcp_enable_single_product = $gmpcp_arr['gmwcp_enable_single_product'];
		$gmwcp_single_display_location = $gmpcp_arr['gmwcp_single_display_location'];
		if($gmwcp_enable_single_product == 'yes'){
			if($gmwcp_single_display_location == 'before'){
				add_action( 'woocommerce_product_meta_start', array( $this, 'woo_comman_single_button' ), 10, 0 ); 
			}
			if($gmwcp_single_display_location == 'after'){
				add_action( 'woocommerce_single_product_summary', array( $this, 'woo_comman_single_button' ), 15 );
			}
			 
		}
		$gmwcp_shop_enable_product = $gmpcp_arr[ 'gmwcp_shop_enable_product'];
		$gmwcp_shop_display_location = $gmpcp_arr[ 'gmwcp_shop_display_location'];
		if($gmwcp_shop_enable_product == 'yes'){
			if($gmwcp_shop_display_location == 'before'){
				add_action( 'woocommerce_before_shop_loop', array( $this, 'woo_comman_shop_button' ), 10, 2 ); 
			}
			if($gmwcp_shop_display_location == 'after'){
				add_action( 'woocommerce_after_shop_loop', array( $this, 'woo_comman_shop_button' ), 10, 2 ); 
			}
		}
		add_shortcode('gmwcp_single_product', array( $this, 'gmwcp_single_product_shortcode' ));
		add_shortcode('gmwcp_shop_product', array( $this, 'gmwcp_shop_product_shortcode' ));
	}
	function gmwcp_single_product_shortcode($atts){
		return $this->get_single_button($atts);
	}

	function gmwcp_shop_product_shortcode($atts){
		return $this->get_cat_button($atts);
	}

	
	function woo_comman_single_button(){
		echo $this->get_single_button();

	}
	
	function woo_comman_shop_button(){
			echo $this->get_cat_button();
	}
	function get_single_button($atts=array()){
		ob_start();
		global $post,$gmpcp_arr;

		if (isset($atts['id']) && $atts['id']!='') {
			$url_custom = get_permalink($atts['id']);
			$product_id = $atts['id'];
		}else{
			$url_custom = get_permalink($post->ID);
			$product_id = $post->ID;
		}
		$isshow = true;
		$product_categories = wp_get_post_terms($product_id, 'product_cat', array('fields' => 'ids'));
		$common_elements = array_intersect($product_categories, $gmpcp_arr['gmpcp_exclude_category']);
		if (!empty($common_elements)) {
			$isshow = false;
		}
		if (metadata_exists( 'post', $product_id, '_gmwcp_exclude_product_single' ) ) {
			$isshow = false;
		}
		if ( is_user_logged_in() ) {
			$current_user = wp_get_current_user();
			$user_roles = $current_user->roles;
			$common_elements = array_intersect($user_roles, $gmpcp_arr['gmpcp_exclude_role']);
			if (!empty($common_elements)) {
				$isshow = false;
			}
		}
		if ($isshow==true) {
			$url_custom = add_query_arg( 'action', 'catelog_single', $url_custom );
			$url_custom = add_query_arg( 'product_id', $product_id, $url_custom );
			//$url_custom = add_query_arg( 'site_url', get_site_url(), $url_custom );
			?>
			<div class="gmwcp_button">
					<a href="<?php echo $url_custom;?>" class="button"><?php echo $gmpcp_arr['gmpcp_trasnlation_single']; ?></a>
			</div>
			<?php
		}
		$output = ob_get_contents();
		ob_end_clean();
		return $output;
	}
	function get_cat_button($attr=array()){

		global $wp,$wp_query,$gmpcp_arr;
		
		ob_start();
		$current_url = $this->getcurrneturl();
		$updated_url = add_query_arg( 'action', 'catelog_shop', $current_url );
		//$updated_url = add_query_arg( 'site_url', get_site_url(), $updated_url );
		if(isset($wp_query->query_vars['taxonomy']) && $wp_query->query_vars['taxonomy']!=''){
			$updated_url = add_query_arg( 'taxonomy', $wp_query->query_vars['taxonomy'], $updated_url );
			$updated_url = add_query_arg( 'taxonomy_value', $wp_query->query_vars['term'], $updated_url );
		}
		$label = $gmpcp_arr['gmpcp_trasnlation_category'];

		$isshow = true;
		if (is_product_category()) {
			$current_category_id = get_queried_object_id();
			if (in_array($current_category_id, $gmpcp_arr['gmpcp_exclude_category'])) {
				$isshow = false;
			}
		}
		if ( is_user_logged_in() ) {
			$current_user = wp_get_current_user();
			$user_roles = $current_user->roles;
			$common_elements = array_intersect($user_roles, $gmpcp_arr['gmpcp_exclude_role']);
			if (!empty($common_elements)) {
				$isshow = false;
			}
		}
		if($isshow==true){
		?>
		<div class="gmwcp_button">
			<a href="<?php echo $updated_url;?>" class="button"><?php echo $label; ?></a>
		</div>
		<?php
		}
		$output = ob_get_contents();
		ob_end_clean();
		return $output;
	}
	function getcurrneturl(){
		$actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		return $actual_link;
	}
	
	
	
}
