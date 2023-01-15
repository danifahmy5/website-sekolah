<?php


function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

if (!function_exists('profile')) {

    function profile()
    {

        return App\Models\Profile::first();
    }
}
if (!function_exists('article')) {
    function article()
    {
        return App\Models\Article::inRandomOrder()
            ->limit(2)
            ->get();
    }
}
