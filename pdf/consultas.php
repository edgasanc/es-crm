<?php
	//Definir Idioma
	$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
	$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

	//Consulta Clientes
	$sqlCliente="SELECT * FROM cliente WHERE idCliente='$idCliente'";
	$resultCliente = $conn->query($sqlCliente);

	//Resultados Clientes
	if ($resultCliente->num_rows > 0) {
	// output data of each row
		while($row1= $resultCliente->fetch_assoc()) {
			//Variables link_estudiante_curso
			$razonSocial= $row1['razonSocial'];
			$direccion= $row1['direccion'];
			$barrio= $row1['barrio'];
			$telefono= $row1['telefono'];
			$nit= $row1['nit'];
			$email= $row1['email'];
		}
	}

	//Consultas Pedidos
	$sqlPedido="SELECT * FROM pedido WHERE idPedido='$idPedido' AND cliente_idCliente='$idCliente'";
	$resultPedido= $conn->query($sqlPedido);

	//Resultado Pedidos
	if ($resultPedido->num_rows > 0) {
	// output data of each row
		while($row2= $resultPedido->fetch_assoc()) {
			//Variables link_estudiante_curso
			$idPedido= $row2['idPedido'];
			$fechaEntrega= $row2['fechaEntrega'];
			$fechaOrden= $row2['fechaOrden'];
		}
	}

	//Consulta Carro Compras
	$sqlCarroCompras="SELECT p.codigo, p.producto, i.valor, c.cantidad, p.precio FROM carropedido c, producto p, impuesto i
WHERE c.producto_IdProducto = p.idProducto AND p.impuestos_idImpuesto = i.idImpuesto AND c.pedido_idPedido='$idPedido'";
	$resultCarroCompras= $conn->query($sqlCarroCompras);

	
/*
	//Consultas
	$sqlEstudiante="SELECT e.nombres, e.apellidos, e.numero_documento, e.ciudad_expedicion, t.descripcion_tipo_documento, e.tipo_sangre, e.ano_nacimiento, e.nombre_eps, e.celular, e.direccion_casa, e.telefono_casa, e.barrio_casa, e.direccion_oficina, e.telefono_oficina, e.barrio_oficina, e.empresa, e.nombre_caso_accidente, e.telefono_caso_accidente, e.observaciones FROM tbl_estudiante e INNER JOIN pltbl_tipodocumento t ON t.idpltbl_tipodocumento=e.tipo_documento WHERE idEstudiante='".$idEstudiante."'";
	$resultEstudiante = $conn->query($sqlEstudiante);

	//Resultados Estudiante
	if ($resultEstudiante->num_rows > 0) {
	// output data of each row
		while($row = $resultEstudiante->fetch_assoc()) {
			//Variables tbl_estudiante
			$nombres= strtoupper($row['nombres'])." ".strtoupper($row['apellidos']);
			//Separador de miles
			$noDocumento= number_format($row['numero_documento'], 0, ",", ".");
			$ciudadDocumento= strtoupper($row['ciudad_expedicion']);
			$tipoDocumento= strtoupper($row['descripcion_tipo_documento']);
			$tipoSangre= strtoupper($row['tipo_sangre']);
			$nombreEPS= strtoupper($row['nombre_eps']);
			$celular= $row['celular'];
			$direccionCasa= strtoupper($row['direccion_casa']);
			$telefonoCasa= $row['telefono_casa'];
			$barrioCasa= strtoupper($row['barrio_casa']);
			$direccionTrabajo= strtoupper($row['direccion_oficina']);
			$telefonoTrabajo= $row['telefono_oficina'];
			$barrioTrabajo= strtoupper($row['barrio_oficina']);
			$empresa= strtoupper($row['empresa']);
			$observacion= $row['observaciones'];
			$accidenteNombre= strtoupper($row['nombre_caso_accidente']);
			$accidenteTelefono= $row['telefono_caso_accidente'];
		}
	}
	*/
	$conn->close();
?>
