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

function test_remplissage(){
    if(!empty($_POST['nom_domicile'])&&!empty($_POST['numero']) && !empty($_POST['rue']) && !empty($_POST['postal']) && !empty($_POST['pays'])&& !empty($_POST['nbre_piece'])&& !empty($_POST['superficie'])){
        return True;
    }
    return False;
}
