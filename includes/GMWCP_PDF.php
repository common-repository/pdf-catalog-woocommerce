<?php
/**
 * This class is loaded on the back-end since its main job is 
 * to display the Admin to box. 
 */

class GMWCP_PDF {
	public function __construct () {
		add_action( 'wp', array( $this, 'woo_comman_single_button' )); 
	}
	public function woo_comman_single_button(){
		global $gmpcp_translation,$gmpcp_arr;
		if (isset($_REQUEST['action']) && $_REQUEST['action']=='catelog_single') {
			
	    	$arr = array();
	    	$setting = array();
	    	$setting['gmwcp_show_hide']=$gmpcp_arr['gmwcp_show_hide'];
	    	$setting['gmpcp_pagebreak']=$gmpcp_arr['gmpcp_pagebreak'];
	    	$setting['gmpcp_image_width']=$gmpcp_arr['gmpcp_image_width'];
	    	$setting['gmpcp_header_text']=$gmpcp_arr['gmpcp_header_text'];
	    	$setting['gmpcp_hf_background_color']=$gmpcp_arr['gmpcp_hf_background_color'];
	    	$setting['gmpcp_hf_item_background_color']=$gmpcp_arr['gmpcp_hf_item_background_color'];
	    	$setting['gmpcp_footer_text']=$gmpcp_arr['gmpcp_footer_text'];
	    	$setting['gmpcp_background_color']=$gmpcp_arr['gmpcp_background_color'];
	    	$setting['gmpcp_item_background_color']=$gmpcp_arr['gmpcp_item_background_color'];
	    	$setting['gmwcp_show_hide']=$gmpcp_arr['gmwcp_show_hide'];
	    	
	    	$arr['translation']=$gmpcp_translation;
	    	$arr['setting']=$setting;
	    	$arr['site_url']=get_site_url();
	    	$arr['rest_api_url']=get_rest_url();
	    	$updated_url=get_rest_url(null,'gmwcp-pdf/v1/products');
	    	if(isset($_REQUEST['product_id']) && $_REQUEST['product_id']!=''){
	    		$updated_url = add_query_arg( 'product_id', $_REQUEST['product_id'], $updated_url );
	    	}
	    	if(isset($_REQUEST['taxonomy']) && $_REQUEST['taxonomy']!=''){
	    		$updated_url = add_query_arg( 'taxonomy', $_REQUEST['taxonomy'], $updated_url );
	    	}
	    	if(isset($_REQUEST['taxonomy_value']) && $_REQUEST['taxonomy_value']!=''){
	    		$updated_url = add_query_arg( 'taxonomy_value', $_REQUEST['taxonomy_value'], $updated_url );
	    	}
			$arr['rest_api_product']=$updated_url;
			$arr['pluginurl']=GMWCP_PLUGINURL;
	    	$json_data = json_encode($arr);

			?>
			<!doctype html>
			<html lang="en">
			   <head>
			      <meta charset="utf-8"/>
			      <link rel="icon" href="/favicon.ico"/>
			      <meta name="viewport" content="width=device-width,initial-scale=1"/>
			      <meta name="theme-color" content="#000000"/>
			      <meta name="description" content="Web site created using create-react-app"/>
			      <title>Generate PDF</title>
			       <script>
			         window.GMWCP_PDF_DATA = <?php echo $json_data; ?>;
			      </script>

			      <!-- <script defer="defer" src="http://localhost:3000/static/js/bundle.js"></script> -->
			      <script defer="defer" src="<?php echo GMWCP_PLUGINURL;?>/build/static/js/main.js"></script>
			      <link href="<?php echo GMWCP_PLUGINURL;?>/build/static/css/main.css" rel="stylesheet">
			   </head>
			   <body>
			      <noscript>You need to enable JavaScript to run this app.</noscript>
			      <div id="root"></div>
			   </body>
			</html>
			<?php
			exit;
		}
		if (isset($_REQUEST['action']) && $_REQUEST['action']=='catelog_shop') {

	    	$arr = array();
	    	$setting = array();
	    	$setting['gmwcp_show_hide']=$gmpcp_arr['gmwcp_show_hide'];
	    	$setting['gmpcp_pagebreak']=$gmpcp_arr['gmpcp_pagebreak'];
	    	$setting['gmpcp_image_width']=$gmpcp_arr['gmpcp_image_width'];
	    	$setting['gmpcp_header_text']=$gmpcp_arr['gmpcp_header_text'];
	    	$setting['gmpcp_hf_background_color']=$gmpcp_arr['gmpcp_hf_background_color'];
	    	$setting['gmpcp_hf_item_background_color']=$gmpcp_arr['gmpcp_hf_item_background_color'];
	    	$setting['gmpcp_footer_text']=$gmpcp_arr['gmpcp_footer_text'];
	    	$setting['gmpcp_background_color']=$gmpcp_arr['gmpcp_background_color'];
	    	$setting['gmpcp_item_background_color']=$gmpcp_arr['gmpcp_item_background_color'];
	    	$setting['gmwcp_show_hide']=$gmpcp_arr['gmwcp_show_hide'];
	    	
	    	$arr['translation']=$gmpcp_translation;
	    	$arr['setting']=$setting;
	    	$arr['site_url']=get_site_url();
	    	$arr['rest_api_url']=get_rest_url();
	    	$updated_url=get_rest_url(null,'gmwcp-pdf/v1/products');
	    	if(isset($_REQUEST['product_id']) && $_REQUEST['product_id']!=''){
	    		$updated_url = add_query_arg( 'product_id', $_REQUEST['product_id'], $updated_url );
	    	}
	    	if(isset($_REQUEST['taxonomy']) && $_REQUEST['taxonomy']!=''){
	    		$updated_url = add_query_arg( 'taxonomy', $_REQUEST['taxonomy'], $updated_url );
	    	}
	    	if(isset($_REQUEST['taxonomy_value']) && $_REQUEST['taxonomy_value']!=''){
	    		$updated_url = add_query_arg( 'taxonomy_value', $_REQUEST['taxonomy_value'], $updated_url );
	    	}
			$arr['rest_api_product']=$updated_url;
			$arr['pluginurl']=GMWCP_PLUGINURL;
	    	$json_data = json_encode($arr);
			?>
			<!doctype html>
			<html lang="en">
			   <head>
			      <meta charset="utf-8"/>
			      <link rel="icon" href="/favicon.ico"/>
			      <meta name="viewport" content="width=device-width,initial-scale=1"/>
			      <meta name="theme-color" content="#000000"/>
			      <meta name="description" content="Web site created using create-react-app"/>
			      <title>Generate PDF</title>
			      <script>
			         window.GMWCP_PDF_DATA = <?php echo $json_data; ?>;
			      </script>
			      <!-- <script defer="defer" src="http://localhost:3000/static/js/bundle.js"></script> -->
			      <script defer="defer" src="<?php echo GMWCP_PLUGINURL;?>/build/static/js/main.js"></script>
			      <link href="<?php echo GMWCP_PLUGINURL;?>/build/static/css/main.css" rel="stylesheet">
			   </head>
			   <body>
			      <noscript>You need to enable JavaScript to run this app.</noscript>
			      <div id="root"></div>
			   </body>
			</html>
			<?php
			exit;
		}
	}
	
}