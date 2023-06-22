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

$wp_theme='schmalfilmkino_2023-responsive';

function getFileFromGitHub($file_path) {

}

$request = $_SERVER['REQUEST_URI'];
$forward_to = str_replace('/wp-content/themes/'.$wp_theme,'',$request);

$parts = explode('.', $forward_to);
$filetype = strtolower(end($parts));

$api_url  = 'https://raw.githubusercontent.com/annentwicklung/schmalfilmkino2023responsive/main'.$forward_to;
$response = file_get_contents($api_url);

if ($filetype=='css') header('Content-Type: text/css');
if ($filetype=='html') header('Content-Type: text/html');

echo $response;

//eval($response);



