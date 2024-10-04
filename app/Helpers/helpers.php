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