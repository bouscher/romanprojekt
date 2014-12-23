<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$full_salt = substr('$2a$10$3d34c49b983bab20eeba8uqotZMs4qmE74REKms2xR8vL0d1/M7k.', 0, 29);
echo($full_salt.'<br>');
$pw=crypt('credo','$2a$10$3d34c49b983bab20eeba8u');
echo($pw);
?>
