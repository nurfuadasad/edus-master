<div class="itech-admin-wrap">
	<h1><?php esc_html_e('License Settings','edus-master');?></h1>
	<p><?php esc_html_e('License your theme to access theme demo data. without license you can do everything except import demo data.','edus-master');?></p>
    <?php
        if (get_option('edus_license_status') == 'not_verified' || empty(get_option('edus_license_status'))){
			$msg = !empty(get_option('edus_license_msg')) ? get_option('edus_license_msg') : esc_html__('License Your Theme To Import Demo Data','edus-master');
            printf('<div  class="notice notice-warning settings-error is-dismissible"><p>%1$s</p></div>',$msg);
        }else{
	        printf('<div  class="notice notice-success settings-error"><p>%1$s</p></div>',esc_html(get_option('edus_license_msg')));
        }
    ?>
    <?php if (get_option('edus_license_status') == 'not_verified' || empty(get_option('edus_license_status'))):?>
	<form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" novalidate="novalidate">
		<input type="hidden" name="action" value="edus_license_verify">
		<?php wp_nonce_field(-1,'edus_license_verify_nonce'); ?>
		<table class="form-table" role="presentation">
			<tbody><tr>
				<th scope="row"><label for="edus_purchase_code"><?php esc_html_e('Purchase Code','edus-master');?></label></th>
				<td><input name="edus_purchase_code" type="text" id="edus_purchase_code" value="<?php echo esc_attr(get_option('edus_purchase_code'));?>" class="regular-text"></td>
			</tr>
			</tbody>
		</table>
		<p class="submit">
			<input type="submit" name="submit" id="submit" class="button button-primary" value="<?php esc_attr_e('Save Changes','edus-master');?>">
		</p>
	</form>
    <?php endif;?>
</div>