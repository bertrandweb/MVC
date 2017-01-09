<?php
class Model
{

    public $string;

    public function __construct()
    {
        $this -> string = "<p><a href='index.php?action=clicked'>Le MVC, c'est le pied !</a></p>";
        $this -> string = $this -> string."<p><a href='index.php?action=clickagain'>Le lien fonctionne ?</a></p> ";
        $this -> string = $this -> string."<p><a href='index.php?action=clickagainagain'>mrglmrglmrglmrglmrgl</a></p>";
    }

}

class View
{
    private $model;
    private $controller;

    public function __construct($controller, $model)
    {
        $this -> controller =  $controller;
        $this -> model = $model;
    }

    public function output ()
    {
        return $this -> model -> string;
    }
}

class Controller
{
    private $model;

    public function __construct($model)
    {
        $this -> model = $model;
    }

    public function clicked ()
    {
        $this -> model -> string = "<p>Ich bin updat&eacute;<a href='index.php'>Retour</a></p>";
    }

    public function clickagain()
    {
        $this -> model -> string = "<p>non c'est nul !!!! <a href='index.php'>Retour</a></p>";
    }
    public function clickagainagain()
    {
        $this -> model -> string = "<p>mon lien fonctionne ? <a href='index.php'>Retour</a></p> ";
    }
}

$model = new Model ();
$controller = new Controller ($model);
$view = new View ($controller, $model);

if (isset($_GET['action']) && !empty($_GET['action']))
{
    if (method_exists('Controller', $_GET['action']))
    {
        $controller->{$_GET['action']}();
    }
    else
    {
        echo "Erreur 404 ! \(;...;)/";
        die();
    }
}
    echo $view -> output();



