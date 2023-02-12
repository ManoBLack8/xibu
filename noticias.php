<?php

$lista_noticias = [];

// URL da página de notícias do IFMT a ser requisitada
$response = file_get_contents('https://cba.ifmt.edu.br/conteudo/noticias/');

// Faz a busca através das tags HTML da página
$site = new DOMDocument();
libxml_use_internal_errors(true);
$site->loadHTML($response);
$xpath = new DOMXPath($site);
libxml_clear_errors();
$noticias = $xpath->query("//div[@class='small-12 columns borda-esquerda']");

foreach ($noticias as $noticia) {
  $titulo = $xpath->query("p[@class='no-margin espacamento-medio']", $noticia);
  $lista_noticias[] = [$titulo->item(0)->nodeValue];
}

$news = array_map(function($item) {
  return [$item];
}, $lista_noticias);

$json = json_encode($news);
echo $json;
?>