<?php

require "vendor/autoload.php";

use GuzzleHttp\Client;

function getHome(){
    $token = '90f1d095a0b8e20f9fa134fcceb7d4b9b92b6f56f5398a08a8cc46643ee8ecec5bb6cc99b27db6dcee3f5064ae4a83c31324cb83b0faac71854c9f81acfb3eced5ac4b780b6e44aa948f579597dfe6401744050689fa9afd32a8bac6b51ca730e959fd412b9dcf56297b1a45cee696e1c14657e8cd628619c088abc679cc6ece';

    $client = new Client([
        'base_uri' => 'http://localhost:1337/api/',
    ]);

    $response = $client->request('GET', 'home', [
        'headers' => [
            'Authorization' => 'Bearer ' . $token,        
            'User-Agent' => 'testing/1.0',
            'Accept'     => 'application/json',
            'X-Foo'      => ['Bar', 'Baz']
        ]
    ]);

    $body = $response->getBody();
    $decoded_response = json_decode($body);
    return $decoded_response;
}

echo "<pre>";
$home= getHome();
$data = $home->data;

$header_logo = $data->attributes->headerLogo;
$hero_title = $data->attributes->heroSection->title;
$hero_description = $data->attributes->heroSection->description;
$hero_button_text = $data->attributes->heroSection->buttonText;
$footer_logo = $data->attributes->footerLogo;
$footer_slogan = $data->attributes->footerSlogan;

// foreach($data->attributes->featuredProducts as $featured_products){
//     echo $featured_products->image;
//     echo $featured_products->name;
//     echo $featured_products->stars;
//     echo $featured_products->price;
// }

// foreach($data->attributes->latestProducts as $latest_products){
//     echo $latest_products->image;
//     echo $latest_products->name;
//     echo $latest_products->stars;
//     echo $latest_products->price;
// }

// foreach($data->attributes->testimonials as $testimonials){
//     echo $testimonials->testimonial;
//     echo $testimonials->stars;
//     echo $testimonials->picture;
//     echo $testimonials->name;
// }
?>



