<?php

function htmlspe(array $post){
    foreach ($post as $element){
        $element = htmlspecialchars($element);
    }
    return $element;
}