<?php

function test_remplissage(array $post){
    foreach ($post as $element){
        if(empty($element)){
            return false;
        }
    }
    return true;
    }
