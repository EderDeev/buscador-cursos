<?php

namespace src\Buscador;

use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class Buscador
{
    public function __construct(
        public readonly ClientInterface $httpCliente,
        public readonly Crawler $crawler)
    {

    }

    public function buscar(string $url) : array
    {
        $response = $this->httpCliente->request('GET', $url);

        $html = $response->getBody();
        $this->crawler->addHtmlContent($html);

        $elementosCursos = $this->crawler->filter('span.card-curso__nome');
        $cursos = [];

        foreach ($elementosCursos as $elementos){
            $cursos[] = $elementos->textContent;
        }

        return $cursos;
    }
}