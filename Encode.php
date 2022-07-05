<?php

class Encode
{

    public static function encodeimage()
    {

        // Charge le cachet et la photo afin d'y appliquer le tatouage numérique
        $stamp = imagecreatefrompng('sign.png');
        $im = imagecreatefromjpeg('photo.jpg');

        // Définit les marges pour le cachet et récupère la hauteur et la largeur de celui-ci
        $marge_right = 500;
        $marge_bottom = 500;
        $sx = imagesx($stamp);
        $sy = imagesy($stamp);

        // Copie le cachet sur la photo en utilisant les marges et la largeur de la
        // photo originale  afin de calculer la position du cachet
        imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));

        // Affichage et libération de la mémoire
        header('Content-type: image/png');
        imagepng($im);
        imagedestroy($im);

    }

}