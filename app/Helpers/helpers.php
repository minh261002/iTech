<?php

function generate_text_depth_tree($depth, $word = '|--')
{
    return str_repeat($word, $depth);
}