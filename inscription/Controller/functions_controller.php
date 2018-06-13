<?php

function htmlspe(array $post){
        $post['nom'] = htmlspecialchars($post['nom']);
        $post['prenom'] = htmlspecialchars($post['prenom']);
        $post['email'] = htmlspecialchars($post['email']);
        $post['email_verif'] = htmlspecialchars($post['email_verif']);
        $post['mdp'] = htmlspecialchars($post['mdp']);
        $post['mdp_verif'] = htmlspecialchars($post['mdp_verif']);
    return $post;
}

function test_equal(array $post){
    if(($post['email'] == $post['email_verif']) || ($post['mdp'] == $post['mdp_verif'])){
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

function test_double(){
    if($_POST['email'] != $_POST['email_verif'] || $_POST['mdp'] != $_POST['mdp_verif']){
        return false;
    }
    return true;
}

function test_mdp(){
    $password = $_POST['mdp'];
    if(strlen($password)<6){
        return false;
    }
    else if(preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])#', $password)){
        return true;
    }
    else {
        return false;
    }
}