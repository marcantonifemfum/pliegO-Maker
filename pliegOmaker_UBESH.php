<?php

//@URLUBESH
// EP! aquí cal veure si al servidor somNúvol podem posar-hi o no les 3 www al davant
$baseURL = "http://localhost/www.pliegos.net/maker/UBESH/";  // localhost de Tuxedo

// @URLUBESH
// adreça absoluta al directori de càrrega dels PDFs
$pujali = "/var/www/html/www.pliegos.net/maker/UBESH/Hpdf/";  // localhost Tuxedo

// echo "<b>Type: </b>" . $_FILES["atenyer"]["type"] . "<br>";
// echo "<b>File Size: </b>" . $_FILES["atenyer"]["size"]/1024 . "<br>";
// echo "<b>Store in: </b>" . $_FILES["atenyer"]["tmp_name"] . "<br>";

if (file_exists($_FILES["atenyer"]["tmp_name"]))	
//if(false)
{  // si s'ha carregat

 // el movem (podríem comprovar-ho?)
 // translladem el PDF carregat via submit del magatzem temporal del PHP al directori de càrrega del servidor
 move_uploaded_file($_FILES["atenyer"]["tmp_name"], $pujali . $_FILES["atenyer"]["name"]);

 // echo "<h3>The file already exists</h3>";

 // aplanem tots els caràcters a ascii pur
 $oPDF = basename( $pujali . $_FILES["atenyer"]["name"]);
 $PDFplan = iconv("UTF-8", "ASCII//TRANSLIT", $oPDF);
 //$PDFplan = iconv("UTF-8", "ISO-8859-1//IGNORE", $oPDF);

 // aqui planxem definitivament el nom del fitxer per assegurar una codificacio ASCII segura necessària per l'execució del GS
 $PDFplanxat = strtr($PDFplan, ' .,;:?*#!§$%&/(){}<>=`´|\\\'"', '____________________________');

 // al directori de càrrega del servidor canviem el nom del fitxer original al planxat
 rename($pujali . $oPDF, $pujali . $PDFplanxat);
 //exit($pujali . $PDFplanxat);
}
else
{  // hi ha hagut un error carregant el fitxer
 //exit("O POTSER PETA AQUI?");
 // echo "<center><span style='color:#ff0000;font-family:monospace;font-size:24px'><br><br>El fitxer&hellip; <span style='color:#999999'>". htmlspecialchars( basename( $_FILES["atenyer"]["name"])). " </span>&hellip;ja &eacute;s al servidor &hellip;FET!<br></span><br><p><br><p><a style='color:#ff0000;font-family:monospace;font-size:18px' href='$baseURL'>&gt;&gt;&gt; tornar a pliegO'Maker &lt;&lt;&lt;</a></center>";
 
 // @URLUBESH
 exit("<br><p><br><p><center><a style='color:#ff0000;font-family:monospace;font-size:18px' href='$baseURL'>&gt;&gt;&gt; Disculpeu, hi ha hagut un error carregant el fitxer al servidor &lt;&lt;&lt;</a></center>");
}

if ($_SERVER['REQUEST_METHOD'] === 'GET')
{  // Si fem GET: passem el valor de les variables dins la mateixa URL

//exit('GET!');

 // esborrem les anteriors per si les mosques?
 putenv('vp=');  // M1
 putenv('nUp=');  // M2
 putenv('hv=');  // M3
 putenv('full=');  // M4
 putenv('r=');  // M5
 putenv('labal=');  // M6
 putenv('bbox=');  // M7

 putenv('mapai=');  // M8 gatell del mapa d'imposició
 putenv('tmapai=');  // M8 dades del mapa d'imposició
 putenv('rang1=');  // M12 rang de pàgines pel mapa d'imposició
 putenv('rang2=');  // M12 rang de pàgines pel mapa d'imposició
 putenv('rang3=');  // M13 rang de llibrets pel mapa d'imposició

 putenv('enqdrnt=');  // M9
 putenv('assagemi=');  // M10
 putenv('tlab=');  // M11
 putenv('pipfa=');  // M12
 putenv('nmdllag=');  // M13
 putenv('agraella=');  // M14

 putenv('numera=');  // M15 numerem?
 putenv('M154=');  // M15 color de fons del numerador
 putenv('M1513=');  // M15 posició i forma de fons del numerador
 putenv('M152=');  // M15 fem transparent el fons del numerador?


//SNRD inicialitzem la galeta/variable de l'hora del client
 putenv('MRCT_qhe=');

 // exemple de crida sense paràmetres per l'execució única del prototip de pliegOS pel projecte sonar+D 2023
 // http://localhost/www.pliegos.net/maker/sonarD2023/pliegOmaker.php
 $vp=$_GET['vp'];  // M1
//echo($vp.'<br>');
 $nup=$_GET['nUp'];  // M2
//echo($nup.'<br>');
 $hv=$_GET['hv'];  // M3
//echo($hv.'<br>');
 $full=$_GET['full'];  // M4
//echo($full.'<br>');
 $r=$_GET['r'];  // M5
//echo($r.'<br>');
 $labal=$_GET['labal'];  // M6
 //echo($labal.'<br>');
 $bbox=$_GET['bbox'];  // M7
 //echo($bbox.'<br>');

 $mapai=$_GET['mapai'];  // M8 gatell del mapa d'imposició
 //echo($mapai.'<br>');
 $tmapai=$_GET['tmapai'];  // M8 dades del mapa d'imposició
 //echo($tmapai.'<br>');
 $rang1=$_GET['rang1'];  // M12 rang de pàgines pel mapa d'imposició
 //echo($rang1.'<br>');
 $rang2=$_GET['rang2'];  // M12 rang de pàgines pel mapa d'imposició
 //echo($rang2.'<br>');
 $rang3=$_GET['rang3'];  // M13 rang de llibrets pel mapa d'imposició
 //echo($rang3.'<br>');

 $enqdrnt=$_GET['enqdrnt'];  // M9
 //echo($enqdrnt.'<br>');
 $assagemi=$_GET['assagemi'];  // M10
 //echo($assagemi.'<br>');
 $tlab=$_GET['tlab'];  // M11
 //echo($tlab.'<br>');
 $pipfa=$_GET['pipfa'];  // M12
 //echo($pipfa.'<br>');
 $nmdllag=$_GET['nmdllag'];  // M13
 //echo($nmdllag.'<br>');
 $agraella=$_GET['agraella'];  // M14
 //echo($agraella.'<br>');

 $numera=$_GET['numera'];  // M15 numerem?
 //echo($numera.'<br>');
 $M154=$_GET['M154'];  // M15 color de fons del numerador
 //echo($M154.'<br>');
 $M1513=$_GET['M1513'];  // M15 posició i forma del fons del numerador
 //echo($M1513.'<br>');
 $M152=$_GET['M152'];  // M15 fem transparent el fons del numerador?
 //echo($M152.'<br>');

//exit(' ...em veus?');
}
else
{  // Si fem POST: les variables vindran triades des d'index_##.php o index.html

//exit('POST!');

 $vp=$_POST['vp'];
 //echo $vp;  // M1 ensenyem vores de les pàgines?

 $nup=$_POST['nUp'];
 //echo $nup;  // M2 nUp

 $hv=$_POST['hv'];
 //echo $hv;  // M3 orientació

 $full=$_POST['full'];
 //echo $full;  // M4 full d'impressió

 $r=$_POST['r'];  // l'hem eliminat del menú html i al arribar buida li donem el valor fix de... false ...a nUp_pliegOS_UBESH.ps
 //echo $r;  // M5 mantenim la ràtio?

 $labal=$_POST['labal'];  // l'hem eliminat del menú html i al arribar buida li donem el valor fix de... 9 ...a nUp_pliegOS_UBESH.ps
 //echo $labal;  // M6 algorisme

 $bbox=$_POST['bbox'];
 //echo $bbox;  // M7 respectem el CropBox?

 $mapai=$_POST['mapai'];
 //echo $mapai;  // M8 gatell del mapa d'imposició
 $tmapai=$_POST['tmapai'];
 //echo $tmapai;  // M8 dades del mapa d'imposició
 $rang1=$_POST['rang1'];
 //echo $rang1;  // M12 rang de pàgines pel mapa d'imposició
 $rang2=$_POST['rang2'];
 //echo $rang2;  // M12 rang de pàgines pel mapa d'imposició
 $rang3=$_POST['rang3'];
 //echo $rang3;  // M13 rang de llibrets pel mapa d'imposició

 $enqdrnt=$_POST['enqdrnt'];
 //echo $enqdrnt;  // M9 tipus d'enquadernat

 $assagemi=$_POST['assagemi'];
 //echo $assagemi;  // M10 assagem la imposició?

 $tlab=$_POST['tlab'];
 // echo $tlab;  // M11 text de la caixa
 // echo $_POST['tlab'];  // text a compondre

 $pipfa=$_POST['pipfa'];
 //echo $pipfa;  // M12 pàgina d'inici i final de l'assaig

 $nmdllag=$_POST['nmdllag'];
 //echo $nmdllag;  // M13 nombre màxim de llibrets a generar

 $agraella=$_POST['agraella'];
 //echo $agraella;  // M14 de com s'adapten les pàgines a la graella del llançat

 $numera=$_POST['numera'];
 // echo $numera;  // M15 valor d'índex 0 de si numerem o no les pàgines
 $M154=$_POST['M154'];
 // echo $M154;  // M15 color de fons del numerador
 $M1513=$_POST['M1513'];
 // echo $M1513;  // M15 posició i forma del fons del numerador
 $M152=$_POST['M152'];
 // echo $M152;  // M15 fem transparent el fons del numerador?

// exit(' ...bon dia!');
}

// minimitzem el trànsit de dades a través de variables d'entorn i així ens estalviem d'escriure les dades a disc
// de manera que, un cop capturades les variables de la URL, en fem un putenv de cadascuna, per després
// llegir-les de dins el .ps a través de l'operador getenv del GS 

// @UBESH
// capturada per farceixPDFs_pseudoPDFX5_UBESH.ps
putenv("MRCT_planxat=$PDFplanxat");  // desem el nom del fitxer normalitzat pujat al servidor per fer el llançat

// capturades per nUp_pliegOS_UBESH.ps
putenv("MRCT_vp=$vp");  // M1 desem si ensenyem les vores de les pàgines a la variable d'entorn 
putenv("MRCT_nup=$nup");  // M2 desem l'nup a la variable d'entorn 
putenv("MRCT_hv=$hv");  // M3 desem l'orientació a la variable d'entorn 
putenv("MRCT_full=$full");  // M4 desem el format del full d'impressió a la variable d'entorn 
putenv("MRCT_r=$r");  // M5 desem si mantenim la ràtio a la variable d'entorn 
putenv("MRCT_labal=$labal");  // M6 desem l'algorisme de composició a la variable d'entorn 
putenv("MRCT_bbox=$bbox");  // M7 desem si respectem el CropBox a la variable d'entorn 

putenv("MRCT_mapai=$mapai");  // M8 desem el gatell del mapa d'imposició a la variable d'entorn 
putenv("MRCT_tmapai=$tmapai");  // M8 desem les dades del mapa d'imposició a la variable d'entorn 
putenv("MRCT_rang1=$rang1");  // M12 desem les dades del rang de pàgines d'imposició a la variable d'entorn 
putenv("MRCT_rang2=$rang2");  // M12 desem les dades del rang de pàgines d'imposició a la variable d'entorn 
putenv("MRCT_rang3=$rang3");  // M13 desem les dades del rang de llibrets d'imposició a la variable d'entorn 

putenv("MRCT_enqdrnt=$enqdrnt");  // M9 desem el tipus d'enquadernat a la variable d'entorn 
putenv("MRCT_assagemi=$assagemi");  // M10 desem si assagem la imposició a la variable d'entorn 
putenv("MRCT_tlab=$tlab");  // M11 desem el text a compondre a la variable d'entorn 
putenv("MRCT_pipfa=$pipfa");  // M12 desem la pàgina d'inici i final de l'assaig a la variable d'entorn 
putenv("MRCT_nmdllag=$nmdllag");  // M13 desem el nombre màxim de llibrets a generar a la variable d'entorn 
putenv("MRCT_agraella=$agraella");  // M14 desem de com s'adapten les pàgines a la graella del llançat a la variable d'entorn 

putenv("MRCT_numera=$numera");  // M15 desem de si numerem o no les pàgines a la variable d'entorn 
putenv("MRCT_M154=$M154");  // M15 desem el color de fons del numerador a la variable d'entorn 
putenv("MRCT_M1513=$M1513");  // M15 desem la posició i forma del fons del numerador a la variable d'entorn 
putenv("MRCT_M152=$M152");  // M15 desem si fem el fons transparent del numerador a la variable d'entorn 


// treballem amb l'hora del client i no pas amb la del servidor?
// @EP ara mateix (09.05.24) executant la demo del SònarD, apuntant directament, sense paràmetres, a:
// http://localhost/www.pliegos.net/maker/sonarD2023/pliegOmaker.php
// ens dóna bé l'hora perquè l'agafa del mateix ordinador (el localhost que la té bé)
// però si executem apuntant directament, sense paràmetres, a:
// https://pliegos.net/maker/sonarD2023/pliegOmaker.php
// l'hora del servidor va 2 hores enrera
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

//URL30segons
//$somaPS = "/Library/WebServer/Documents/www.pliegos.net/maker/30segons/";  // path al ps cap al localhost del MacbookAir
//$somaPS = "/var/www/wordpress/maker/30segons/";  // path al ps cap al servidor de Teixidora

// @URLUBSEH localhost
//$somaPS = "/Library/WebServer/Documents/www.pliegos.net/maker/REpublica/";  // path al ps cap al localhost del MacbookAir
$somaPS = "/var/www/html/www.pliegos.net/maker/UBESH/";  // path al ps del localhost de Tuxedo

//$somaPDF = "/home/marcantoni/pliegos.net/maker/pdf/";  // path al pdf al servidor www.pliegos.net del DreamHost
//$somaPDF = "/var/www/wordpress/maker/plegaVeu/pdf/";  // path al pdf al nou servidor www.pliegos.net de Teixidora
//$somaPDF = "/Library/WebServer/Documents/www.pliegos.net/maker/plegaVeu/pdf/";  // path al pdf al localhost del Macbook Air

//URL30segons
// el directori /pdf on s'allotgen els resultats ha de tenir tots els permisos! (si no peta el GS sense que ens digui perquè)
//$somaPDF = "/Library/WebServer/Documents/www.pliegos.net/maker/30segons/pdf/";  // path al pdf cap al localhost del MacbookAir
//$somaPDF = "/var/www/wordpress/maker/30segons/pdf/";  // path al pdf cap al servidor de Teixidora

//@URLUBESH
// @EP el directori /pdf on s'allotgen els resultats ha de tenir tots els permisos! (si no peta el GS sense que ens digui perquè)
//$somaPDF = "/Library/WebServer/Documents/www.pliegos.net/maker/REpublica/pdf/";  // path al pdf cap al localhost del MacbookAir
$somaPDF = "/var/www/html/www.pliegos.net/maker/UBESH/pdf/";  // path al pdf del localhost de Tuxedo

//URL30segons
//$somaGS = "/usr/local/bin/";  // path a l'executable de Ghostscript al localhost del Macbook Air
//$somaGS = "/usr/bin/";  // path a l'executable de Ghostscript al nou servidor www.pliegos.net de Teixidora

//@URLUBESH localhost
//$somaGS = "/usr/local/bin/";  // path a l'executable de Ghostscript al localhost del Macbook Air
$somaGS = "/usr/bin/";  // path a l'executable de Ghostscript al localhost de Tuxedo

// EP! ens cal treure les www doncs el servidor de Teixidora té ara un problema al WordPress que fa que bloqui l'accés URL
//$baseurlPDF = "http://pliegos.net/maker/plegaVeu/pdf/";  // base url al pdf al nou servidor www.pliegos.net de Teixidora
//$baseurlPDF = "http://localhost/www.pliegos.net/maker/plegaVeu/pdf/";  // base url al pdf al localhost del Macbook Air

//URL30segons
//$baseurlPDF = "http://localhost/www.pliegos.net/maker/30segons/pdf/";  // base url al pdf al localhost del MacbookAir
//EP! al servidor de Teixidora és clau NO posar-hi les 3 www al davant, doncs si les duu dóna problemes al descarregar el PDF!
//$baseurlPDF = "http://pliegos.net/maker/30segons/pdf/";  // base url al pdf al servidor de Teixidora

//@URLUBESH localhost
//$baseurlPDF = "http://localhost/www.pliegos.net/maker/REpublica/pdf/";  // base url al pdf al localhost del MacbookAir
// @EP al servidor commonscloud.coop és clau NO posar-hi les 3 www al davant, si les duu dóna problemes al descarregar el PDF!
$baseurlPDF = "http://localhost/www.pliegos.net/maker/UBESH/pdf/";  // base url al pdf al localhost de Tuxedo
$baseurlMAPA = "http://localhost/www.pliegos.net/maker/UBESH/tmp/";  // base url on desem els mapes d'imposició al localhost de Tuxedo

//$baseURL = "http://www.pliegos.net/maker";  // base url a la interfície del nou servidor www.pliegos.net de Teixidora
//$baseURL = "http://localhost/www.pliegos.net/maker";  // base url a la interfície del localhost del Macbook Air

//URL30segons
//NOinterface
//$baseURL = "http://localhost/www.pliegos.net/maker/30segons/pliegOmaker000.php";  //execució recursiva al localhost del MacbookAir
// EP! aquí podem posar-hi o no les 3 www al davant
//$baseURL = "http://www.pliegos.net/maker/30segons/pliegOmaker.php";  // execució recursiva al servidor de Teixidora

//@URLUBESH
//NOinterface
$PSapplet = $somaPS . "pliegOMaker_UBESH.ps";


//@URLREpublica
//NOinterface
//$pdfnomes = $PDFunic . "_plegaVeu.pdf";
$pdfnomes = $PDFunic . $PDFplanxat . "_UBESH.pdf";

//@URLUBESH
//@EP aquí desem $PDFunic com a variable d'entorn per tal que a farceixPDFs_pseudoPDFX5_UBESH.ps la capturem per desar-hi un HTML amb el mapa d'imposició
putenv("MRCT_PDFunic=$PDFunic");  // desem el numèric únic a la variable d'entorn 
// i la cridarem després de l'execució com a resultat de l'assaig al prompt del navegador

$pdfFile = $somaPDF . $pdfnomes;

// $command = "/usr/local/bin/gs -q -dBATCH -dNOPAUSE -dNOSAFER -sDEVICE=pdfwrite -sOutputFile=".$pdfFile." -c .setpdfwrite -f ".$PSapplet;  // servidor www2 de la UB
// GPL Ghostscript 8.62 (2008-02-29) al servidor www de la UB
// $command = "gs -q -dNOSAFER -o ".$pdfFile." -sDEVICE=pdfwrite -c .setpdfwrite -f ".$PSapplet;
// GPL Ghostscript 9.## del DreamHost de pliegos.net + localhost del MacBook Air

// EP és fonamenal que la crida a l'executable (almenys al localhost del Macbook Air) hi hagi el path sencer!

//URL30segons
// EP crida a partir de la versió GS 9.55 al localhost del MacBookAir
//$command = $somaGS . "gs -q -dNOSAFER -o '" . $pdfFile . "' -sDEVICE=pdfwrite -dAutoRotatePages=/None -f '" . $PSapplet . "'";

//URL30segons
// aquesta crida encara és valida pel GS 9.27 del nou servidor de Teixidora
//$command = $somaGS . "gs -q -dNOSAFER -o '" . $pdfFile . "' -sDEVICE=pdfwrite -dAutoRotatePages=/None -c .setpdfwrite -f '" . $PSapplet . "'";

//@URLUBESH
// crida a partir de la versió GS 9.55 al localhost del MacBookAir
//$command = $somaGS . "gs -q -dNOSAFER -o '" . $pdfFile . "' -dALLOWPSTRANSPARENCY -sDEVICE=pdfwrite -dAutoRotatePages=/None -dNEWPDF=false  -f '" . $PSapplet . "'";
// @EP aquesta pel gs 9.55 localhost de Tuxedo
$command = $somaGS . "gs -q -dNOSAFER -o '" . $pdfFile . "' -dALLOWPSTRANSPARENCY -sDEVICE=pdfwrite -dAutoRotatePages=/None -f '" . $PSapplet . "'";
// aquesta crida encara és valida pel GS 9.27 del nou servidor de commonscloud.coop
//$command = $somaGS . "gs -q -dNOSAFER -o '" . $pdfFile . "' -sDEVICE=pdfwrite -dAutoRotatePages=/None -c .setpdfwrite -f '" . $PSapplet . "'";

//echo $command;

// temps d'espera frisso?
//echo("<center><img src='frisso.gif' /></center>");

//@UBESH si anem a true ens llista els missatges per la pantalla de l'html comn si fos el prompt del Terminal
if(false)
{  // si posem </pre> ens llistarà els missatges respectant la sintaxi que ve del PS
 echo '<pre>';
 // mètode normal de llistat del prompt
 $LaDarrera = system($command, $ElQtorna);

 exit("- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -");

 echo '</pre>';
}
else
{  // aquest és un mètode per capturar el prompt i presentar-lo embolicat d'html
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
//@URLUBESH
 exit("<br><p><br><p><span style='color:#ff0000;font-family:monospace;font-size:24px'><a style='color:#ff0000;font-family:monospace;font-size:24px' href='mailto:marcantoni@femfum.com'>podeu documentar-nos l'error via email? (copieu i enganxeu el text en gris) gr&agrave;cies!</a><br><br><a style='color:#ff0000;font-family:monospace;font-size:18px' href='$baseURL'>pliegO'Maker</a></center>");

echo "</body></html>";
}
{
 //      if (file_exists($pdfFile))
 if ($ElQtorna == 0)
 {
  if ($mapai == 7)  // assagem?
  {
   //echo ($prompt);  // el prompt del .ps llistat pel gs
   //exit("...sembla que ho ha fet bé!");

   //@URLUBESH localhost
   // aquí llistem el mapa d'imposició com si fos el prompt del Terminal
   echo "<center><span style='color:#ff0000;font-family:monospace;font-size:24px'><br><br>&gt;&gt;&gt; ASSAIG DEL MAPA D'IMPOSICI&Oacute; &lt;&lt;&lt;</span>";
//   echo "<br><br><div w3-include-html='" . $baseurlMAPA . $PDFunic . ".html' style='color:#999999;font-family:monospace;font-size:24px'></div>";
   echo "<br><br><iframe src='" . $baseurlMAPA . $PDFunic . ".html'  height='100%' width='50%' title='' style='border:none' ></iframe>";
   exit("<br><p><br><p><span style='color:#ff0000;font-family:monospace;font-size:24px'><a style='color:#ff0000;font-family:monospace;font-size:18px' href='$baseURL'>Si torneu enrera per aquest vincle perdereu les opcions de men&uacute; triades, si ho feu amb el bot&oacute; del navegador les conservareu</a></span><br><p><br></center>");
  }
  else
  {
// forcem la descàrrega d'un PDF
//header('Content-type: application/pdf, text/html');
// nom del pdf per anomenar i desar
//header('Content-Disposition: attachment; filename=Fatarella18_ca.pdf');
// url
//readfile('http://femfum.com/OnEtsOncleGuillem/Fatarella18_ca.pdf');

  // forcem l'obertura del pdf a la mateixa finestra
  // header("Location:" . $baseurlPDF . $pdfnomes);  // no li agrada a SomNuvol !

//echo '<script type="text/javascript">window.open("http://localhost/www.pliegos.net/maker/'.$pdfnomes.'");</script>';
//@URLUBESH localhost
	 echo '<script type="text/javascript">window.open("http://localhost/www.pliegos.net/maker/UBESH/pdf/'.$pdfnomes.'");</script>';

//           echo "<center><font color='#00ff00'>***** ginyB42 HA ENLLESTIT la feina correctament *****</font><br><p><br><p></center>";
//           $txerKB = ceil(filesize($pdfFile)/1024);
//           echo "</font><ul><font color='#00ff00'>Tiba't la composici&oacute;... <a href=$pdfFile TARGET='resource window'>$pdfFile ($txerKB Kb)</a>";
//           echo "<br><p><br><p><a href='$urlDtreball'> ...pots clicar aqu&iacute; per tornar a composar.</a></font></font></ul>";

  }


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
  echo "<br><br><span style='color:#999999;font-family:monospace;font-size:24px'>".$prompt."<br></span>";
//@URLUBESH localhost
  exit("<br><p><br><p><span style='color:#ff0000;font-family:monospace;font-size:24px'><a style='color:#ff0000;font-family:monospace;font-size:24px' href='mailto:marcantoni@femfum.com'>podeu documentar-nos l'error via email? (copieu i enganxeu el text en gris) gr&agrave;cies!</a><br><br><a style='color:#ff0000;font-family:monospace;font-size:18px' href='$baseURL'>pliegO'Maker</a></span></center>");
 }

 echo "</body></html>";
}

?>
