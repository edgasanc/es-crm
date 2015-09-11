<?php
/**
 * HTML2PDF Librairy - example
 *
 * HTML => PDF convertor
 * distributed under the LGPL License
 *
 * @author      Laurent MINGUET <webmaster@html2pdf.fr>
 *
 * isset($_GET['vuehtml']) is not mandatory
 * it allow to display the result in the HTML format
 */
 	// Conexion DV
	include(dirname(__FILE__).'/../conexion.php');

	//Datos _POST
	$idCliente=$_GET['idCliente'];
	$idPedido=$_GET['idPedido'];
	//$idCarroPedido=$_GET['idCarroPedido'];

	// Consultas SQL
	include(dirname(__FILE__).'/../consultas.php');

	// get the HTML
    ob_start();
    include(dirname(__FILE__).'/res/factura.php');
    $content = ob_get_clean();

    // convert in PDF
    require_once(dirname(__FILE__).'/../html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'L', 'es');
//      $html2pdf->setModeDebug();
        $html2pdf->setDefaultFont('Arial');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('factura.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
