<?php

function autoloadControllers($controllerName)
{
    $controllerFile = 'src/controller/' . $controllerName . '.php';
    if (file_exists($controllerFile)) {
        require_once $controllerFile;
    }
}

function autoloadEntities($entityName)
{
    $entityName = lcfirst($entityName);
    $entityFile = 'src/model/entity/' . $entityName . '.php';
    if (file_exists($entityFile)) {
        require_once $entityFile;
    }
}

function autoloadTraits($traitName)
{
    $traitFile = 'src/model/traits/' . $traitName . '.php';
    if (file_exists($traitFile)) {
        require_once $traitFile;
    }
}

function bereinige($benutzerEingabe, $encoding = 'UTF-8')
{
    return htmlspecialchars(
        strip_tags($benutzerEingabe),
        ENT_QUOTES | ENT_HTML5,
        $encoding
    );
}

function redirect($url)
{
    header('Location: ' . $url);
    exit;
}
