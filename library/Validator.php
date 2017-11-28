<?php
class Validator
{
    public static function validUsername($name, $min = 4, $max = 30)
    {
        if (preg_match('/[a-zA-Z0-9]{' . $min . ',' . $max . '}/', $name)) {
            return true;
        }
        return false;
    }
    
    // on supprime les espaces dans la variable $password
    // on compte le nombre de caractere
    // si le $password est inférieur à 6 ou est supérieur à 12 alors il est invalide
    // sinon il est valide
    public static function validPassword($password)
    {
        $len = strlen(trim($password));
        return !($len < 6 || $len > 30);
    }
}