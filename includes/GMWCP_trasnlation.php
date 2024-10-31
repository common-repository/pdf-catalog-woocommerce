<?php
global $gmpcp_arr,$gmpcp_translation;

?>
<div class="inside">
    <form action="#" method="post" id="wp_gmpcp_trasnlation">
        <?php wp_nonce_field( 'gmpcp_nonce_action_trasnlation', 'gmpcp_nonce_field_trasnlation' ); ?>
        <h3><?php _e('Trasnlation', 'gmpcp'); ?></h3>
       <?php
       ?>
        <table class="form-table">
           
            <?php
            foreach($gmpcp_translation as $gmpcp_translation_key=>$gmpcp_translation_val){
            ?>
            <tr>
                <th scope="row"><label><?php echo $gmpcp_translation_val['label']; ?></label></th>
                <td>
                   <input type="text"  style="width: 100%" name="gmpcp_trasnlation_arr[<?php echo $gmpcp_translation_key;?>]" value="<?php echo $gmpcp_translation_val['val']; ?>" readonly>
                   <a href="https://www.codesmade.com/store/pdf-catalog-woocommerce-pro/" target="_blank">Get Pro version</a>
                </td>
            </tr>
            <?php
            }
            ?> 
            
            
            
        </table>
        
        <p class="submit">
            <input type="hidden" name="action" value="wp_gmpcp_trasnlation">
            <input type="submit" name="submit"  class="button button-primary" value="Save">
        </p>
    </form>
</div>