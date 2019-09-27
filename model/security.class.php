<?php
// Classe de verificação Server-Side
interface iSeguraça{
  public function clienteTestes(Cliente $Cliente);
}

final class Seguranca implements iSeguraça
{
  private $caracters = [
    "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n",
    "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z", "á", "à",
    "â", "å", "ã", "ä", "æ","é", "ê", "è", "ë", "ð", "í", "î", "ì", "ï",
    "ó", "ô", "ò", "ø", "õ", "ö", "ú", "û", "ù", "ü","ç", "ñ", "ý", " "
  ];
  function nome($nome)
  {

    $n_array = str_split(strtolower($nome));
    if ($n_array != false) {
      foreach ($n_array as $value) {
        $contido = in_array($value, $this->caracters);
        if ($contido){
          return true;
        } else {
          return false;
          break;
        }
      }
    } else {
      return false;
    }
  }

  function situacao($situacao)
  {
    $st_list = ['P','N','A'];
    if (strlen($situacao) == 1 && is_string($situacao) == true && in_array($situacao, $st_list)) {
      return true;
    } else {
      return false;
    }
  }

  function clienteTestes(Cliente $Cliente){
    $nome = $this->nome($Cliente->getNome());
    $situacao = $this->situacao($Cliente->getSituacao());
    if($nome == true && $situacao == true){
      return true;
    }else{
      return false;
    }
  }
}
