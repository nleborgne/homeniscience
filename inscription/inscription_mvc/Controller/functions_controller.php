<?php

function htmlspe(array $post){
        $post['nom'] = htmlspecialchars($post['nom']);
        $post['prenom'] = htmlspecialchars($post['prenom']);
        $post['email'] = htmlspecialchars($post['email']);
        $post['email_confirm'] = htmlspecialchars($post['email_confirm']);
        $post['mdp'] = htmlspecialchars($post['mdp']);
        $post['mdp-confirm'] = htmlspecialchars($post['mdp-confirm']);
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
