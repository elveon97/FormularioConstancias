
<?php

require_once "../conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();

$sql="SELECT evento_id, nombre FROM evento";
$result=mysqli_query($conexion,$sql);

?>


<div>
	<table class="table table-hover table-condensed table-bordered" id="iddatatable">
		<thead style="background-color: #4A4A4A;color: white; font-weight: bold;">
			<tr>
				<td>Nombre</td>
				<td>Ver validación</td>
				<td>Eliminar</td>
			</tr>
		</thead>
		<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
			<tr>
				<td>Nombre</td>
				<td>Ver validación</td>
				<td>Eliminar</td>
			</tr>
		</tfoot>
		<tbody >
			<?php
			while ($row = mysqli_fetch_row($result)) {
				if (!is_dir("../../archivosValidarCurso/" . $row[0])) continue;
				?>
				<tr >
					<td><?php echo $row[1]; ?></td>
					<td style="text-align: center;">
						<span class="btn btn-primary btn-sm" onclick="visualizar('<?php echo $row[0]; ?>')">
							<span class="fa fa-file"></span>
						</span>
					</td>
					<td style="text-align: center;">
						<span class="btn btn-dark btn-sm" onclick="eliminar('<?php echo $row[0]; ?>')">
							<span class="fa fa-trash"></span>
						</span>
					</td>
				</tr>
				<?php
			}			
			?>
		</tbody>
	</table>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#iddatatable').DataTable({
			language:
			{
			    "sProcessing":     "Procesando...",
			    "sLengthMenu":     "Mostrar _MENU_ registros",
			    "sZeroRecords":    "No se encontraron resultados",
			    "sEmptyTable":     "Ningún dato disponible en esta tabla",
			    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
			    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			    "sInfoPostFix":    "",
			    "sSearch":         "Buscar:",
			    "sUrl":            "",
			    "sInfoThousands":  ",",
			    "sLoadingRecords": "Cargando...",
			    "oPaginate": {
			        "sFirst":    "Primero",
			        "sLast":     "Último",
			        "sNext":     "Siguiente",
			        "sPrevious": "Anterior"
			    },
			    "oAria": {
			        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
			        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
			    }
			}
		});
	} );
</script>
