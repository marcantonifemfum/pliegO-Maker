<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET')
{  // Si fem GET: passem el valor de les variables dins la mateixa URL

 // esborrem les anteriors per si les mosques?
 putenv('vp=');
 putenv('nUp=');
 putenv('hv=');
 putenv('full=');
 putenv('r=');
 putenv('lab=');

 // pliegos de 8 amb reglatge
 // http://localhost/www.pliegos.net/maker/pliegOmaker.php?vp=true&nup=8&hv=true&full=4&r=false&lab=0
 // pliegos de 8 amb l'hora
 // http://localhost/www.pliegos.net/maker/pliegOmaker.php?vp=true&nup=8&hv=true&full=4&r=false&lab=1
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
 $lab=$_GET['lab'];
//echo($lab.'<br>');
//exit(' ...em veus?');
}
else
{  // Si fem POST: les variables vindran triades des d'index.html

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

 $lab=$_POST['lab'];
 //echo $lab;  // algorisme
}

// minimitzem el trànsit de dades a través de variables d'entorn i així ens estalviem d'escriure les dades a disc
// de manera que, un cop capturades les variables de la URL, en fem un putenv de cadascuna, per després
// llegir-les de dins el .ps a través de l'operador getenv del GS 

putenv("MRCT_vp=$vp");  // desem si ensenyem les vores de les pàgines a la variable d'entorn 
putenv("MRCT_nup=$nup");  // desem l'nup a la variable d'entorn 
putenv("MRCT_hv=$hv");  // desem l'orientació a la variable d'entorn 
putenv("MRCT_full=$full");  // desem el format del full d'impressió a la variable d'entorn 
putenv("MRCT_r=$r");  // desem si mantenim la ràtio a la variable d'entorn 
putenv("MRCT_lab=$lab");  // desem l'algorisme de composició a la variable d'entorn 

//en tenim prou com a nom únic?
$PDFunic = date("d"."B"."H"."i"."s");

//$somaPS = "/home/marcantoni/pliegos.net/maker/";  // path al ps al servidor www.pliegos.net del DreamHost
$somaPS = "/Library/WebServer/Documents/www.pliegos.net/maker/";  // path al ps al localhost del Macbook Air

//$somaPDF = "/home/marcantoni/pliegos.net/maker/pdf/";  // path al pdf al servidor www.pliegos.net del DreamHost
$somaPDF = "/Library/WebServer/Documents/www.pliegos.net/maker/pdf/";  // path al pdf al localhost del Macbook Air

//$somaGS = "/usr/bin/";  // path a l'executable de Ghostscript al servidor www.pliegos.net del DreamHost
$somaGS = "/usr/local/bin/";  // path a l'executable de Ghostscript al localhost del Macbook Air

//$baseurlPDF = "http://www.pliegos.net/maker/pdf/";  // base url al pdf al servidor www.pliegos.net del DreamHost
$baseurlPDF = "http://localhost/www.pliegos.net/maker/pdf/";  // base url al pdf al localhost del Macbook Air


$PSapplet = $somaPS . "nUp_pliegOS.ps";
$pdfnomes = $PDFunic . "_pliegOSnUp.pdf";
$pdfFile = $somaPDF . $pdfnomes;

// $command = "/usr/local/bin/gs -q -dBATCH -dNOPAUSE -dNOSAFER -sDEVICE=pdfwrite -sOutputFile=".$pdfFile." -c .setpdfwrite -f ".$PSapplet;  // servidor www2 de la UB
// GPL Ghostscript 8.62 (2008-02-29) al servidor www de la UB
// $command = "gs -q -dNOSAFER -o ".$pdfFile." -sDEVICE=pdfwrite -c .setpdfwrite -f ".$PSapplet;
// GPL Ghostscript 9.## del DreamHost de pliegos.net + localhost del MacBokk Air

// EP és fonamenal que la crida a l'executable (almenys al localhost del Macbook Air) hi hagi el path sencer!
$command = $somaGS . "gs -q -dNOSAFER -o '" . $pdfFile . "' -sDEVICE=pdfwrite -dAutoRotatePages=/None -c .setpdfwrite -f '" . $PSapplet . "'";

//echo $command;

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

//exit("...que ha fet?");

// com avaluem si s'ha generat el pdf correctament?
if ($ElQtorna == 127)
{  // el gs NO s'ha executat
 // exit("...sembla que el GS no s'ha executat");
 echo "<center><span style='color:#ff0000;font-family:monospace;font-size:24px'><br><br>...l'int&egrave;rpret Ghostscript no s'ha executat...</span>";
 exit("<br><p><br><p><span style='color:#ff0000;font-family:monospace;font-size:24px'><a style='color:#ff0000;font-family:monospace;font-size:24px' href='mailto:marcantoni@femfum.com'>documenta'ns l'error a l'email, gr&agrave;cies!</a><br><br><a style='color:#ff0000;font-family:monospace;font-size:18px' href='http://www.pliegos.net/maker'>piegO-Maker</a></center>");

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
  echo "<center><span style='color:#ff0000;font-family:monospace;font-size:24px'><br><br>...ERROR d'execuci&oacute; de l'algorisme...</span>";
  echo "<br><br><span style='color:#999999;font-family:monospace;font-size:24px'>".$prompt."</font><br></span>";
  exit("<br><p><br><p><span style='color:#ff0000;font-family:monospace;font-size:24px'><a style='color:#ff0000;font-family:monospace;font-size:24px' href='mailto:marcantoni@femfum.com'>documenta'ns l'error a l'email, gr&agrave;cies!</a><br><br><a style='color:#ff0000;font-family:monospace;font-size:18px' href='http://www.pliegos.net/maker'>piegO-Maker</a></center>");
 }
}

?>
