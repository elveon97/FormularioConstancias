<!-- Modal para buscar las constancias -->
  <div class="modal fade" id="buscadorConstancias" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content w-100">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Buscador de Constancias</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body w-100">
          <form id="formConsultarConstancia" class="w-100">
            <label for="folio">Folio de la Constancia</label>
            <select id="folio" name="folio">


            </select>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" id="btnConsultarConstancias" class="btn btn-primary">Buscar Constancia</button>
        </div>
      </div>
    </div>
  </div>


<script type="text/javascript">
$(document).ready(function(){
  $('#btnConsultarConstancias').click(function(){
    datos=$('#formConsultarConstancia').serialize();
    //Envio de parametro por _$GET
    location.href="interfazConsultaConstancias.php?"+datos;
  });
});
</script>
