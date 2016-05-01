<?php
/**
 * Right sidebar for settings page
 *
 * @package   Simple_Products_Importer_Admin
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


<div id="postbox-container-1" class="postbox-container sidebar-right">
  <div class="meta-box-sortables">
    <div class="postbox">
      <h3><span><?php esc_attr_e('Get help','simple-products-importer');?></span></h3>
      <div class="inside">
        <div>
          <ul>
            <li><a class="no-underline" target="_blank" href="https://github.com/raczosala/simple-products-importer.git"><span class="dashicons dashicons-admin-home"></span> <?php esc_attr_e( 'Plugin Homepage', 'simple-products-importer' );?></a></li>
          </ul>
        </div>
        <div class="sidebar-footer">
          &copy; <?php echo date('Y');?> <a class="no-underline text-highlighted" href="https://github.com/raczosala/" title="Oscar Salazar" target="_blank">Oscar Salazar</a>
        </div>
      </div>
    </div>
  </div>
</div>
