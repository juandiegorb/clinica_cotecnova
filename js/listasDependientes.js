$(document).ready(function(){
    $('#departamento').on('change', function(){
    if($('#departamento').val() == ""){
	$('#ciudad').empty();
	$('<option value = "">Selecciona una ciudad</option>').appendTo('#ciudad');
	$('#ciudad').attr('disabled', 'disabled');
    }else{
	$('#ciudad').removeAttr('disabled', 'disabled');
	$('#ciudad').load('municipiosGet.php?id_departamento=' + $('#departamento').val());
	}
    });
});

