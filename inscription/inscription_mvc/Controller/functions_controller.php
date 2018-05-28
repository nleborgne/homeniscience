<?php

function htmlspe(array $post){
        $post['nom'] = htmlspecialchars($post['nom']);
        $post['prenom'] = htmlspecialchars($post['prenom']);
        $post['email'] = htmlspecialchars($post['email']);
        $post['verif_email'] = htmlspecialchars($post['verif_email']);
        $post['mdp'] = htmlspecialchars($post['mdp']);
        $post['verif_password'] = htmlspecialchars($post['verif_password']);
    return $post;
}

function test_equal(array $post){
    if(($post['email'] == $post['email-confirm']) || ($post['mdp'] == $post['mdp-confirm'])){
        return false;
    }
    return true;
}

function test_remplissage(array $post){
    if(!empty($post['nom']) && !empty($post['prenom']) && !empty($post['email']) && !empty($post['mdp'])){
        return True;
    }
    return False;
}
