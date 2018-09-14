<?php

function snapshot_main_admin_page()
{
	$page_title="snapshot-bot";
	$menu_title=$page_title;
	$capability="read";
	$menu_slug="Snapshot Bot";

	add_menu_page ( $page_title, $menu_title, $capability, $menu_slug, 'snapshot_render_main_admin__page', 'dashicons-welcome-widgets-menus');

}

//add_action("admin_menu", "snapshot_main_admin_page", 203);


function snapshot_render_main_admin__page()
{

 $token = '{your-bot-token}';
 $photo_url = "https://api.telegram.org/bot".$token."/sendPhoto";
 
echo '<div class="wrap"><h3>snapshot bot interface</h3><div class="card"><pre>';
var_dump(get_option("current_webhook_stuff", false));
echo '</pre></div></div>';

}
?>