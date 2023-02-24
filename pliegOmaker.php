<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET')
{  // Si fem GET: passem el valor de les variables dins la mateixa URL

 // esborrem les anteriors per si les mosques?
 putenv('vp=');
 putenv('nUp=');
 putenv('hv=');
 putenv('full=');
 putenv('r=');
 putenv('labal=');
 putenv('tlab=');

 // crida sense par�metres per l'execuci� �nica del prototip de pliegOS pel projecte sonar+D 2023
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

 $vp=$_POST['vp'];
 //echo $vp;  // ensenyem vores de les p�gines?

 $nup=$_POST['nUp'];
 //echo $nup;  // nUp

 $hv=$_POST['hv'];
 //echo $hv;  // orientaci�

 $full=$_POST['full'];
 //echo $full;  // full d'impressi�

 $r=$_POST['r'];
 //echo $r;  // mantenim la r�tio?

 $labal=$_POST['labal'];
 //echo $labal;  // algorisme
 $tlab=$_POST['tlab'];
// echo $tlab;  // text de la caixa
// echo $_POST['tlab'];  // text a compondre
// exit(' ...bon dia!');
}

// minimitzem el tr�nsit de dades a trav�s de variables d'entorn i aix� ens estalviem d'escriure les dades a disc
// de manera que, un cop capturades les variables de la URL, en fem un putenv de cadascuna, per despr�s
// llegir-les de dins el .ps a trav�s de l'operador getenv del GS 

putenv("MRCT_vp=$vp");  // desem si ensenyem les vores de les p�gines a la variable d'entorn 
putenv("MRCT_nup=$nup");  // desem l'nup a la variable d'entorn 
putenv("MRCT_hv=$hv");  // desem l'orientaci� a la variable d'entorn 
putenv("MRCT_full=$full");  // desem el format del full d'impressi� a la variable d'entorn 
putenv("MRCT_r=$r");  // desem si mantenim la r�tio a la variable d'entorn 
putenv("MRCT_labal=$labal");  // desem l'algorisme de composici� a la variable d'entorn 
putenv("MRCT_tlab=$tlab");  // desem el text a compondre a la variable d'entorn 

// treballem amb l'hora del client i no pas amb la del servidor
// cridem via PHP una galeta desada via JS a index_##.php
// exit($_COOKIE['quinHoraEs'].' ...en podem extraure l\'hora del client?');
// i la tornem a desar en una nova variabe d'entorn
//URLsnr (haur�em de generar aqu� la galeta hor�ria --com fem a index_##.php-- i seguidament cridar-la com ja fem)
$ficali = $_COOKIE['quinHoraEs'];
putenv("MRCT_qhe=$ficali");  // el valor de la galeta que duu l'hora del client en format (hh:mm:ss)

//en tenim prou com a nom �nic?
$PDFunic = date("d"."B"."H"."i"."s");

//$somaPS = "/home/marcantoni/pliegos.net/maker/";  // path al ps al servidor www.pliegos.net del DreamHost
//$somaPS = "/var/www/wordpress/maker/plegaVeu/";  // path al ps al nou servidor www.pliegos.net de Teixidora
//$somaPS = "/Library/WebServer/Documents/www.pliegos.net/maker/plegaVeu/";  // path al ps al localhost del Macbook Air

//URLsnr
$somaPS = "/Library/WebServer/Documents/www.pliegos.net/maker/sonarD2023/";  // path al ps cap al localhost del MacbookAir


//$somaPDF = "/home/marcantoni/pliegos.net/maker/pdf/";  // path al pdf al servidor www.pliegos.net del DreamHost
//$somaPDF = "/var/www/wordpress/maker/plegaVeu/pdf/";  // path al pdf al nou servidor www.pliegos.net de Teixidora
//$somaPDF = "/Library/WebServer/Documents/www.pliegos.net/maker/plegaVeu/pdf/";  // path al pdf al localhost del Macbook Air

//URLsnr
//@EP el directori /pdf on s'allotgen els resultats ha de tenir tots els permisos! (si no peta el GS sense que ens digui perqu�)
$somaPDF = "/Library/WebServer/Documents/www.pliegos.net/maker/sonarD2023/pdf/";  // path al pdf cap al localhost del MacbookAir


//URLsnr
//$somaGS = "/usr/bin/";  // path a l'executable de Ghostscript al nou servidor www.pliegos.net de Teixidora
$somaGS = "/usr/local/bin/";  // path a l'executable de Ghostscript al localhost del Macbook Air


// EP! ens cal treure les www doncs el servidor de Teixidora t� ara un problema al WordPress que fa que bloqui l'acc�s URL
//$baseurlPDF = "http://pliegos.net/maker/plegaVeu/pdf/";  // base url al pdf al nou servidor www.pliegos.net de Teixidora
//$baseurlPDF = "http://localhost/www.pliegos.net/maker/plegaVeu/pdf/";  // base url al pdf al localhost del Macbook Air

//URLsnr
$baseurlPDF = "http://localhost/www.pliegos.net/maker/sonarD2023/pdf/";  // base url al pdf al localhost del MacbookAir


//$baseURL = "http://www.pliegos.net/maker";  // base url a la interf�cie del nou servidor www.pliegos.net de Teixidora
//$baseURL = "http://localhost/www.pliegos.net/maker";  // base url a la interf�cie del localhost del Macbook Air

//URLsnr
$baseURL = "http://localhost/www.pliegos.net/maker/sonarD2023/pliegOmaker.php";  // execuci� recursiva al localhost del MacbookAir


$PSapplet = $somaPS . "nUp_pliegOS.ps";


//URLsnr
//$pdfnomes = $PDFunic . "_plegaVeu.pdf";
$pdfnomes = $PDFunic . "_sonarD2023_paper.pdf";


$pdfFile = $somaPDF . $pdfnomes;

// $command = "/usr/local/bin/gs -q -dBATCH -dNOPAUSE -dNOSAFER -sDEVICE=pdfwrite -sOutputFile=".$pdfFile." -c .setpdfwrite -f ".$PSapplet;  // servidor www2 de la UB
// GPL Ghostscript 8.62 (2008-02-29) al servidor www de la UB
// $command = "gs -q -dNOSAFER -o ".$pdfFile." -sDEVICE=pdfwrite -c .setpdfwrite -f ".$PSapplet;
// GPL Ghostscript 9.## del DreamHost de pliegos.net + localhost del MacBokk Air

// EP �s fonamenal que la crida a l'executable (almenys al localhost del Macbook Air) hi hagi el path sencer!
// aquesta crida encara �s valida pel GS 9.27 del nou servidor de Teixidors
//$command = $somaGS . "gs -q -dNOSAFER -o '" . $pdfFile . "' -sDEVICE=pdfwrite -dAutoRotatePages=/None -c .setpdfwrite -f '" . $PSapplet . "'";

// EP crida a partir de la versi� GS 9.55 al localhost del MacBookAir
$command = $somaGS . "gs -q -dNOSAFER -o '" . $pdfFile . "' -sDEVICE=pdfwrite -dAutoRotatePages=/None -f '" . $PSapplet . "'";

//echo $command;
//exit(" <<<< EP!");

// temps d'espera frisso?
//echo("<center><img src='frisso.gif' /></center>");

// si posem </pre> ens llistar� els missatges respectant la sintaxi que ve del PS

if(false)
{
 echo '<pre>';
 // m�tode normal de llistat del prompt
 $LaDarrera = system($command, $ElQtorna);
 echo '</pre>';
}
else
{
// aquest �s un m�tode per capturar el prompt i evitar que surti
ob_start();
$LaDarrera = passthru($command, $ElQtorna);  // $LaDarrera queda buida
$prompt = ob_get_contents();
ob_end_clean();
}

// demostra com treballa amb la captura de la darrera linia i el parametre de tornada
// echo '</p><hr />La darrera Linia: ' . $LaDarrera . '<hr />El que ens torna: ' . $ElQtorna;
// $LaDarrera �s la darrera l�nia del prompt
// an�lisi d' $ElQtorna
// si torna 127 �s que el gs no s'ha executat?
// si torna 1 �s que hi ha hagut un ofendingcommand (error a l'execuci� del ps)
// si torna 0 �s que el .ps s'ha executat sense errors

// exit("...que ha fet?");

// com avaluem si s'ha generat el pdf correctament?
if ($ElQtorna == 127)
{  // el gs NO s'ha executat
 // exit("...sembla que el GS no s'ha executat");
 echo "<center><span style='color:#ff0000;font-family:monospace;font-size:24px'><br><br>&gt;&gt;&gt; l'int&egrave;rpret Ghostscript no s'ha executat &lt;&lt;&lt;</span>";
//URLsnr
 exit("<br><p><br><p><span style='color:#ff0000;font-family:monospace;font-size:24px'><a style='color:#ff0000;font-family:monospace;font-size:24px' href='mailto:marcantoni@femfum.com'>documenta'ns l'error via email, gr&agrave;cies!</a><br><br><a style='color:#ff0000;font-family:monospace;font-size:18px' href='$baseURL'>random sonar+PAPER</a></center>");

}
{
 //      if (file_exists($pdfFile))
 if ($ElQtorna == 0)
 {
  // echo ($prompt);  // el prompt del .ps llistat pel gs
//  exit("...sembla que ho ha fet b�!");

// forcem la desc�rrega d'un PDF
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

// esborrem tots els fitxers del directori pdf que tinguin m�s de 24 hores
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
 { // podem provocar errors executant sense interf�cie amb nom�s comandes via URL (captura GET)
  // aqu� llistem l'ERROR del prompt i demanem que s'envi�
  echo "<center><span style='color:#ff0000;font-family:monospace;font-size:24px'><br><br>&gt;&gt;&gt; ERROR d'execuci&oacute; de l'algorisme &lt;&lt;&lt;</span>";
  echo "<br><br><span style='color:#999999;font-family:monospace;font-size:24px'>".$prompt."</font><br></span>";
//URLsnr
  exit("<br><p><br><p><span style='color:#ff0000;font-family:monospace;font-size:24px'><a style='color:#ff0000;font-family:monospace;font-size:24px' href='mailto:marcantoni@femfum.com'>documenta'ns l'error via email, gr&agrave;cies!</a><br><br><a style='color:#ff0000;font-family:monospace;font-size:18px' href='$baseURL'>random sonar+PAPER</a></center>");
 }
}

?>
