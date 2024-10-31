<?php

class GMWCP_Cron {
	
	public function __construct () {

		add_action( 'init', array( $this, 'GMWCP_default' ) );
		
	}

	public function GMWCP_default(){
		global $gmpcp_arr,$gmpcp_translation;
		
		$defalarr = array(

			'gmpcp_trasnlation_shop' => 'Download Full Catalog',
			'gmpcp_trasnlation_category' => 'Download Category Catalog',
			'gmpcp_trasnlation_single' => 'Download Catalog',
			'gmpcp_trasnlation_read_more' => 'Read More',
			'gmpcp_trasnlation_sku' => 'SKU',
			'gmpcp_trasnlation_price' => 'Price',
			'gmpcp_trasnlation_stock' => 'Stock',
			'gmpcp_trasnlation_categories' => 'Categories',
			'gmpcp_trasnlation_tags' => 'Tags',
			'gmpcp_trasnlation_weight' => 'Weight',
			'gmpcp_trasnlation_dimensions' => 'Dimensions',
			'gmpcp_trasnlation_product_description' => 'Product Description',
			'gmpcp_header_text' => 'WooCommerce PDF Catalog',
			'gmpcp_footer_text' => 'Developer By https://wordpress.org/plugins/pdf-catalog-woocommerce/',
			'gmwcp_shop_display_location' => 'before',
			'gmwcp_single_display_location' => 'before',
			'gmpcp_background_color' => '#ffffff',
			'gmpcp_item_background_color' => '#000000',
			'gmpcp_hf_background_color' => '#0084B4',
			'gmpcp_hf_item_background_color' => '#000000',
			'gmwcp_shop_enable_product' => 'yes',
			'gmwcp_enable_single_product' => 'yes',
			'gmwcp_exclude_out_of_stock' => 'no',
			'gmpcp_pagebreak' => '1',
			'gmpcp_image_width' => '40',
			'gmwcp_show_hide' => array('title','images','short_desc','long_desc','read_more','sku','price','categories','tags','stock_status'),
			'gmpcp_exclude_category' => array(),
			'gmpcp_exclude_role' => array(),
			
			
			
		);
		
		foreach ($defalarr as $keya => $valuea) {
			if (get_option( $keya )=='') {
				$gmpcp_arr[$keya]=$defalarr[$keya];
			}else{
				$gmpcp_arr[$keya]=get_option($keya);
			}
		}
		$gmpcp_translation_arr = array(
			'gmpcp_trasnlation_shop',
			'gmpcp_trasnlation_category',
			'gmpcp_trasnlation_single',
			'gmpcp_trasnlation_read_more',
			'gmpcp_trasnlation_sku',
			'gmpcp_trasnlation_price',
			'gmpcp_trasnlation_stock',
			'gmpcp_trasnlation_categories',
			'gmpcp_trasnlation_tags',
			'gmpcp_trasnlation_weight',
			'gmpcp_trasnlation_dimensions',
			'gmpcp_trasnlation_product_description',
		);
		foreach ($gmpcp_translation_arr as $keya => $valuea) {
			$gmpcp_translation[$valuea]['label'] = $defalarr[$valuea];
			$gmpcp_translation[$valuea]['val']=$gmpcp_arr[$valuea];
			
		}


		
	}
}

?>