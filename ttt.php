<?php
/*
Plugin Name: Textbrowser (TTT)
Plugin URI: http://www.wp-plugin-dev.com
Description: TTT
Author: WP-Plugin-Dev.com
Version: 0.9 BETA
Author URI: http://www.wp-plugin-dev.com
License: GPL 2
Copyright (c) WP-Plugin-Dev.com
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
*/

// this might be too heavy
// add_action("init","the_ttt_process");

include "lynx-clone.php";

include "the-process.php";

function ttt_main_admin_page()
{
	$page_title = "TTT";
	$menu_title = $page_title;
	$capability = "read";
	$menu_slug = "ttt";
	add_menu_page($page_title, $menu_title, $capability, $menu_slug, 'ttt_render_main_admin__page', 'dashicons-welcome-widgets-menus');
}

// add_action("admin_menu", "ttt_main_admin_page", 203);

function ttt_render_main_admin__page()
{
	echo '<div class="wrap">';
	echo '<h2><span class="dashicons dashicons-welcome-widgets-menus"></span>TTT</h2>';
	echo '<div class="card">';
?>
<pre><?php
	the_ttt_process(true);
?></pre><?php
	echo '</div>';
	echo '</div>';
}

?>