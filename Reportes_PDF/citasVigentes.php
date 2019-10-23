<?php

//Llamar clase PDF y MySQL
require '../Modelo/PDF.php';
require '../Modelo/MySQL.php';

//Instanciar clases PDF y MySQL
$pdf = new PDF('L','mm','A4');
$mysql = new MySQL;

$mysql->conectar(); //Conectar a BD

//Consultar para traer datos de la tabla citas
$datos = $mysql->efectuarConsulta("select id_cita, fecha_hora, motivo_consulta, estado from clinica_cotecnova.citas where estado = 1");

$dUsuarios = $mysql->efectuarConsulta("select usuario_id from clinica_cotecnova.citas where estado = 1");
$dMedicos = $mysql->efectuarConsulta("select medico_id from clinica_cotecnova.citas where estado = 1");

while($resultado = mysqli_fetch_assoc($dUsuarios))
{
    $idUsuario = $resultado['usuario_id']; 
}

while($resultado = mysqli_fetch_assoc($dMedicos))
{
    $idMedico = $resultado['medico_id']; 
}

$usuario = $mysql->efectuarConsulta("select nombre_completo, apellidos from clinica_cotecnova.usuarios where id_usuario = ".$idUsuario."");
$medico = $mysql->efectuarConsulta("select nombre_completo, apellidos from clinica_cotecnova.medicoswhere id_medico = ".$idMedico."");

$mysql->desconectar(); //Desconectar de BD

//Titulo del documento
$titulo = 'Reporte de citas vigentes'; 
$pdf->SetTitle($titulo); 

//Titulos de las columnas
$header = array('ID','Paciente','Medico','Fecha y hora','Motivo');

//Cargar datos
//$data = $pdf->LoadData('citasVigentes.txt');

//Generar tabla 
$pdf->AddPage(); //Añadir pagina al documento
$pdf->SetFont('Arial','',14);
$pdf->BasicTable($header,45,10); //Columnas

while($row = $datos->fetch_assoc())
{
    $pdf->Cell(45,10,$row['id_cita'],1,0);
    $pdf->Cell(45,10,$row[$usuario],1,0);
    $pdf->Cell(45,10,$row[$medico],1,0);
    $pdf->Cell(45,10,$row['fecha_hora'],1,0);
    $pdf->Cell(45,10,$row['motivo_consulta'],1,1);
}

$pdf->AliasNbPages(); //Numeracion de paginas

$pdf->Output('Reporte_Citas_Vigentes.pdf','I');