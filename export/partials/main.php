<div class="wrap">
    <h2>Export</h2>
    <p class="description">
        Export products to CSV.
    </p>
    <hr>
    <form id="exportForm" method="post">
        <input type="hidden" name="action" value="woocsv_export">
		<?php echo __( 'Select a header:', 'woocommerce-csvimport' ); ?>
        <select id="header_name" name="header_name">
			<?php foreach ( $headers as $header ) : ?>
                <option value="<?php echo $header; ?>"><?php echo $header; ?></option>
			<?php endforeach; ?>
        </select>
        <button type="submit" class="button-primary">Export</button>
    </form>
    <progress style="display: none; width: 100%;" id="progressBar" min="0" max="<?php echo $max; ?>" value="0"/>
</div>


<h2>Previous export files</h2>
<table class="widefat">
	<?php foreach ( $files as $file ) : ?>
        <tr>
            <td>
                <a target="_blank"
                   href="<?php echo $upload_dir[ 'baseurl' ] . '/' . basename( $file ) ?>">
					<?php echo basename( $file ) ?>
                </a>
            </td>
            <td>
                <a id=href="" class="delete" href="#" data-file-name="<?php echo basename( $file ); ?>">
                    delete
                </a>
            </td>
        </tr>
	<?php endforeach ?>
</table>
