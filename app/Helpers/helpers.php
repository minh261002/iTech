<?php

function generate_text_depth_tree($depth, $word = '|-')
{
    $text = '';
    if ($depth > 0) {
        for ($i = 0; $i < $depth; $i++) {
            $text .= $word;
        }
    }
    return $text;
}