<?php
add_action('rest_api_init',
function ()
{
	register_rest_route('textbrowser/v2', '/', array(
		'methods' => 'POST',
		'callback' => 'the_ttt_process',
	));
});

function the_ttt_process($request)
{
	$output = false;

	// $update_id_for_all = file_get_contents ( 'last_telegram_update.txt');
	// 	$filename = "last_telegram_update.txt";
	// 	$handle = fopen($filename, "rb");
	// 	$update_id_for_all  = fread($handle, filesize($filename));
	// 	fclose($handle);

	$param = $request["body"];
	$parameters = $request->get_json_params();

	// update_option('last_botte',$parameters);

	$update_id_for_all = get_option('telegram_update_id_for_all', true);

	// WORDPRESS ENDS HERE

	$url = "https://api.telegram.org/{your-bot-token}/SendMessage?chat_id=why&text=23jahee";
	$uurl = "https://api.telegram.org/{your-bot-toke}/getUpdates?offset=" . $update_id_for_all;
	$purl = "https://api.telegram.org/{your-bot-toke}/SendMessage";
	$photo_url = "https://api.telegram.org/{your-bot-toke}/sendPhoto";

	// Works in terminal
	// curl -X POST 'https://api.telegram.org/{your-bot-token}/SendMessage?chat_id={chat_id}&text="way down jkl8"'
	// $reps= json_decode(file_get_contents($uurl));

	$reps = $parameters;
	$mess = $reps;
	if ($output) print_r($mess);
	$update_id = $mess['update_id'];
	$chat_id = $mess['message']['chat']['id'];
	$first_name = $mess['message']['chat']['first_name'];
	$text = $mess['message']['text'];
	$username = $mess['message']['chat']['username'];
	$added_to_group = $mess['message']['new_chat_participant']['username'];
	if ($output) echo "<br />";
	if ($output) echo $update_id . " " . $chat_id . " " . $first_name . " " . $text . "<br />";

	// *________________________________________________________

	$text = str_replace('@Textbrowser_bot', '', $text);
	if ($text == '/link_shortcode')
	{
		$website = drilldown_html_to_telegram('http://textbrowser.ga/shortcode');
		ttt_curl($website, $first_name, $chat_id, $purl);
	}
	else
	if ($text == '/link_news')
	{
		$website = drilldown_html_to_telegram('http://textbrowser.ga/news');
		$website_text_divided = str_split($website, 4000);
		foreach($website_text_divided as $wtd)
		{
			ttt_curl($wtd, $first_name, $chat_id, $purl);
		}
	}
	else
	if (strpos($text, '/search ') === 0)
	{
		$query = str_replace("/search ", "", $text);
		$query = str_replace(" ", "+", $query);
		$query = urlencode($query);
		$website = drilldown_html_to_telegram('https://duckduckgo.com/html/?q=' . $query);
		if (function_exists('wp_get_googlelink'))
		{
			$website = preg_replace_callback('|\[(https?://[\d\w\.-]+\.[\w]{2,6}/?[\S]*)\]|i',
			function ($link)
			{
				return '[/link_' . last_part_of_google_shortlink($link[1]) . ']';
			}

			, $website);
		}
		else
		{
			/*
			* This is once again the mega function from @der_kronn, I don't have any clue.
			* THANK YOU SO MUCH
			*/
			$website = preg_replace_callback('|\[(https?://[\d\w\.-]+\.[\w]{2,6}/?[\S]*)\]|i',
			function ($link)
			{
				return '[/link_' . base64_encode($link[1]) . ']';
			}

			, $website);
		}

		$website_text_divided = str_split($website, 4000);
		ttt_curl($website_text_divided[0], $first_name, $chat_id, $purl);
	}
	else
	if (strpos($text, '/comment ') === 0)
	{
		$comment = str_replace("/comment ", "", $text);
		$time = current_time('mysql');
		$data = array(
			'comment_post_ID' => 65,
			'comment_author' => $first_name,
			'comment_author_email' => '@' . $username,
			'comment_content' => $comment,
			'comment_author_url' => $chat_id,
			'comment_agent' => 'Telegram Text Browser',
			'comment_date' => $time,
			'comment_approved' => 0,
		);
		wp_insert_comment($data);
		ttt_curl("Thank you " . $first_name . " for your feedback.", $first_name, $chat_id, $purl);
	}
	else
	if ($text == '/link_textbrowser' || $text == '/about')
	{
		$website = drilldown_html_to_telegram('http://textbrowser.ga/textbrowser');
		ttt_curl($website, $first_name, $chat_id, $purl);
	}
	else
	if ($text == '/start')
	{
		$website = drilldown_html_to_telegram('http://textbrowser.ga/');
		ttt_curl($website, $first_name, $chat_id, $purl);
	}
	else
	if ($text == '/help')
	{
		$website = drilldown_html_to_telegram('http://textbrowser.ga/help');
		ttt_curl($website, $first_name, $chat_id, $purl);
	}
	else
	if (strpos($text, '/url ') === 0 || strpos($text, '/link_') === 0)
	{
		$url = str_replace('/url ', '', $text);
		if (strpos($url, "https://") === FALSE && strpos($url, "http://") === FALSE && strpos($text, '/link_') === false)
		{
			$url = 'http://' . $url;

			// $url = str_replace("////",$url);

		}

		if (strpos($text, '/link_') === 0)
		{
			$url = str_replace('/link_', '', $text);
			if (function_exists('wp_get_googlelink'))
			{
				$url = reverse_link_part_of_google_shortlink($url);
			}
			else
			{
				$url = base64_decode($url);
				$parts = explode("//", $url);
				$url = "http://" . $parts[1];
			}
		}

		$website = drilldown_html_to_telegram($url);
		if (function_exists('wp_get_googlelink'))
		{
			$website = preg_replace_callback('|\[(https?://[\d\w\.-]+\.[\w]{2,6}/?[\S]*)\]|i',
			function ($link)
			{
				return '[/link_' . last_part_of_google_shortlink($link[1]) . ']';
			}

			, $website);
		}
		else
		{
			/*
			* This is once again the mega function from @der_kronn, I don't have any clue.
			* THANK YOU SO MUCH
			*/
			$website = preg_replace_callback('|\[(https?://[\d\w\.-]+\.[\w]{2,6}/?[\S]*)\]|i',
			function ($link)
			{
				return '[/link_' . base64_encode($link[1]) . ']';
			}

			, $website);
		}

		$website_text_divided = str_split($website, 4000);
		foreach($website_text_divided as $wtd)
		{
			ttt_curl($wtd, $first_name, $chat_id, $purl);
		}
	}
	else
	if (strpos($text, '/screenshot ') !== false)
	{
		ttt_curl("Screenshot is not part of this, although it was in planned. Please head over to @snapshot_bot!", $first_name, $chat_id, $purl);
	}
	else
	if ($added_to_group == 'Textbrowser_bot')
	{
		$website = drilldown_html_to_telegram('http://textbrowser.ga/group-add');
		ttt_curl($website, $first_name, $chat_id, $purl);
	}
	else
	{
		if ($chat_id > 0)
		{
			$website = drilldown_html_to_telegram('http://textbrowser.ga/not-recognized');
			ttt_curl($website, $first_name, $chat_id, $purl);
		}
	}

	// *__________________________________________________________

	$update_id_for_all = $update_id;

	// WORDPRESS FUNKTION

	update_option('telegram_update_id_for_all', ($update_id + 1) , false);
	return "[restroute available]";
}

function last_part_of_google_shortlink($url)
{

	// 	if(strpos($url, "https://") == FALSE && strpos($url, "http://") == FALSE && strpos($text, '/link_') === false )
	// 	{
	// 		$url = 'http://'.$url;
	// 	}

	$link = wp_get_googlelink($url);
	$link = str_replace("https://goo.gl/", "", $link);
	return $link;
}

function reverse_link_part_of_google_shortlink($text)
{
	$link = "https://goo.gl/" . $text;
	return $link;
}

?>