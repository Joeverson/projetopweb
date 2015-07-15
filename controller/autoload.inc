<?php

//função para fazer ao carregamento automatico dos arquivos
function __autoload($classname) {
    if (class_exists($classname, FALSE))
        return;

    $classname = ltrim($classname, '\\');
    $filename  = '';
    $namespace = '';
    $basePath = "";
    $ignore = array("PDO");

    if ($lastnspos = strripos($classname, '\\')) {
        $namespace = substr($classname, 0, $lastnspos);

        $basePath = explode("\\", $namespace);

        $classname = substr($classname, $lastnspos + 1);
        $filename  = str_replace('\\', '/', $namespace) . '/';
    }

    if(!in_array($classname, $ignore)){
        //troca as inderlines por pontos
        $filename .= str_replace('_', '.', $classname) . '.inc';

        //adicionando rotas alternativas dependendo do escopo
        if($basePath[0] == "view")
            include dirname(__FILE__).DIRECTORY_SEPARATOR."../".$filename;
        else
            include dirname(__FILE__).DIRECTORY_SEPARATOR."../".$filename;


    }


}

