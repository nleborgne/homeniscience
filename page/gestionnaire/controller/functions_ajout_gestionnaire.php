<?php

function htmlspe($post)
{
    $post['numero'] = htmlspecialchars($post['numero']);
    $post['rue'] = htmlspecialchars($post['rue']);
    $post['postal'] = htmlspecialchars($post['postal']);
    $post['pays'] = htmlspecialchars($post['pays']);
    $post['nbre_piece'] = htmlspecialchars($post['nbre_piece']);
    $post['superficie'] = htmlspecialchars($post['superficie']);
    return $post;
}

function test_remplissage(array $post){
    if(!empty($post['numero']) && !empty($post['rue']) && !empty($post['postal']) && !empty($post['pays'])&& !empty($post['nbre_piece'])&& !empty($post['superficie'])){
        return True;
    }
    return False;
}
