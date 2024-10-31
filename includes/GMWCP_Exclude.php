<?php
global $gmpcp_arr;
$gmwcp_exclude_out_of_stock = $gmpcp_arr['gmwcp_exclude_out_of_stock'];
?>
<div class="inside">
    <form method="post" action="options.php">
        <?php settings_fields( 'gmpcp_exclude_options_group' ); ?>
        <h3><?php _e('Exclude', 'gmpcp'); ?></h3>
        <table class="form-table">
        <tr valign="top">
        <th scope="row">
           <label for="gmwcp_exclude_out_of_stock"><?php _e('Exclue Out of Stock Shop / Category Page', 'gmwcp'); ?></label>
        </th>
        <td>
           <input class="regular-text" type="checkbox" id="gmwcp_exclude_out_of_stock" <?php echo (($gmwcp_exclude_out_of_stock=='yes')?'checked':'') ; ?> name="gmwcp_exclude_out_of_stock" value="yes" />
        </td>
     </tr>
        <tr valign="top"  >
            <th scope="row">
               <label for="gmpcp_exclude_category"><?php _e('Exclude From Category', 'gmpcp'); ?></label>
            </th>
            <td> 
              <?php
                $terms_cat = get_terms( 'product_cat', array(
                        'hide_empty' => false,
                    ) );
               ?>
               <select name="gmpcp_exclude_category[]" multiple  class="gmpcp-select" style="min-width: 200px;">
                 <?php
                 foreach ($terms_cat as $key_terms_cat => $value_terms_cat) {
                   echo '<option value="'.$value_terms_cat->term_id.'" '.((in_array($value_terms_cat->term_id, $gmpcp_arr['gmpcp_exclude_category']))?'selected':'').'>'.$value_terms_cat->name.'</option>';
                 }
                 ?>
                </select>
            </td>
        </tr>
        <tr valign="top"  >
            <th scope="row">
               <label for="gmpcp_exclude_category"><?php _e('Exclude From User Role', 'gmpcp'); ?></label>
            </th>
            <td> 
              <?php
                $all_roles = wp_roles()->roles;
            /*    echo "<pre>";
                print_r($all_roles);
                echo "</pre>";*/
             

               ?>
               <select name="gmpcp_exclude_role[]" multiple  class="gmpcp-select" style="min-width: 200px;">
                 <?php
                 foreach ($all_roles as $key_all_roles => $value_all_roles) {
                   $selected = in_array($key_all_roles, $gmpcp_arr['gmpcp_exclude_role'])?'selected':'';
                   echo '<option value="'.$key_all_roles.'" '.$selected.'>'.$value_all_roles['name'].'</option>';
                 }
                 ?>
                </select>
                <br/>
               <strong><em>Note: If you choose option here than role be work for only logged User</em></strong>
            </td>
        </tr>
        </table>
       <?php  submit_button(); ?>
    </form>
</div>