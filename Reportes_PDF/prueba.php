<?php 

include '../Modelo/PDF_MC_Table.php';

$pdf = new PDF_MC_Table();

$pdf->AddPage();
$pdf->SetFont('Arial','',14);

$pdf->SetWidths(Array(20,40,40,30,20,40));
$pdf->SetLineHeight(5);
$pdf->SetAligns(Array('','R','C','','',''));

//Header tabla
$pdf->SetFont('Arial','B',14);
$pdf->Cell(20,5,"ID",1,0);
$pdf->Cell(40,5,"First Name",1,0);
$pdf->Cell(40,5,"Last Name",1,0);

$pdf->Ln();

$pdf->SetFont('Arial','',14);

$data=array(
    array(
        "1",
        "Foo, overflowed text length",
        "This contains a long text. not too long but longer than cell's width. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to ",
        "Something"
    ),
    array(
        "1",
        "Bar, normal text length",
        "This should not exceed the cell's width.",
        "Something else"
    ),
    array(
        "1",
        "Baz, overflowed text length",
        "This also contains a long text, not too long but longer than cell's width.",
        "Something else"
    )
);

foreach($data as $item)
{
    $pdf->Row(Array(
        $item[0],
        $item[1],
        $item[2]
    ));
}

$pdf->Output();
?>