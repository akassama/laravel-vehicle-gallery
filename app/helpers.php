<?php

//To generate a session ID
function generateSessionID()
{
    #default session id randomly generated
    $length = 100;
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz@ABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$&"), 0, $length);
}

//Get summary text
function getSummaryText($article_text, $length){

    $matches = array(); // declare array
    //If it matches as a paragraph in the string
    if (preg_match('#<p(.*?)</p>#', $article_text, $matches)) {
        //var_dump($matches); //Dump to see array of string
        $original_text= $matches[0];
        $raw_paragraph = $matches[1];
        //For the case a paragraph may contain a class, we used <p and not <p>
        //Get everything '<p' and '</p>', then remove every thing up to the first '>' character
        $paragraph = ltrim(strstr($raw_paragraph, '>'), '>');
        //If text longer than 250 characters, trim and add '...'' to it
        if (strlen($paragraph) > $length){
            $paragraph = substr($paragraph,0,$length).".....";
        }
        return $paragraph;
    }
    else{
        if (strlen($article_text) > $length){
            $article_text = substr($article_text,0,$length).".....";
        }
        return $article_text;
    }
}
