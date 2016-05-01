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
?>

<div class="wrap">

	<h1>
		<?php echo esc_html( get_admin_page_title() ); ?>
		<a href="<?php echo admin_url( 'admin.php?page=' . $this->plugin_slug . '-entry-add' ) ?>" class="page-title-action"><?php _e('Add New','simple-products-importer');?></a>
	</h1>


	<form id="simple-products-importer-filter" method="post">

		<input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>">

		<?php $simple_products_importer_list_table->display(); ?>

	</form>

</div>
