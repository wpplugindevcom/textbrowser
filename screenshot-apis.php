<?php
		
	function ttt_curl_photo_by_wordpress($url,$chat_id,$photo_url)
	{
	
					$screen = $url;
					$url = $photo_url;
					
	
					$fields = array(
						'chat_id' => urlencode($chat_id),
						'photo' => "https://s0.wordpress.com/mshots/v1/" . urlencode( esc_url( $screen ) ),
						'disable_notification' => true,
						'caption' => $screen,
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
	
	
	}		
		
function ttt_curl_photo($url,$chat_id,$photo_url)
	{
	
					$screen = $url;
					$url = $photo_url;
					$secret_keyword = "";
 	
 					$photo = 'https://api.screenshotlayer.com/api/capture?access_key=&url='.urlencode($screen) .'&format=JPG&&secret_key='.md5($screen.$secret_keyword);
 					var_dump($photo);
					$fields = array(
						'chat_id' => urlencode($chat_id),
						'photo' => $photo,
						'disable_notification' => true,
						'caption' => $screen.' by screenshotlayer',
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
	
	}	

// 
function ttt_curl_photo_thumbnailws($url,$chat_id,$photo_url)
	{
	
					$screen = $url;
					$url = $photo_url;

					// if(strpos($screen, 'http') ===false)
// 					{
// 						$screen = 'http://'.$screen;
// 					}
 	
 					$photo = home_url().'/wp-content/plugins/textbrowser/photo.php?url='.$screen.'&uniq='.current_time('U');
					$fields = array(
						'chat_id' => urlencode($chat_id),
						'photo' => $photo,
						'disable_notification' => true,
						'caption' => $screen,
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
	
	}	

function ttt_curl_photo_freedomainapi($url,$chat_id,$photo_url)
	{
	
					$screen = $url;
					$url = $photo_url;
					$token = '';
 	
 					$photop = json_decode('http://api.whoapi.com/?domain='.str_replace('http://','',str_replace('https://','',$screen)).'&apikey='.$token.'&r=screenshot');
					$photo = $photop['full_size'];
					$fields = array(
						'chat_id' => urlencode($chat_id),
						'photo' => $photo,
						'disable_notification' => true,
						'caption' => $screen.' by freedomainapi',
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
	
	}	

function ttt_curl_photo_thumbalizr($url,$chat_id,$photo_url)
	{
	
					$screen = $url;
					$url = $photo_url;

 	
 					$photo = 'http://api.thumbalizr.com/?url='.urlencode($screen).'&width=1000';
					$fields = array(
						'chat_id' => urlencode($chat_id),
						'photo' => $photo,
						'disable_notification' => true,
						'caption' => $screen.' by thumbalizr',
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
	
	}	
	
function ttt_curl_photo_page2html($url,$chat_id,$photo_url)
	{
	
					$screen = $url;
					$url = $photo_url;

 	
 					$photo_process = json_decode('http://api.page2images.com/restfullink?p2i_url='.$screen.'&p2i_device=6&p2i_screen=1024x768&p2i_imageformat=jpg&p2i_key=');
 					$photo = file_get_contents($photo_process['image_url']);
 					
					$fields = array(
						'chat_id' => urlencode($chat_id),
						'photo' => $photo,
						'disable_notification' => true,
						'caption' => $screen.' by page2html',
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
	
	}	
	

function screenshotlayer($url, $args) {

  // set access key
  $access_key = "";
  
  // set secret keyword (defined in account dashboard)
  $secret_keyword = " ";

  // encode target URL
  $params['url'] = urlencode($url);

  $params += $args;

  // create the query string based on the options
  foreach($params as $key => $value) { $parts[] = "$key=$value"; }

  // compile query string
  $query = implode("&", $parts);

  // generate secret key from target URL and secret keyword
  $secret_key = md5($url . $secret_keyword);

  return "https://api.screenshotlayer.com/api/capture?access_key=$access_key&secret_key=$secret_key&$query";

}



?>