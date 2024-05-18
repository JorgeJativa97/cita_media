<?php
require_once "MyCustomPDFWithWatermark2.php";
 
require_once "../../../controladores/examenElastografia.controlador.php"; 
require_once "../../../modelos/examenElastografia.modelo.php";
 
// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document  
class imprimirExamenelasto{
 
 
public $idelastografia; 
public function traerimprimirExamenElasto(){

 $item = "ela_codigo";
 $valor = $this->idelastografia; 


$respuesta= ControladorExamenElastografia::ctrMostrarExamenElastografia($item,$valor);       

//  echo '<pre>'; print_r($respuesta); echo '</pre>';

// setlocale(LC_TIME, "spanish");
//             $date = new Datetime($respuesta["fecha"]);
//             $var1 = strftime("%d %B de %Y", $date->getTimestamp()); 



$pdf = new MyCustomPDFWithWatermark(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// ---------------------------------------------------------


// Crea un nuevo PDF pero usando nuestra propia clase que extiende TCPDF
$pdf = new MyCustomPDFWithWatermark(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


$pdf->SetAuthor('Our Code World');
 
// establecer fuente monoespaciada predeterminada
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
// establecer datos de encabezado predeterminados
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);


// establecer márgenes
$pdf->SetMargins('10', '35', '5');
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->SetFont('aealarabiya', '', 14);
// Image example with resizing 

// Agregar una página
$pdf->AddPage();

$img_file = 'images/logo3.png';
$img_file2 = 'images/firma.jpg';

        // Renderizar la imagen
$pdf->Image($img_file, 80, 0, 50, 30, '', '', '', false, 100, '', false, false, 0);

// ---------------------------------------------------------
// Crea contenido HTML
$bloque1 = <<<EOF
<style>
    h1 {
        font-family: pdfatimes;
        text-align:center; 
        color: #02410a; 
        font-size:11.5px; 
        font-weight: 900;
        line-height : 15px;        
    }


    p {
        text-align: justify;        
        font-family: pdfatimes;
        font-size: 12.5pt;
        line-height : 17px;
    }
    p.first span {
        color: #006600;
        font-style: italic;
    }
    p#second {
        color: rgb(00,63,127);
        font-family: times;
        font-size: 12pt;
        text-align: justify;
    }
    p#second > span {
        background-color: #FFFFAA;
    }
    
    h4 {
        line-height: 75%;
        font-size: 9pt;
      }

    // table.first {
    //     color: #003300;
    //     font-family: helvetica;
    //     font-size: 8pt;
    //     border-left: 3px solid red;
    //     border-right: 3px solid #FF00FF;
    //     border-top: 3px solid green;
    //     border-bottom: 3px solid blue;
    //     background-color: #ccffcc;
    // }
    // td {
    //     border: 2px solid blue;
    //     background-color: #ffffee;
    // }
    // td.second {
    //     border: 2px dashed green;
    // }

    div.test {
        color: #CC0000;
        background-color: #FFFF66;
        font-family: helvetica;
        font-size: 10pt;
        border-style: solid solid solid solid;
        border-width: 2px 2px 2px 2px;
        border-color: green #FF00FF blue red;
        text-align: center;
    }
    .lowercase {
        text-transform: lowercase;
    }
    .uppercase {
        text-transform: uppercase;
    }
    .capitalize {
        text-transform: capitalize;
    }
</style>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Goblin+One&display=swap" rel="stylesheet">
<h1 align="center">
REPORTE DE EXAMENES
</h1> 
<table style="font-size:10px; padding:5px 10px;font-family: pdfatimes;">

        <tr>        
        <td style=" border: 0.5px solid #FFFFFF; background-color:white; width:60px;text-align:left"><b>Nombre</b></td>
        <td style="border: 0.5px solid #FFFFFF;  background-color:white; width:570px; text-align:left">: $respuesta[pac_nombres] </td>
       
        </tr>
        <tr>        
        <td style="border: 0.5px solid  #FFFFFF; background-color:white; width:60px; text-align:left"><b>Apellidos</b></td>
        <td style="border: 0.5px solid  #FFFFFF; background-color:white; width:570px; text-align:left">: $respuesta[pac_apellidos] </td>
       
        </tr>
        <tr>        
                <td style="border: 0.5px solid  #FFFFFF; background-color:white; width:60px; text-align:left"><b>Edad</b></td>
                <td style="border: 0.5px solid  #FFFFFF; background-color:white; width:570px; text-align:left">: $respuesta[pac_edad]  </td>
        </tr>

        

    </table>

<h4 align="right">
Fecha: $respuesta[ela_fecha]
</h4>
<label>Numero de muestra</label> $respuesta[ela_numero_muestra]<input>&nbsp;&nbsp;
<label>Distancia de la piel</label> $respuesta[ela_distancia_piel]<input><label>cm</label><br>
<center> 
<table>

<tr>
  <td colspan="2">Resultados</td><br>
</tr>

<tr>
  <td>
            <label>1.-</label>
            <input >$respuesta[ela_muestra_1]  <label>KPa.</label><br>
            <label>2.-</label>
            <input>$respuesta[ela_muestra_2] <label>KPa.</label><br>
            <label>3.-</label>
            <input >$respuesta[ela_muestra_3]<label>KPa.</label><br>
            <label>4.-</label>
            <input >$respuesta[ela_muestra_4]<label>KPa.</label><br>
            <label>5.-</label>
            <input >$respuesta[ela_muestra_5]<label>KPa.</label><br>
            <label>6.-</label>
            <input>$respuesta[ela_muestra_6]<label>KPa.</label><br>
            <label>7.-</label>
            <input>$respuesta[ela_muestra_7]<label>KPa.</label><br>
            <label>8.-</label>
            <input >$respuesta[ela_muestra_8]<label>KPa.</label><br>
          </td>
       <td>      
         &nbsp;<label>9.-</label>&nbsp;
            <input >$respuesta[ela_muestra_9]<label>KPa.</label><br>
            <label>10.-</label>
            <input>$respuesta[ela_muestra_10]<label>KPa.</label><br>
            <label>11.-</label>
            <input >$respuesta[ela_muestra_11]<label>KPa.</label><br>
            <label>12.-</label>
            <input>$respuesta[ela_muestra_12]<label>KPa.</label><br>
            <label>13.-</label>
            <input >$respuesta[ela_muestra_13]<label>KPa.</label><br>
            <label>14.-</label>
            <input >$respuesta[ela_muestra_14]<label>KPa.</label><br>
            <label>15.-</label>
            <input>$respuesta[ela_muestra_15]<label>KPa.</label><br>
            <label>16.-</label>
            <input >$respuesta[ela_muestra_16]<label>KPa.</label></td>
</tr>
</table><br><br>
</center>

<label>Rigidez est de...........: $respuesta[ela_rigidez_promedio]</label> <input><label>KPa.</label><br>
<label>Rigidez media de......: $respuesta[ela_rigidez_est]</label> <input ><label>KPa.</label><br>
<label>Rigidez Promedia de: $respuesta[ela_rigidez_media]</label> <input><label>KPa.</label><br>          
<br><label>Diagnostico: $respuesta[ela_diagnostico]</label><br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<p style="text-align:left">
     <hr style="width:200px">
     <h4>Firma</h4>
</p>

EOF; 


// output the HTML content


$pdf->writeHTML($bloque1, true, false, true, false, '');


$pdf->Output('actividad.pdf', 'I');
error_reporting(0);
}

}

$actividad = new imprimirExamenelasto();
$actividad-> idelastografia = $_GET["idelastografia"];
$actividad -> traerimprimirExamenElasto();


//============================================================+
// END OF FILE
//============================================================+
  ?>
 