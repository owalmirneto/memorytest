<?php

/**
 * Aqui você deve definir suas configurações de banco de dados, todas de acordo
 * com um determinado ambiente de desenvolvimento. Você pode definir quantos
 * ambientes forem necessários.
 *
 */
/*
Config::write("database", array(
    "development" => array(
        "driver" => "mysql",
        "host" => "localhost",
        "user" => "root",
        "password" => "",
        "database" => "memorytest",
        "prefix" => ""
    ),
    "production" => array(
        "driver" => "mysql",
        "host" => "localhost",
        "user" => "root",
        "password" => "",
        "database" => "memorytest",
        "prefix" => ""
    )
));
*/
Config::write("database", array(
    "development" => array(
        "driver" => "mysql",
        "host" => "localhost",
        "user" => "root",
        "password" => "umdoistres",
        "database" => "study_pianolab_memorytest",
        "prefix" => ""
    ),
    "production" => array(
        "driver" => "mysql",
        "host" => "dbmy0042.whservidor.com",
        "user" => "wfsneto_1",
        "password" => "senha123",
        "database" => "wfsneto_1",
        "prefix" => ""
    )
));
