<?php
//importando o autolad do pacote
require 'vendor/autoload.php';
require 'src\Buscador.php';

//importando o namespace
use GuzzleHttp\Client;
use src\Buscador\Buscador;
use Symfony\Component\DomCrawler\Crawler;

//Instanciando uma classe do pacote guzzlahttp
$client = new Client(['verify' => false]);
$crawler = new Crawler();

$buscador = new Buscador($client,$crawler);
$cursos = $buscador->buscar('https://www.alura.com.br/cursos-online-programacao/php');

foreach ($cursos as $curso){
    echo $curso . "\n";
}

