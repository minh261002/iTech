<?php

function generate_text_depth_tree($depth, $word = '|--')
{
    return str_repeat($word, $depth);
}

function format_datetime($datetime)
{
    $time = strtotime($datetime);
    $now = time();
    $diff = $now - $time;

    if ($diff < 60) {
        return $diff . ' giây trước';
    }

    $diff = round($diff / 60);
    if ($diff < 60) {
        return $diff . ' phút trước';
    }

    $diff = round($diff / 60);
    if ($diff < 24) {
        return $diff . ' giờ trước';
    }

    $diff = round($diff / 24);
    if ($diff < 30) {
        return $diff . ' ngày trước';
    }

    $diff = round($diff / 30);
    if ($diff < 12) {
        return $diff . ' tháng trước';
    }
}

function uniqid_real($lenght = 13)
{
    // uniqid gives 13 chars, but you could adjust it to your needs.
    if (function_exists("random_bytes")) {
        $bytes = random_bytes(ceil($lenght / 2));
    } elseif (function_exists("openssl_random_pseudo_bytes")) {
        $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
    } else {
        throw new \Exception("no cryptographically secure random function available");
    }
    return Str::upper(substr(bin2hex($bytes), 0, $lenght));
}
