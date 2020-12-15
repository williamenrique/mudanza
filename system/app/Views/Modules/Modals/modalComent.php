<!-- Modal -->
<div class="modal fade" id="modalComent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
		<form class="comentario" id="formComent">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="titleModal">Modal title</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
						<input type="hidden" id="idComent" name="idComent" value="">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="txtNombre">Nombre</label>
								<input type="text" name="txtNombre" id="txtNombre" class="form-control">
							</div>
							<div class="form-group col-md-6">
								<label for="txtEmail">Email</label>
								<input type="email" id="txtEmail" name="txtEmail" class="form-control">
							</div>
							<div class="form-group col">
								<label for="txtMensaje">Mensaje</label>
								<textarea name="txtMensaje" id="txtMensaje" class="form-control">
								</textarea>
							</div>
						</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary" id="btnActionForm"><span id="btnText">Comentar</span></button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				</div>
			</div>
		</form>
  </div>
</div>