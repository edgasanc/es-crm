 <style type="text/Css">
<!--
.test1
{
    border: solid 1px #FF0000;
    background: #FFFFFF;
    border-collapse: collapse;
}
-->
</style>
<page style="font-size: 12px">
<table border="0">
  <tr>
    <td>
      <table border="0" cellpadding="2" cellspacing="2">
        <tr>
          <td width="530" style="text-align:center;">
            <P>
              <b>****COMPRAMAX JDC & MULTISERVICIOS****</b><br>
              Comercializadora<br>
              NIT 900669014-1 - PBX 6751355<br>
              Dirección: Calle 99 No 49 38<br>
              FACTURA IMPRESA POR COMPUTADOR
            </p>
          </td>
          <td width="200" style="text-align:center;"><img src="./res/logofinal.jpg" alt="JD&C"></td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<table border="0">
  <tr>
    <td>
      <table border="0" cellpadding="2" cellspacing="2">
        <tr>
          <td width="300" style="text-align:left;">
            <p>
              Razón Social: <?php echo $razonSocial; ?><br>
              Dirección: <?php echo $direccion; ?><br>
              Barrio: <?php echo $barrio; ?>
            </p>
          </td>
          <td width="224" style="text-align:left;">
            <p>
              NIT: <?php echo $nit; ?><br>
              Teléfono: <?php echo $telefono; ?><br><br>
            </p>
          </td>
          <td width="200" style="text-align:left;">
            <p>
              Factura de Venta: 000<?php echo $idPedido; ?><br>
              Fecha Factura: <?php echo $fechaOrden; ?><br>
              Fecha Entrega: <?php echo $fechaEntrega; ?>
            </p>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<!--<table border="0">
  <tr>
    <td>
      <table border="0" cellpadding="2" cellspacing="2">
        <tr>
          <td width="224" style="text-align:left;">
            <p>
              ZONA:<br>
              NORTE 1
            </p>
          </td>
          <td width="300" style="text-align:left;">
            <p>
              Vendedor:<br>
              JOSE GOMEZ
            </p>
          </td>
          <td width="200" style="text-align:left;">
            <p>
              Condición<br>
              CONTADO
            </p>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>-->
<table border="1">
  <tr>
    <td>
      <table border="0" cellpadding="2" cellspacing="2">
        <tr>
          <td width="50">Codigo</td>
          <td width="200">Producto</td>
          <td width="50" style='text-align:right;'>IVA</td>
          <td width="100" style='text-align:right;'>Cantidad Despachada</td>
          <td width="100" style='text-align:right;'>Valor Unitario</td>
          <td width="100" style='text-align:right;'>Valor Total</td>
          <td width="100" style='text-align:right;'>Valor Público</td>
        </tr>
        <?php
        //Resultado Carro Compras
      	if ($resultCarroCompras->num_rows > 0) {
      	// output data of each row
        $subTotal=0;
        $impuesto=0;
      		while($row3= $resultCarroCompras->fetch_assoc()) {
      			//Variables link_estudiante_curso
            $total=(intval($row3['cantidad'])*doubleval($row3['precio']))*(1+doubleval($row3['valor'])/100);
            $subTotal += intval($row3['cantidad'])*doubleval($row3['precio']);
            $impuesto+=(intval($row3['cantidad'])*doubleval($row3['precio']))*(doubleval($row3['valor'])/100);
            echo "<tr>";
      			echo "<td>".$row3['codigo']."</td>";
      			echo "<td>".$row3['producto']."</td>";
      			echo "<td style='text-align:right;'>".$row3['valor']."</td>";
      			echo "<td style='text-align:right;'>".$row3['cantidad']."</td>";
      			echo "<td style='text-align:right;'>".$row3['precio']."</td>";
            echo "<td style='text-align:right;'>".$total."</td>";
      			echo "<td style='text-align:right;'>0</td>";
            echo "</tr>";
      		}
      	}
        ?>
      </table>
    </td>
  </tr>
</table>
<br>
<table border="0">
  <tr>
    <td width="500">
      <p>
        Resolución No 41 de 2015 - SOMOS GRANDES CONTRIBUYENTES<br>
        RESOLUCION DIAN No 320001308886 FECHA 2015-09-04<br>
        NUMERACIÓN DEL C1 - C1000 HABILITA<br>
        LA PRESENTE FACTURA SE ASIMILA EN TODOS SUS EFECTOS A UNIDAD DE VALOR<br>
        SEGÚN ARTICULO 772 DEL CÓDIGO DE COMERCIO LEY 1231 DE 2008<br>
        <b>FAVOR ROTAR SU MERCANCIA PARA DISMINUIR PORCENTAJE DE DEVOLUCIONES</b><br>
        <b>** GRACIAS POR SU COMPRA **</b>
      </p>
    </td>
    <td width="100">
      <p>
        SUBTOTAL<br>
        IVA<br>
        AJUSTES<br>
        <b>TOTAL</b>
      </p>
    </td>
    <td width="100">
      <p style="text-align:right;">
        <?php echo $subTotal; ?><br>
        <?php echo $impuesto; ?><br>
        0<br>
        <b><?php echo $subTotal+$impuesto; ?></b>
      </p>
    </td>
  </tr>
</table>
</page>
