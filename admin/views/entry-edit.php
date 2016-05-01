<?php
/**
 * Simple Products Importer.
 *
 * @package   Simple_Products_Importer_List
 * @author    Oscar Salazar
 * @license   GPL-2.0+
 * @link      https://github.com/raczosala/
 * @copyright 2016 Oscar Salazar
 */
?>

<?php
/**
*-----------------------------------------
* Do not delete this line
* Added for security reasons: http://codex.wordpress.org/Theme_Development#Template_Files
*-----------------------------------------
*/
defined('ABSPATH') or die("Direct access to the script does not allowed");


$page_title = 'Add New Entry';
$message_updated_title = 'Entry has been saved!';
if($_GET['id']){
	$page_title = 'Edit Entry';
	$message_updated_title = 'Entry has been updated!';
}
?>


<div class="wrap">
	<div class="updated"><p><?php _e($message_updated_title, 'simple-products-importer');?></p></div>

	<h2>
		<a href="<?php echo admin_url( 'admin.php?page=' . $this->plugin_slug . '-entries-view' ) ?>" class="page-title-action">&larr; <?php _e('Back','simple-products-importer');?></a>
		<?php _e($page_title, 'simple-products-importer') ?>
	</h2>


	<div id="poststuff">

		<div id="post-body" class="metabox-holder columns-1">

			<!-- main content -->
			<div id="post-body-content">


				<div class="meta-box-sortables ui-sortable">

					<div class="postbox">

						<div class="inside">
							<p><?php _e('Edit entry form goes here', 'simple-products-importer');?></p>

						</div><!-- .inside -->

					</div><!-- .postbox -->

				</div><!-- .meta-box-sortables .ui-sortable -->

			</div><!-- post-body-content -->


		</div><!-- #post-body .metabox-holder .columns-1 -->

		<br class="clear">
	</div><!-- #poststuff -->


</div><!-- .wrap -->
