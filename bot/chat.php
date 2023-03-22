<?php
include "Bot.php";
$bot = new Bot;
$questions = [
    //name
    "como te llamas?" =>"Soy OptimusBot y estoy para servirte",
    "cual es tu nombre?" =>"Soy OptimusBot y estoy para servirte",
    "tienes nombre?" =>"Soy OptimusBot y estoy para servirte",


    //saludo
    "hola","buenos dias","buenas tardes" =>"Hola que tal!",
    "buenas noches" =>"Hola que tal!",
    "k ase" => "kcdic",
    "un saludo" =>"como te va",
    "hello" =>"un gusto de verte",
    "Donde te crearon" =>"en Algar-Tech",
 
    //despedida
    "adios" =>"cuidate",
    "hasta la proxima" =>"nos vemos pronto",
    "nos vemos" =>"te estare esperando",
    "bye" =>"Good bye ♥",
    "Gracias","gracias" =>"Ha sido un placer ayudarte ♥",
    //
    "what is your name?" =>" my name is OptimusBot",
    //
    "what is your name" =>" my name is OptimusBot",
    //
    "Buenas","buenas" =>" ¡Buenas!",    
    //
    "ola k ase" =>" te respondo o k ase",

    //enlaces    
    "abre mi correo" =>"ingresa al siguiente enlace => https://outlook.office.com/mail/", 


    "tu nombre es?" => "Mi nombre es " . $bot->getName(),
    "tu eres?" => "Me programaron para ser " . $bot->getGender(),
    //"Quien te creo?" => "Mi creador es " . $bot->getCreator()
    
];

if (isset($_GET['msg'])) {
   
    $msg = strtolower($_GET['msg']);
    $bot->hears($msg, function (Bot $botty) {
        global $msg;
        global $questions;
        if ($msg == 'hi' || $msg == "hello") {
            $botty->reply('Hola');
        } elseif ($botty->ask($msg, $questions) == "") {
            $botty->reply("Lo siento, no entiendo tu pregunta.");
        } else {
            $botty->reply($botty->ask($msg,$questions));
        }
    });
}
