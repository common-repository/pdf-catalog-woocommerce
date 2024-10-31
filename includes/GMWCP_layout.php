<?php
global $gmpcp_arr;
$gmwcp_show_hide = $gmpcp_arr['gmwcp_show_hide'];
$gmpcp_header_text = $gmpcp_arr['gmpcp_header_text'];
$gmpcp_footer_text = $gmpcp_arr['gmpcp_footer_text'];
$gmpcp_pagebreak = $gmpcp_arr['gmpcp_pagebreak'];
$gmpcp_image_width = $gmpcp_arr['gmpcp_image_width'];

$gmpcp_background_color = $gmpcp_arr['gmpcp_background_color'];
$gmpcp_item_background_color = $gmpcp_arr['gmpcp_item_background_color'];
$gmpcp_hf_background_color = $gmpcp_arr['gmpcp_hf_background_color'];
$gmpcp_hf_item_background_color = $gmpcp_arr['gmpcp_hf_item_background_color'];
?>
<div class="inside">
    <form action="#" method="post" id="wp_gmpcp_layout">
        <?php wp_nonce_field( 'gmpcp_nonce_action_layout', 'gmpcp_nonce_field_layout' ); ?>
        <h3><?php _e('Settings', 'gmpcp'); ?></h3>
       <?php
       ?>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">
                   <label >Show/Hide Options</label>
                </th>
                <td>
                   <input class="regular-text" type="checkbox" name="gmwcp_show_hide[]" <?php echo ((in_array("title", $gmwcp_show_hide))?'checked':'') ; ?> value="title" />Title <br/>
                   <input class="regular-text" type="checkbox" name="gmwcp_show_hide[]" <?php echo ((in_array("images", $gmwcp_show_hide))?'checked':'') ; ?> value="images" />Images <br/>
                   <input class="regular-text" type="checkbox" name="gmwcp_show_hide[]" <?php echo ((in_array("short_desc", $gmwcp_show_hide))?'checked':'') ; ?> value="short_desc" />Short Description <br/>
                   <input class="regular-text" type="checkbox" name="gmwcp_show_hide[]" <?php echo ((in_array("long_desc", $gmwcp_show_hide))?'checked':'') ; ?> value="long_desc" />Long Description <br/>
                   <input class="regular-text" type="checkbox" name="gmwcp_show_hide[]" <?php echo ((in_array("read_more", $gmwcp_show_hide))?'checked':'') ; ?> value="read_more" />Read More <br/>
                   <input class="regular-text" type="checkbox" name="gmwcp_show_hide[]" <?php echo ((in_array("sku", $gmwcp_show_hide))?'checked':'') ; ?> value="sku" />SKU <br/>
                   <input class="regular-text" type="checkbox" name="gmwcp_show_hide[]" <?php echo ((in_array("price", $gmwcp_show_hide))?'checked':'') ; ?> value="price" />Price <br/>
                   <input class="regular-text" type="checkbox" name="gmwcp_show_hide[]" <?php echo ((in_array("categories", $gmwcp_show_hide))?'checked':'') ; ?> value="categories" />Categories <br/>
                   <input class="regular-text" type="checkbox" name="gmwcp_show_hide[]" <?php echo ((in_array("tags", $gmwcp_show_hide))?'checked':'') ; ?> value="tags" />Tags <br/>
                   <input class="regular-text" type="checkbox" name="gmwcp_show_hide[]" <?php echo ((in_array("weight", $gmwcp_show_hide))?'checked':'') ; ?> value="weight" disabled />Weight <a href="https://www.codesmade.com/store/pdf-catalog-woocommerce-pro/" target="_blank">Get Pro version</a><br/>
                   <input class="regular-text" type="checkbox" name="gmwcp_show_hide[]" <?php echo ((in_array("dimensions", $gmwcp_show_hide))?'checked':'') ; ?> value="dimensions" disabled/>Dimensions <a href="https://www.codesmade.com/store/pdf-catalog-woocommerce-pro/" target="_blank">Get Pro version</a><br/>
                   <input class="regular-text" type="checkbox" name="gmwcp_show_hide[]" <?php echo ((in_array("attributes", $gmwcp_show_hide))?'checked':'') ; ?> value="attributes" disabled/>Attributes <a href="https://www.codesmade.com/store/pdf-catalog-woocommerce-pro/" target="_blank">Get Pro version</a><br/>
                   <input class="regular-text" type="checkbox" name="gmwcp_show_hide[]" <?php echo ((in_array("stock_status", $gmwcp_show_hide))?'checked':'') ; ?> value="stock_status"  disabled/>Stock Status <a href="https://www.codesmade.com/store/pdf-catalog-woocommerce-pro/" target="_blank">Get Pro version</a><br/>
                   <input class="regular-text" type="checkbox" name="gmwcp_show_hide[]" <?php echo ((in_array("gallery", $gmwcp_show_hide))?'checked':'') ; ?> value="gallery" disabled/>Gallery <a href="https://www.codesmade.com/store/pdf-catalog-woocommerce-pro/" target="_blank">Get Pro version</a><br/>
                </td>
             </tr>
             <tr valign="top">
                <th scope="row">
                   <label >Page Break After Product</label>
                </th>
                <td>
                   <input class="regular-text" type="number" min="1" name="gmpcplayotarr[gmpcp_pagebreak]" value="<?php echo $gmpcp_pagebreak ; ?>" disabled/>
                   <a href="https://www.codesmade.com/store/pdf-catalog-woocommerce-pro/" target="_blank">Get Pro version</a> 
                   <br/>
                   <strong><em>Enter Number Which break of number</em></strong>
                </td>
             </tr>
              <tr valign="top">
                <th scope="row">
                   <label >Image Section Width</label>
                </th>
                <td>
                   <input class="regular-text" type="number" min="1" name="gmpcplayotarr[gmpcp_image_width]" value="<?php echo $gmpcp_image_width ; ?>" max="50" />
                   <br/>
                   <strong><em>Keep Max 50</em></strong>
                </td>
             </tr>
            <tr>
                <th scope="row"><label><?php _e('Header Text', 'gmtrip'); ?></label></th>
                <td>
                   <input type="text"  style="width: 100%" name="gmpcplayotarr[gmpcp_header_text]" value="<?php echo $gmpcp_header_text; ?>" readonly>
                   <a href="https://www.codesmade.com/store/pdf-catalog-woocommerce-pro/" target="_blank">Get Pro version</a>
                </td>
            </tr>
            <tr>
                <th scope="row"><label><?php _e('Footer Text', 'gmtrip'); ?></label></th>
                <td>
                    <textarea style="width: 100%;"  name="gmpcplayotarr[gmpcp_footer_text]" readonly><?php echo $gmpcp_footer_text;?></textarea>
                    <a href="https://www.codesmade.com/store/pdf-catalog-woocommerce-pro/" target="_blank">Get Pro version</a>
                </td>
            </tr>
            <tr>
                <th scope="row"><label><?php _e('Background Color', 'gmtrip'); ?></label></th>
                <td>
                   <input type="text"  class="gmpcp-color-field" name="gmpcplayotarr[gmpcp_background_color]" value="<?php echo $gmpcp_background_color; ?>">
                   <p class="description">
                        <?php _e('Enter Color Like <strong>#fff</strong>. Default will be take <strong>#fff</strong>', 'gmtrip'); ?>
                    </p>
                   
                </td>
            </tr>
            <tr>
                <th scope="row"><label><?php _e('Color', 'gmtrip'); ?></label></th>
                <td>
                   <input type="text"  class="gmpcp-color-field" name="gmpcplayotarr[gmpcp_item_background_color]" value="<?php echo $gmpcp_item_background_color; ?>">
                   <p class="description">
                        <?php _e('Enter Color Like <strong>#000</strong>. Default will be take <strong>#000</strong>', 'gmtrip'); ?>
                    </p>
                   
                </td>
            </tr>
            <tr>
                <th scope="row"><label><?php _e('Header/Footer Background Color', 'gmtrip'); ?></label></th>
                <td>
                   <input type="text"  class="gmpcp-color-field" name="gmpcplayotarr[gmpcp_hf_background_color]" value="<?php echo $gmpcp_hf_background_color; ?>">
                   <p class="description">
                        <?php _e('Enter Color Like <strong>#fff</strong>. Default will be take <strong>#fff</strong>', 'gmtrip'); ?>
                    </p>
                   
                </td>
            </tr>
            <tr>
                <th scope="row"><label><?php _e('Header/Footer  Color', 'gmtrip'); ?></label></th>
                <td>
                   <input type="text"  class="gmpcp-color-field" name="gmpcplayotarr[gmpcp_hf_item_background_color]" value="<?php echo $gmpcp_hf_item_background_color; ?>">
                   <p class="description">
                        <?php _e('Enter Color Like <strong>#000</strong>. Default will be take <strong>#000</strong>', 'gmtrip'); ?>
                    </p>
                   
                </td>
            </tr>
            
            
        </table>
        
        <p class="submit">
            <input type="hidden" name="action" value="wp_gmpcp_layout">
            <input type="submit" name="submit"  class="button button-primary" value="Save">
        </p>
    </form>
</div>