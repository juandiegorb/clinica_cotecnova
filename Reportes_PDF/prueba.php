<?php 

include '../Modelo/PDF_MC_Table.php';
require '../Modelo/MySQL.php';

$pdf = new PDF_MC_Table('L');

$mysql = new MySQL();
$mysql->conectar();
$datos = $mysql->efectuarConsulta("SELECT citas.id_cita, citas.fecha_hora, citas.motivo_consulta, 
    CONCAT(usuarios.nombre_completo, ' ',usuarios.apellidos) AS 'paciente', 
    CONCAT(medicos.nombre_completo, ' ',medicos.apellidos) AS 'medico'
    FROM citas 
    INNER JOIN usuarios ON usuarios.id_usuario = citas.usuario_id 
    INNER JOIN medicos ON medicos.id_medico = citas.medico_id 
    WHERE citas.estado = 1");
$mysql->desconectar();

$pdf->AddPage();
$pdf->SetFont('Arial','',14);

$pdf->SetWidths(Array(20,75,75,55,60));
$pdf->SetLineHeight(5);
$pdf->SetAligns(Array('C','','','',''));

//Header tabla
$pdf->SetFont('Arial','B',14);
$pdf->Cell(20,10,"ID",1,0);
$pdf->Cell(75,10,'Paciente',1,0);
$pdf->Cell(75,10,'Medico',1,0);
$pdf->Cell(55,10,'Fecha y hora',1,0);
$pdf->Cell(60,10,'Motivo',1,0);

$pdf->Ln();

$pdf->SetFont('Arial','',14);


foreach($datos as $item)
{
    $pdf->Row(Array(
        $item['id_cita'],
        $item['paciente'],
        $item['medico'],
        $item['fecha_hora'],
        $item['motivo_consulta']
    ));
}

$pdf->Output();
?>