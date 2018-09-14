
<?php

// Webhook try for the screenshot bot
// needed for all things now..

add_action('rest_api_init',
function ()
{
	register_rest_route('screenshot/v1', '/{your-secret-url}', array(
		'methods' => 'POST',
		'callback' => 'run_the_screenshot_bot',
	));
});

function run_the_screenshot_bot($request)
{
	$token = '{your-telegram-bot-token}';
	$photo_url = "https://api.telegram.org/bot" . $token . "/sendPhoto";
	$url = "https://api.telegram.org/bot" . $token . "/SendMessage";
	$param = $request["body"];
	$parameters = $request->get_json_params();

	// Or via the helper method:
	// $param = $request->get_param( 'some_param' );

	$update = $data;
	$chat_id = $parameters['message']['chat']['id'];
	$text = $parameters['message']['text'];
	$text = str_replace('@snapshot_bot', '', $text);
	if (strpos('/help', $text) === 0)
	{
		$helptext = "Help of the Snapshot Bot. If you are connected directly with the chat " . "you don't need to put in any command and type the URL directly, " . "if the bot is part of a group " . "you need to use /snapshot http://example.com. " . "A snapshot can take a little longer as this is dependent on an external service.";
		ttt_curl($helptext, 'John', $chat_id, $url);
	}
	else
	if (strpos('/start', $text) === 0)
	{
		$starttext = "Welcome to the snapshot bot. The snapshot bot is an instance " . "taking snapshots of websites. Type /help to know how it is working.";
		ttt_curl($starttext, 'John', $chat_id, $url);
	}
	else
	if ($chat_id < 0)
	{
		$url = str_replace("/snapshot ", "", $text);
		ttt_curl_photo_thumbnailws($url, $chat_id, $photo_url);
	}
	else
	if ($chat_id > 0)
	{
		$url = $text;
		$url = str_replace("/snapshot ", "", $url);
		ttt_curl_photo_thumbnailws($url, $chat_id, $photo_url);
	}

	return '{OK}';
}

// Webhook set stuff, only once
// add_action( 'rest_api_init', function () {
//  register_rest_route( 'screenshot/v1', '/setwebhook', array(
//   'methods' => 'GET'
//   , 'callback' => 'set_weebhook_for_telegram_botte',
//  ) );
// } );
//
// add_action( 'rest_api_init', function () {
//  register_rest_route( 'screenshot/v1', '/webhookinfo', array(
//   'methods' => 'GET'
//   , 'callback' => 'weebhookinfo_for_telegram_botte',
//  ) );
// } );
//
// add_action( 'rest_api_init', function () {
//  register_rest_route( 'screenshot/v1', '/webhookupdates', array(
//   'methods' => 'GET'
//   , 'callback' => 'weebhookupdates_for_telegram_botte',
//  ) );
// } );

function set_weebhook_for_telegram_botte()
{
	$webhook_address = "{your-secret-url}";
	$token = '{your-telegram-bot-token}';
	$url = 'https://api.telegram.org/bot' . $token . '/setWebhook';
	$fields = array(
		'url' => urlencode($webhook_address) ,
	);

	// url-ify the data for the POST

	foreach($fields as $key => $value)
	{
		$fields_string.= $key . '=' . $value . '&';
	}

	rtrim($fields_string, '&');

	// open connection

	$ch = curl_init();

	// set the url, number of POST vars, POST data

	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, count($fields));
	curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_MAXREDIRS, 1);
	curl_setopt($ch, CURLOPT_USERAGENT, 'Telegram Text Browser; Debian;');

	// execute post

	$result = curl_exec($ch);

	// close connection

	curl_close($ch);
	return $result;
}

//
// function weebhookinfo_for_telegram_botte()
// {
//
//  $token = '';
//  $url = 'https://api.telegram.org/bot'.$token.'/getWebhookInfo';
//  $fields = array(
//
//      );
//
//      //url-ify the data for the POST
//      foreach
//      ($fields as $key=>$value)
//       { $fields_string .= $key.'='.$value.'&';
//      }
//      rtrim($fields_string, '&');
//
//      //open connection
//      $ch = curl_init();
//      //set the url, number of POST vars, POST data
//      curl_setopt($ch, CURLOPT_URL, $url);
//      curl_setopt($ch, CURLOPT_POST, count($fields));
//      curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
//      curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
//      curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
//      curl_setopt($ch, CURLOPT_MAXREDIRS,1);
//      curl_setopt($ch, CURLOPT_USERAGENT,'Telegram Text Browser; Debian;');
//      //execute post
//      $result = curl_exec($ch);
//
//      //close connection
//      curl_close($ch);
//
//      return $result;
//
// }
//
// function weebhookupdates_for_telegram_botte()
// {
//
//  $token = '';
//  $url = 'https://api.telegram.org/bot'.$token.'/getWebhookUpdates';
//  $fields = array(
//
//      );
//
//      //url-ify the data for the POST
//      foreach
//      ($fields as $key=>$value)
//       { $fields_string .= $key.'='.$value.'&';
//      }
//      rtrim($fields_string, '&');
//
//      //open connection
//      $ch = curl_init();
//      //set the url, number of POST vars, POST data
//      curl_setopt($ch, CURLOPT_URL, $url);
//      curl_setopt($ch, CURLOPT_POST, count($fields));
//      curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
//      curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
//      curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
//      curl_setopt($ch, CURLOPT_MAXREDIRS,1);
//      curl_setopt($ch, CURLOPT_USERAGENT,'Telegram Text Browser; Debian;');
//      //execute post
//      $result = curl_exec($ch);
//
//      //close connection
//      curl_close($ch);
//
//      return 'abs'.$result;
//
// }
//

?>