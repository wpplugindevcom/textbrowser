<?php
/*
Plugin Name: Textbrowser Webhooks
Description: 
Author: wp-plugin-dev.com
Version: 0.1
License: GPL2
Copyright (c) 2015 wp-plugin-dev.com

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

 */
 
// Webhook try for the screenshot bot
// needed for all things now..

// 
// add_action( 'rest_api_init', function () {
// 	register_rest_route( 'textbrowser/v2', '/{your-secret-url}', array(
// 		'methods' => 'POST',
// 		'callback' => 'run_the_screenshot_bot',
// 	) );
// } );
// 
// 





//Webhook set stuff, only once
// add_action( 'rest_api_init', function () {
// 	register_rest_route( 'textbrowser/v1', '/setwebhook', array(
// 		'methods' => 'GET'
// 		,	'callback' => 'set_weebhook_for_telegram_botte_textbrowser',
// 	) );
// } );
// 
// add_action( 'rest_api_init', function () {
// 	register_rest_route( 'screenshot/v1', '/webhookinfo', array(
// 		'methods' => 'GET'
// 		,	'callback' => 'weebhookinfo_for_telegram_botte',
// 	) );
// } );
// 
// add_action( 'rest_api_init', function () {
// 	register_rest_route( 'screenshot/v1', '/webhookupdates', array(
// 		'methods' => 'GET'
// 		,	'callback' => 'weebhookupdates_for_telegram_botte',
// 	) );
// } );
// 
// 
function set_weebhook_for_telegram_botte_textbrowser()
{
	$webhook_address = "{your-secret-webhook-url}";

	$token = '{your-bot-token}';
	$url = 'https://api.telegram.org/bot'.$token.'/setWebhook';
	$fields = array(
						'url' => urlencode($webhook_address),
					);

					//url-ify the data for the POST
					foreach
					($fields as $key=>$value)
						{ $fields_string .= $key.'='.$value.'&';
					}
					rtrim($fields_string, '&');

					//open connection
					$ch = curl_init();
					//set the url, number of POST vars, POST data
					curl_setopt($ch, CURLOPT_URL, $url);
					curl_setopt($ch, CURLOPT_POST, count($fields));
					curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
					curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
					curl_setopt($ch, CURLOPT_MAXREDIRS,1);
					curl_setopt($ch, CURLOPT_USERAGENT,'Telegram Text Browser; Debian;');
					//execute post
					$result = curl_exec($ch);

					//close connection
					curl_close($ch);
					
					return $result;
	
}
// 
// function weebhookinfo_for_telegram_botte()
// {
// 
// 	$token = '{your-bot-token}';
// 	$url = 'https://api.telegram.org/bot'.$token.'/getWebhookInfo';
// 	$fields = array(
// 						
// 					);
// 
// 					//url-ify the data for the POST
// 					foreach
// 					($fields as $key=>$value)
// 						{ $fields_string .= $key.'='.$value.'&';
// 					}
// 					rtrim($fields_string, '&');
// 
// 					//open connection
// 					$ch = curl_init();
// 					//set the url, number of POST vars, POST data
// 					curl_setopt($ch, CURLOPT_URL, $url);
// 					curl_setopt($ch, CURLOPT_POST, count($fields));
// 					curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
// 					curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
// 					curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
// 					curl_setopt($ch, CURLOPT_MAXREDIRS,1);
// 					curl_setopt($ch, CURLOPT_USERAGENT,'Telegram Text Browser; Debian;');
// 					//execute post
// 					$result = curl_exec($ch);
// 
// 					//close connection
// 					curl_close($ch);
// 					
// 					return $result;
// 	
// }
// 
// function weebhookupdates_for_telegram_botte()
// {
// 
// 	$token = '{your-bot-token}';
// 	$url = 'https://api.telegram.org/bot'.$token.'/getWebhookUpdates';
// 	$fields = array(
// 						
// 					);
// 
// 					//url-ify the data for the POST
// 					foreach
// 					($fields as $key=>$value)
// 						{ $fields_string .= $key.'='.$value.'&';
// 					}
// 					rtrim($fields_string, '&');
// 
// 					//open connection
// 					$ch = curl_init();
// 					//set the url, number of POST vars, POST data
// 					curl_setopt($ch, CURLOPT_URL, $url);
// 					curl_setopt($ch, CURLOPT_POST, count($fields));
// 					curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
// 					curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
// 					curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
// 					curl_setopt($ch, CURLOPT_MAXREDIRS,1);
// 					curl_setopt($ch, CURLOPT_USERAGENT,'Telegram Text Browser; Debian;');
// 					//execute post
// 					$result = curl_exec($ch);
// 
// 					//close connection
// 					curl_close($ch);
// 					
// 					return 'abs'.$result;
// 	
// }
// 


 
 ?>