<?php

echo "
<!DOCTYPE html>
<html lang='ca'>
<head>
<title> S&oacute;nar+PAPER </title>
<link rel='icon' href='http://www.pliegos.net/maker/logoPliegOS_96x96.png' type='image/x-icon' />
<meta http-equiv='content-language' content='ca' />
<meta http-equiv='content-type'     content='text/html;charset=ISO-8859-1' />
<meta name='author'                 content='Marcantoni Malagarriga-Picas' />
<meta name='Description'            content='F&eacute;u que un sol full de paper esdevingui un llibret excepcional' />
<meta name='keywords'               content='Sonar+D, microbooks, print, fold, cut, read, nUps, pliego, PliegOS, Patufet, literatura de canya i cordill, Barcelona, tipografia, typography, PostScript, PDF, Open Source, Free Software, GNU GPL, Programari Lliure, Software Libre, algorismes, algorismes, algorithms, algoritmos' />
<meta name='robots'                 content='follow' />
<meta name='title'                  content='S&oacute;nar+PAPER' />
<!-- Facebook Open Graph -->
<meta property='og:type'            content='website' />
<meta property='og:title'           content='S&oacute;nar+PAPER' />
<meta property='og:url'             content='https://pliegos.net/maker/sonarD2023/pliegOmaker.php' />
<meta property='og:site_name'       content='pliegos' />
<meta property='og:description'     content='F&eacute;u que un sol full de paper esdevingui un llibret excepcional. La reconnexi&oacute; d&#39;un plec random amb all&ograve; intangible dels sons arriscats.' />
<meta property='og:image'           content='https://pliegos.net/maker/sonarD2023/QR_SNRD2023_300x300.jpg' />
<meta property='og:image:type'      content='image/jpg' />
<meta property='og:image:width'     content='300' />
<meta property='og:image:height'    content='300' />
<meta property='og:image:alt'       content='S&oacute;nar+PAPER' />
<meta name='twitter:card'           content='summary_large_image' />
<meta name='twitter:url'            content='https://pliegos.net/maker/sonarD2023/pliegOmaker.php' />
<meta name='twitter:site' content='http://twitter.com/@gopliegOS' />
<!-- màxim 60 caràcters pel títol -->
<meta name='twitter:title'          content='S&oacute;nar+PAPER' />
<!-- màxim 126 caràcters per la descripció -->
<meta name='twitter:description'    content='F&eacute;u que un sol full de paper esdevingui un llibret excepcional. Plecs random amb l&#39;intangible dels sons arriscats.' />
<meta name='twitter:image:src'      content='https://pliegos.net/maker/sonarD2023/QR_SNRD2023_300x300.jpg' />
</head>
<body>
";

if ($_SERVER['REQUEST_METHOD'] === 'GET')
{  // Si fem GET: passem el valor de les variables dins la mateixa URL

//exit('GET!');

 // esborrem les anteriors per si les mosques?
 putenv('vp=');
 putenv('nUp=');
 putenv('hv=');
 putenv('full=');
 putenv('r=');
 putenv('labal=');
 putenv('tlab=');
//SNRD inicialitzem la galeta/variable de l'hora del client
 putenv('MRCT_qhe=');

 // crida sense paràmetres per l'execució única del prototip de pliegOS pel projecte sonar+D 2023
 // http://localhost/www.pliegos.net/maker/sonarD2023/pliegOmaker.php
 $vp=$_GET['vp'];
//echo($vp.'<br>');
 $nup=$_GET['nUp'];
//echo($nup.'<br>');
 $hv=$_GET['hv'];
//echo($hv.'<br>');
 $full=$_GET['full'];
//echo($full.'<br>');
 $r=$_GET['r'];
//echo($r.'<br>');
 $labal=$_GET['labal'];
//echo($lab.'<br>');
 $tlab=$_GET['tlab'];
//exit(' ...em veus?');
}
else
{  // Si fem POST: les variables vindran triades des d'index_##.php

//exit('POST!');

 $vp=$_POST['vp'];
 //echo $vp;  // ensenyem vores de les pàgines?

 $nup=$_POST['nUp'];
 //echo $nup;  // nUp

 $hv=$_POST['hv'];
 //echo $hv;  // orientació

 $full=$_POST['full'];
 //echo $full;  // full d'impressió

 $r=$_POST['r'];
 //echo $r;  // mantenim la ràtio?

 $labal=$_POST['labal'];
 //echo $labal;  // algorisme
 $tlab=$_POST['tlab'];
// echo $tlab;  // text de la caixa
// echo $_POST['tlab'];  // text a compondre
// exit(' ...bon dia!');
}

// minimitzem el trànsit de dades a través de variables d'entorn i així ens estalviem d'escriure les dades a disc
// de manera que, un cop capturades les variables de la URL, en fem un putenv de cadascuna, per després
// llegir-les de dins el .ps a través de l'operador getenv del GS 

putenv("MRCT_vp=$vp");  // desem si ensenyem les vores de les pàgines a la variable d'entorn 
putenv("MRCT_nup=$nup");  // desem l'nup a la variable d'entorn 
putenv("MRCT_hv=$hv");  // desem l'orientació a la variable d'entorn 
putenv("MRCT_full=$full");  // desem el format del full d'impressió a la variable d'entorn 
putenv("MRCT_r=$r");  // desem si mantenim la ràtio a la variable d'entorn 
putenv("MRCT_labal=$labal");  // desem l'algorisme de composició a la variable d'entorn 
putenv("MRCT_tlab=$tlab");  // desem el text a compondre a la variable d'entorn 

// treballem amb l'hora del client i no pas amb la del servidor
// cridem via PHP una galeta desada via JS més amunt
//SNRD
// NO SABEM EL PERQUÈ AQUESTA GALETA NO ES CAPTA AL SERVIDOR DE TEIXIDORA, POT SER DEGUT A NO TREBALLAR EN COMETES DOBLES?
// exit($_COOKIE['quinHoraEs'].' ...en podem extraure l\'hora del client?');
// i la tornem a desar en una nova variabe d'entorn
//SNRD
//URLsnr repesquem aquí la galeta horària --com fem a index_##.php-- i seguidament la cridem a
//$ficali = $_COOKIE['quinHoraEs'];
// exit($ficali);
//SNRD
//URLsnr NOU MÈTODE sense galetes... https://gist.github.com/earvinpiamonte/4bfbc3adc0992e7e07fd9773d3a06dbc
// date time from client side
/*
echo '<script type="text/javascript">
var d = new Date();
document.write(d.getFullYear()+"-"+("0"+(d.getMonth() + 1)).slice(-2)+"-"+("0"+d.getDate()).slice(-2)+" "+("0"+d.getHours()).slice(-2)+":"+("0"+d.getMinutes()).slice(-2)+":"+("0"+d.getSeconds()).slice(-2));
</script>';
echo '<script type="text/javascript">
var d = new Date();
document.write
(
 d.getFullYear() + "-" + ("0"+(d.getMonth() + 1)) . slice(-2) + "-" + ("0"+d.getDate()) . slice(-2) + " " + ("0"+d.getHours()) . slice(-2) + ":" + ("0"+d.getMinutes()) . slice(-2) + ":" + ("0"+d.getSeconds()) . slice(-2));
</script>';
*/
//SNRD
// L'ÚNIC MÈTODE fiable per passar l'hora del client serà via variable GET/POST si apuntem a un index.html que
// activi el PHP de manera que si excitem els algorismes via QR funcioni (perquè via URL segur que ho fa)
/*
echo '<script type="text/javascript">
var horaminutsegon = new Date();
document.write
(
 ("0" + horaminutsegon.getHours()) . slice(-2) + ":" + ( "0 " + horaminutsegon.getMinutes()) . slice(-2) + ":" + ( "0" + horaminutsegon.getSeconds()) . slice(-2)
);
<!-- document.cookie="horaminutsegon"; -->
</script>';
*/
// exit($_COOKIE['horaminutsegon'].' ...en podem extraure l\'hora del client?');
//$ficali = $_COOKIE['horaminutsegon'];
//$ficali = 'aeiou';
//exit($ficali);
//exit('a veure...' . horaminutsegon );
//putenv('MRCT_qhe = $ficali');  // el valor de la galeta que duu l'hora del client en format (hh:mm:ss)

//en tenim prou com a nom únic?
$PDFunic = date("d"."B"."H"."i"."s");

//$somaPS = "/home/marcantoni/pliegos.net/maker/";  // path al ps al servidor www.pliegos.net del DreamHost
//$somaPS = "/var/www/wordpress/maker/plegaVeu/";  // path al ps al nou servidor www.pliegos.net de Teixidora
//$somaPS = "/Library/WebServer/Documents/www.pliegos.net/maker/plegaVeu/";  // path al ps al localhost del Macbook Air

//SNRD
//URLsnr
$somaPS = "/Library/WebServer/Documents/www.pliegos.net/maker/sonarD2023/";  // path al ps cap al localhost del MacbookAir
//$somaPS = "/var/www/wordpress/maker/sonarD2023/";  // path al ps cap al servidor de Teixidora


//$somaPDF = "/home/marcantoni/pliegos.net/maker/pdf/";  // path al pdf al servidor www.pliegos.net del DreamHost
//$somaPDF = "/var/www/wordpress/maker/plegaVeu/pdf/";  // path al pdf al nou servidor www.pliegos.net de Teixidora
//$somaPDF = "/Library/WebServer/Documents/www.pliegos.net/maker/plegaVeu/pdf/";  // path al pdf al localhost del Macbook Air

//SNRD
//URLsnr
//@EP el directori /pdf on s'allotgen els resultats ha de tenir tots els permisos! (si no peta el GS sense que ens digui perquè)
$somaPDF = "/Library/WebServer/Documents/www.pliegos.net/maker/sonarD2023/pdf/";  // path al pdf cap al localhost del MacbookAir
//$somaPDF = "/var/www/wordpress/maker/sonarD2023/pdf/";  // path al pdf cap al servidor de Teixidora

//SNRD
//URLsnr
//$somaGS = "/usr/bin/";  // path a l'executable de Ghostscript al nou servidor www.pliegos.net de Teixidora
$somaGS = "/usr/local/bin/";  // path a l'executable de Ghostscript al localhost del Macbook Air


// EP! ens cal treure les www doncs el servidor de Teixidora té ara un problema al WordPress que fa que bloqui l'accés URL
//$baseurlPDF = "http://pliegos.net/maker/plegaVeu/pdf/";  // base url al pdf al nou servidor www.pliegos.net de Teixidora
//$baseurlPDF = "http://localhost/www.pliegos.net/maker/plegaVeu/pdf/";  // base url al pdf al localhost del Macbook Air

//SNRD
//URLsnr
$baseurlPDF = "http://localhost/www.pliegos.net/maker/sonarD2023/pdf/";  // base url al pdf al localhost del MacbookAir
//EP! al servidor de Teixidora és clau NO posar-hi les 3 www al davant, doncs si les duu dóna problemes al descarregar el PDF!
//$baseurlPDF = "http://pliegos.net/maker/sonarD2023/pdf/";  // base url al pdf al servidor de Teixidora


//$baseURL = "http://www.pliegos.net/maker";  // base url a la interfície del nou servidor www.pliegos.net de Teixidora
//$baseURL = "http://localhost/www.pliegos.net/maker";  // base url a la interfície del localhost del Macbook Air

//SNRD
//URLsnr
$baseURL = "http://localhost/www.pliegos.net/maker/sonarD2023/pliegOmaker.php";  // execució recursiva al localhost del MacbookAir
// EP! aquí podem posar-hi o no les 3 www al davant
//$baseURL = "http://www.pliegos.net/maker/sonarD2023/pliegOmaker.php";  // execució recursiva al servidor de Teixidora


$PSapplet = $somaPS . "nUp_pliegOS.ps";


//URLsnr
//$pdfnomes = $PDFunic . "_plegaVeu.pdf";
$pdfnomes = $PDFunic . "_sonarD2023_paper.pdf";


$pdfFile = $somaPDF . $pdfnomes;

// $command = "/usr/local/bin/gs -q -dBATCH -dNOPAUSE -dNOSAFER -sDEVICE=pdfwrite -sOutputFile=".$pdfFile." -c .setpdfwrite -f ".$PSapplet;  // servidor www2 de la UB
// GPL Ghostscript 8.62 (2008-02-29) al servidor www de la UB
// $command = "gs -q -dNOSAFER -o ".$pdfFile." -sDEVICE=pdfwrite -c .setpdfwrite -f ".$PSapplet;
// GPL Ghostscript 9.## del DreamHost de pliegos.net + localhost del MacBook Air

// EP és fonamenal que la crida a l'executable (almenys al localhost del Macbook Air) hi hagi el path sencer!

//SNRD
// aquesta crida encara és valida pel GS 9.27 del nou servidor de Teixidora
//$command = $somaGS . "gs -q -dNOSAFER -o '" . $pdfFile . "' -sDEVICE=pdfwrite -dAutoRotatePages=/None -c .setpdfwrite -f '" . $PSapplet . "'";

//SNRD
// EP crida a partir de la versió GS 9.55 al localhost del MacBookAir
$command = $somaGS . "gs -q -dNOSAFER -o '" . $pdfFile . "' -sDEVICE=pdfwrite -dAutoRotatePages=/None -f '" . $PSapplet . "'";

//echo $command;
//exit(" <<<< EP!");

// temps d'espera frisso?
//echo("<center><img src='frisso.gif' /></center>");

// si posem </pre> ens llistarà els missatges respectant la sintaxi que ve del PS

if(false)
{
 echo '<pre>';
 // mètode normal de llistat del prompt
 $LaDarrera = system($command, $ElQtorna);
 echo '</pre>';
}
else
{
// aquest és un mètode per capturar el prompt i evitar que surti
ob_start();
$LaDarrera = passthru($command, $ElQtorna);  // $LaDarrera queda buida
$prompt = ob_get_contents();
ob_end_clean();
}

// demostra com treballa amb la captura de la darrera linia i el parametre de tornada
// echo '</p><hr />La darrera Linia: ' . $LaDarrera . '<hr />El que ens torna: ' . $ElQtorna;
// $LaDarrera és la darrera línia del prompt
// anàlisi d' $ElQtorna
// si torna 127 és que el gs no s'ha executat?
// si torna 1 és que hi ha hagut un ofendingcommand (error a l'execució del ps)
// si torna 0 és que el .ps s'ha executat sense errors

// exit("...que ha fet?");

//echo "<!-- TEST de si la galeta es capta aquí? -->
//<script>
//alert('_quinHoraEs');
//</script>
//";

// com avaluem si s'ha generat el pdf correctament?
if ($ElQtorna == 127)
{  // el gs NO s'ha executat
 // exit("...sembla que el GS no s'ha executat");
 echo "<center><span style='color:#ff0000;font-family:monospace;font-size:24px'><br><br>&gt;&gt;&gt; l'int&egrave;rpret Ghostscript no s'ha executat &lt;&lt;&lt;</span>";
//SNRD
//URLsnr
 exit("<br><p><br><p><span style='color:#ff0000;font-family:monospace;font-size:24px'><a style='color:#ff0000;font-family:monospace;font-size:24px' href='mailto:marcantoni@femfum.com'>documenta'ns l'error via email, gr&agrave;cies!</a><br><br><a style='color:#ff0000;font-family:monospace;font-size:18px' href='$baseURL'>random sonar+PAPER</a></center>");

echo "</body></html>";
}
{
 //      if (file_exists($pdfFile))
 if ($ElQtorna == 0)
 {
  // echo ($prompt);  // el prompt del .ps llistat pel gs
//  exit("...sembla que ho ha fet bé!");

// forcem la descàrrega d'un PDF
//header('Content-type: application/pdf, text/html');
// nom del pdf per anomenar i desar
//header('Content-Disposition: attachment; filename=Fatarella18_ca.pdf');
// url
//readfile('http://femfum.com/OnEtsOncleGuillem/Fatarella18_ca.pdf');

  // forcem l'obertura del pdf a la mateixa finestra
  header("Location:" . $baseurlPDF . $pdfnomes);

//echo '<script type="text/javascript">window.open("http://localhost/www.pliegos.net/maker/'.$pdfnomes.'");</script>';

//           echo "<center><font color='#00ff00'>***** ginyB42 HA ENLLESTIT la feina correctament *****</font><br><p><br><p></center>";
//           $txerKB = ceil(filesize($pdfFile)/1024);
//           echo "</font><ul><font color='#00ff00'>Tiba't la composici&oacute;... <a href=$pdfFile TARGET='resource window'>$pdfFile ($txerKB Kb)</a>";
//           echo "<br><p><br><p><a href='$urlDtreball'> ...pots clicar aqu&iacute; per tornar a composar.</a></font></font></ul>";

// esborrem tots els fitxers del directori pdf que tinguin més de 24 hores
  $path="pdf";
  if (is_dir("$path") )
  {
   $manegal=opendir($path);
   while (false!==($file = readdir($manegal)))
   {
    if ($file != "." && $file != "..")
    {
     $Diff = (time() - filectime("$path/$file"))/60/60/24;
     if ($Diff > 1) unlink("$path/$file");
    }
   }
   closedir($manegal);
  }

 }
 else
 { // podem provocar errors executant sense interfície amb només comandes via URL (captura GET)
  // aquí llistem l'ERROR del prompt i demanem que s'enviï
  echo "<center><span style='color:#ff0000;font-family:monospace;font-size:24px'><br><br>&gt;&gt;&gt; ERROR d'execuci&oacute; de l'algorisme &lt;&lt;&lt;</span>";
  echo "<br><br><span style='color:#999999;font-family:monospace;font-size:24px'>".$prompt."</font><br></span>";
//SNRD
//URLsnr
  exit("<br><p><br><p><span style='color:#ff0000;font-family:monospace;font-size:24px'><a style='color:#ff0000;font-family:monospace;font-size:24px' href='mailto:marcantoni@femfum.com'>documenta'ns l'error via email, gr&agrave;cies!</a><br><br><a style='color:#ff0000;font-family:monospace;font-size:18px' href='$baseURL'>random sonar+PAPER</a></center>");
 }

 echo "</body></html>";
}

?>
