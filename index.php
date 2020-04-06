 <?php

  $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
  $supportedLanguages=['en','ca'];
  if(!in_array($lang,$supportedLanguages)){
     $lang='en';
  }
    require("index_".$lang.".html");
?>
