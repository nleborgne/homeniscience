<?php

function test_equal(array $post){
    if(($post['email'] == $post['email-confirm']) || ($post['mdp'] == $post['mdp-confirm'])){
        return false;
    }
    return true;
}