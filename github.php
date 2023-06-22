	<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */



$repo_owner = 'annentwicklung';
$repo_name = 'schmalfilmkino2023responsive';

function getFileFromGitHub($file_path) {
	global $repo_owner;
	global $repo_name;
	global $repo_token;

	$api_url = 'https://api.github.com/repos/'.$repo_owner.'/'.$repo_name.'/contents'.$file_path;

	echo $api_url;
	$curl = curl_init();
	curl_setopt_array($curl, [
    CURLOPT_URL => $api_url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        "Authorization: Bearer {$repo_token}",
        "Accept: application/vnd.github.v3.raw"
    ]
	]);

	$response = curl_exec($curl);
	$status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

	if ($status_code == 200) {
    	return $response;
	} else {
    	return $status_code;
	}
	curl_close($curl);
}

$request = $_SERVER['REQUEST_URI'];
$forward_to = str_replace('/wp-content/themes/'.$wp_theme,'',$request);


echo getFileFromGitHub($forward_to);

//eval($response);



