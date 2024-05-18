<?php
require_once "MyCustomPDFWithWatermark2.php";
 
require_once "../../../controladores/obstetricia.controlado.php"; 
require_once "../../../modelos/obstetricia.modelo.php"; 
 
// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document 
class imprimirActividad{
 
 
public $idobstetra; 
public function traerImpresionActividad(){

 $item = "id_actividad";
 $valor = $this->idobstetra; 


$respuesta= ControladorObstetra::ctrMostrarObstetra($item,$valor);       

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
        <td style="border: 0.5px solid #FFFFFF;  background-color:white; width:570px; text-align:left">: $respuesta[pac_nombres]</td>
       
        </tr>
        <tr>        
        <td style="border: 0.5px solid  #FFFFFF; background-color:white; width:60px; text-align:left"><b>Apellidos</b></td>
        <td style="border: 0.5px solid  #FFFFFF; background-color:white; width:570px; text-align:left">: $respuesta[pac_apellidos] </td>
       
        </tr>
        <tr>        
                <td style="border: 0.5px solid  #FFFFFF; background-color:white; width:60px; text-align:left"><b>Edad</b></td>
                <td style="border: 0.5px solid  #FFFFFF; background-color:white; width:570px; text-align:left">: $respuesta[pac_edad] </td>
        </tr>

        

    </table>

<h4 align="right">
Fecha: $respuesta[obs_fecha]
</h4>
<table style="font-size:10px; padding:5px 10px;font-family: pdfatimes;">
<tr>        
<td style=" border: 0.5px solid #000000; border-bottom-color: 5px #EEEEEE;background-color:white; width:150px;text-align:left">Resultados obstetricia</td>
<td style="border: 0.5px solid  #000000; border-bottom-color: 5px  #EEEEEE; background-color:white; width:180px; text-align:left">Descripcion</td>
<td style="border: 0.5px solid  #000000; border-bottom-color: 5px  #EEEEEE; background-color:white; width:200px; text-align:left">Observación</td>
</tr>
<tr>        
<td style=" border: 0.5px solid #000000; border-bottom-color: 5px #EEEEEE;background-color:white; width:150px;text-align:left"><br><br><br><br><br><br><br><br>Abdomen<br><br><br><br><br><br><br>Corazon<br><br><br><br><br><br><br><br><br><br>Extremidades superiores<br><br><br><br><br>Inferio</td>
<td style="border: 0.5px solid  #000000; border-bottom-color: 5px  #EEEEEE; background-color:white; width:180px; text-align:left">Ventriculos Laterales: $respuesta[obs_Ven]<br>Plexos caraoideos: $respuesta[obs_PlexosCo]<br>Cerebelo: $respuesta[obs_Cere]<br>Fosa posterior: $respuesta[obs_FosaPost]<br>Cavum S.P: $respuesta[obs_Cavum]<br>Labios: $respuesta[obs_Labios]<br>Fosas Orbitrarias: $respuesta[obs_Fosas_Orbi]<br><br>O.nasales: $respuesta[obs_Onasales]<br>Pared Abdominal: $respuesta[obs_p_Abdom]<br>Estomago: $respuesta[obs_Estomago]<br>Vesicula Biliar: $respuesta[obs_VBilliar]<br>Riñon derecho: $respuesta[obs_Rinon_der]<br>Riñon Izquierdo: $respuesta[obs_Rinon_izq]<br><br>Vejiga Urinaria: $respuesta[obs_Veji_Uri]<br>Cuatro cavidades:: $respuesta[obs_Cuatro_cav]<br>Septum Interventricular: $respuesta[obs_Septum_Int]<br>Vasos sanguineos: $respuesta[obs_Vasos_san]<br>Cayado Aórtico: $respuesta[obs_Cayado_Ao]<br>Aorta: $respuesta[obs_Aorta]<br>Pulmones: $respuesta[obs_pulmones]<br>Diafragma: $respuesta[obs_Diafra]<br>Columna vertebral: $respuesta[obs_co_vertebral]<br><br>Humero: $respuesta[obs_Humero]<br>cubito: $respuesta[obs_cubito]<br>Radial: $respuesta[obs_radial]<br>Mano: $respuesta[obs_mano]<br>Dedos: $respuesta[obs_dedos]<br><br>Femur: $respuesta[obs_femur]<br>Tibia: $respuesta[obs_tibia]<br>Peroné: $respuesta[obs_Perone]<br>Pies: $respuesta[obs_pies]<br>Dedos: $respuesta[obs_dedosp]<br>Dov.Respiratorios: $respuesta[obs_mRespi]<br>Mov del feto:: $respuesta[obs_Mov_feto]<br>Anexos cordon 3 vasos: $respuesta[obs_ACordon]</td>
<td style="border: 0.5px solid  #000000; border-bottom-color: 5px  #EEEEEE; background-color:white; width:200px; text-align:left">$respuesta[obs_Ven_comen]<br>$respuesta[obs_PlexosCo_comen]<br>$respuesta[obs_Cere_comen]<br>$respuesta[obs_FosaPost_comen]<br>$respuesta[obs_Cavum_comen]<br>$respuesta[obs_Labios_comen]<br>$respuesta[obs_Fosas_Orbi_comen]<br>$respuesta[obs_Onasales_comen]<br>$respuesta[obs_p_Abdom_comen]<br>$respuesta[obs_Estomago_comen]<br>$respuesta[obs_VBilliar_comen]<br>$respuesta[obs_Rinon_izq_comen]<br><br>$respuesta[obs_Veji_Uri_comen]<br>$respuesta[obs_Cuatro_cav_comen]<br>$respuesta[obs_Septum_Int_comen]<br>$respuesta[obs_Vasos_san_comen]<br>$respuesta[obs_Cayado_Ao_comen]<br>$respuesta[obs_Aorta_comen]<br>$respuesta[obs_Diafra_comen]<br>$respuesta[obs_co_vertebral_comen]<br><br>$respuesta[obs_Humero_comen]<br>$respuesta[obs_cubito_comen]<br>$respuesta[obs_radial_comen]<br>$respuesta[obs_mano_comen]<br>$respuesta[obs_dedos_comen]<br><br>$respuesta[obs_femur_comen]<br>$respuesta[obs_tibia_comen]<br>$respuesta[obs_Perone_comen]<br>$respuesta[obs_pies_comen]<br>$respuesta[obs_dedosp_comen]<br>$respuesta[obs_Mov_feto_comen]<br>$respuesta[obs_ACordon_comen]</td>
</tr>
</table> 
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

$actividad = new imprimirActividad();
$actividad-> idobstetra = $_GET["idobstetra"];
$actividad -> traerImpresionActividad();


//============================================================+
// END OF FILE
//============================================================+
  ?>
 