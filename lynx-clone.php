<?php

include("Html2Text.php");

	function drilldown_html_to_telegram($url)
	{

	//$contents = file_get_contents($url);

        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, $url);

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 10);
		curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
		curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/3.0 (Macintosh; I; PPC)');
		curl_setopt($ch, CURLOPT_HTTPGET, true);

        // $output contains the output string
        $contents= curl_exec($ch);

        //got current as base url.
        $last_url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
        
        // close curl resource to free up system resources
        curl_close($ch);      
        
        
 		
		$html = new \Html2Text\Html2Text($contents);
		$url_parts = parse_url($last_url);
		$baseurl = $url_parts['scheme']."://".$url_parts['host'];
		$html->setBaseUrl($baseurl);


		return $html->getText(); // $html->getText();  // Hello, "WORLD"
		
	}

	function ttt_curl($text,$first_name,$chat_id,$url)
	{
	
					
	
					$fields = array(
						'chat_id' => urlencode($chat_id),
						'text' => urlencode( $text ),
						'disable_notification' => true,
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
					curl_setopt($ch, CURLOPT_FOLLOWLOCATION,10);
					curl_setopt($ch, CURLOPT_MAXREDIRS,10);
					curl_setopt($ch, CURLOPT_USERAGENT,'Telegram Text Browser; Debian;');
					//execute post
					$result = curl_exec($ch);

					//close connection
					curl_close($ch);
	
	
	}

  ?>