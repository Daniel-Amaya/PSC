	<!-- Modal Agregar -->
	<div class="modal" id="ModalAdd">
		<div class="flex-modal" role="document">
			<div class="contenido-modal">
				<form class="padding-mod" method="POST" id='addEvent'>

					<div class="">
						<h2 class="center" id="myModalLabel">Agregar Evento</h2>
					</div>
					<div class="modal-body">

						<div class="boxInput">
							<label for="title" class="col-sm-2 control-label">Titulo</label>
							<input type="text" name="title" class="form-control" id="title" placeholder="Titulo">
						</div>

						<div class="boxInput">
							<label for="color" class="col-sm-2 control-label">Color</label>
							<select name="color" class="form-control" id="color">
								<option value="">Seleccionar</option>
								<option style="color:#0071c5;" value="#0071c5">&#9724; Recaudación de donaciones</option>
								<option style="color:#40E0D0;" value="#40E0D0">&#9724; Cuidado del medio ambiente</option>
								<option style="color:#FF0000;" value="#FF0000">&#9724; Evento de adopciones</option>
								<!-- <option style="color:#000;" value="#000">&#9724; Negro</option> -->
							</select>
						</div>

						<div class="boxInput">
							<label for="start" class="col-sm-2 control-label">Fecha Inicial</label>
							<input type="text" name="start" class="form-control" id="start" readonly>
						</div>

						<div class="boxInput">
							<label for="end" class="col-sm-2 control-label">Fecha Final</label>
							<input type="text" name="end" class="form-control" id="end" readonly>
						</div>

						<div class="boxInput">
							<textarea name="" id="descripcion" cols="30" rows="10" placeholder="Descripción del evento"></textarea>
						</div>

					</div>

					<div class="boxInput">
						<button type="button" class="btn_rojo" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn_naranja">Guardar</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Modal editar-->
	<div class="modal" id="ModalEdit">
		<div class="flex-modal" role="document">
			<div class="contenido-modal">
					<div class="modal-header">
						<h4 class="center" id="myModalLabel">Modificar Evento</h4>
					</div>
					<div class="modal-body">

						<div class="boxInput">
							<label for="title">Titulo</label>
							<div >
								<input type="text" name="title"  id="title" placeholder="Titulo">
							</div>
						</div>
						<div class="boxInput">
							<label for="color">Color</label>
							<div class="col-sm-10">
								<select name="color" class="form-control" id="color">
									<option value="">Seleccionar</option>
									<option style="color:#0071c5;" value="#0071c5">&#9724; Recaudación de donaciones</option>
									<option style="color:#40E0D0;" value="#40E0D0">&#9724; Cuidado del medio ambiente</option>
									<option style="color:#FF0000;" value="#FF0000">&#9724; Evento de adopciones</option>
									<option style="color:#000;" value="#000">&#9724; Negro</option>

								</select>
							</div>
						</div>
							<div class="checkbox">
								<label><input type="checkbox" name="delete"> Eliminar Evento</label>
							</div>
						</div>

						<input type="hidden" name="id"  id="id">


					</div>
					<div class="modal-footer">
						<button type="button" class="btn_rojo" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn_naranja">Guardar</button>
					</div>
			</div>
		</div>
	</div>