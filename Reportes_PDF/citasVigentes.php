<?php

//Llamar clases PDF y MySQL
require '../Modelo/PDF.php';
require '../Modelo/MySQL.php';

//Instanciar clases PDF y MySQL
$pdf = new PDF('L','mm','A4');
$mysql = new MySQL();

$mysql->conectar(); //Conectar a BD

//Consultar para traer datos de la tabla citas
$datos = $mysql->efectuarConsulta("SELECT citas.id_cita, citas.fecha_hora, citas.motivo_consulta, 
	CONCAT(usuarios.nombre_completo, ' ',usuarios.apellidos) AS 'paciente', 
	CONCAT(medicos.nombre_completo, ' ',medicos.apellidos) AS 'medico'
	FROM citas 
	INNER JOIN usuarios ON usuarios.id_usuario = citas.usuario_id 
	INNER JOIN medicos ON medicos.id_medico = citas.medico_id 
	WHERE citas.estado = 1");

$mysql->desconectar(); //Desconectar de BD

//Titulo del documento
$titulo = 'Reporte de citas vigentes'; 
$pdf->SetTitle($titulo); 

//Titulos de las columnas
//$header = array('ID','Paciente','Medico','Fecha y hora','Motivo');

//Generar tabla 
$pdf->AddPage(); //Añadir pagina al documento
$pdf->SetFont('Arial','B',14);

//Header
$pdf->Cell(10,10,'ID',1,0,'C');
$pdf->Cell(75,10,'Paciente',1,0,'C');
$pdf->Cell(75,10,'Medico',1,0,'C');
$pdf->Cell(55,10,'Fecha y hora',1,0,'C');
$pdf->Cell(60,10,'Motivo',1,1,'C');

$pdf->SetFont('Arial','',14);

while($row = $datos->fetch_assoc())
{
    $pdf->Cell(10,10,utf8_decode($row['id_cita']),1,0,'C');
    $pdf->Cell(75,10,utf8_decode($row['paciente']),1,0);
    $pdf->Cell(75,10,utf8_decode($row['medico']),1,0);
    $pdf->Cell(55,10,utf8_decode($row['fecha_hora']),1,0);
    $pdf->Cell(60,10,utf8_decode( $row['motivo_consulta']),1,1);
}

$pdf->AliasNbPages(); //Numeracion de paginas

$pdf->Output('Reporte_Citas_Vigentes.pdf','I');