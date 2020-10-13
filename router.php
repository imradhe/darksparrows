<?php


$request = $_SERVER['REQUEST_URI'];

   // echo $request;
    $url = '/DarkSparrows2.0/v1';

switch ($request) {
    case $url.'/' :
        require('views/index.php');
        break;

        
        //Routes for Members 
    case $url.'/register':
        require('views/members/register.php');
        break;
    case $url.'/account/new':
        require('views/members/accounts/new.php');
        break;
    case $url.'/verify':
        require('views/members/verify.php');
        break;
    case $url.'/login':
        require('views/members/login.php');
        break;
    case $url.'/logout':
        require('views/members/logout.php');
        break;


        //Routes For Dashboard 
    case $url.'/dashboard/home':
        require('dashboard/index.php');
        break;
        


        //Routes for Profiles
        case $url.'/profile/new' :
        require('views/profiles/new.php');
        break;
        case $url.'/profile/view' :
        require('views/profiles/view.php');
        break;
        case $url.'/profile/edit' :
        require('views/profiles/edit.php');
        break;

    case $url.'/about' :
        require('views/about.php');
        break;
    default:
        http_response_code(404);
        require('views/404.php');
        break;
}