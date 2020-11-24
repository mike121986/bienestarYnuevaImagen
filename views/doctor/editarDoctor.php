<div class="card border-0 shadow my-2">
	<div class="card-body p-5">
		<?php require_once 'views/layout/cabeceraLogo.php';?>
		<?php $sesion = ""; 
		 if(isset($_SESSION['formulario_doctor'])){$sesion = $_SESSION['formulario_doctor']['datos'];}?>
		<div class="texcto">
			<?php if($sesion != ""){echo '<p class="alert alert-danger error" role="alert">'.$_SESSION['formulario_doctor']["error"]."</p>";}
			 if(isset($_SESSION['statusSave'])) echo '<p class="alert alert-success error" role="alert">'.$_SESSION['statusSave']."</p>";
			 Utls::deleteSession('formulario_doctor') ?>
			<?php Utls::deleteSession('statusSave') ?>
		</div>
		<div style="height: auto">
			<form id="registroDoctor" action="<?=base_url?>Doctor/updateDatos" method="POST">	
				<div class="page-header"><small>DATOS PERSONALES</small></div>
				<input type="hidden" name="idDoc" value="<?=$_GET['id']?>">
                <hr>			
				<div class="form-row">
					<div class="form-group col-md-4">
						<label for="intputname">Nombre</label>
						<input type="text" class="form-control" id="intputname" name="intputname" value="<?php if($sesion != ""){echo $sesion["Nombre"];}else{echo SED::decryption($datos->nombreUsuarioDoctor);}?>">
					</div>
					<div class="form-group col-md-4">
						<label for="inputAppat">Apellido Paterno</label>
						<input type="text" class="form-control" id="inputAppat" name="inputAppat" value="<?php  if($sesion != ""){echo $sesion["Apellido_Pat"];}else{echo SED::decryption($datos->apPUsuarioDoctor);}?>">
					</div>
					<div class="form-group col-md-4">
						<label for="inputApmat">Apellido Materno</label>
						<input type="text" class="form-control" id="inputApmat" name="inputApmat" value="<?php  if($sesion != ""){echo $sesion["Apellido_Mat"];}else{echo SED::decryption($datos->apMUsuarioDoctor);}?>">
					</div>
				</div>
				<div class="form-row ">
					<div class="form-control col-md-4 genero">
					    <label for="intputSexo" id="intputSexo">SEXO</label>
						<div class="custom-control custom-radio custom-control-inline radio-Sexo">
						  <input type="radio" id="customRadioInline1" name="customRadioSexo"  value="hombre" <?php if($sesion != "" && $sesion["sexo"] == 'hombre'|| $datos->sexoUsuarioDoctor == 'hombre') echo 'checked="checked"';?>>
						  <label  for="customRadioInline1">hombre</label>
						</div>
						<div class="custom-control custom-radio custom-control-inline radio-Sexo">
						  <input type="radio" id="customRadioInline2" name="customRadioSexo"  value="mujer" <?php if($sesion != "" && $sesion["sexo"] == 'mujer' || $datos->sexoUsuarioDoctor == 'mujer') echo 'checked="checked"';?>>
						  <label  for="customRadioInline2">mujer</label>
                        </div>                        
                    </div>
                    <div class="form-group col-md-4">
						<label for="inpuCorreo">Correo</label>
						<input type="text" class="form-control" id="inpuCorreo" name="inpuCorreo" value="<?php  if($sesion != ""){echo $sesion["correo"];}else{ echo $datos->correoUsuario;}?>" readonly>
						<div id="error" class=""></div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="tipoUser">Tipo Usuario</label>
                        <select class="form-control" id="tipoUser" name="tipoUser">
                        <option value="<?=$datos->tipoUsuario;?>" selected><?=  $tipoUser; ?></option>
                        <option value="2">Doctor</option>
                        <option value="3">Administrador</option>
					</select>
				</div>
				<div class="form-group col-md-4">
					<label for="statusUSer">Status Usuario</label>
					<select class="form-control" id="statusUSer" name="statusUSer">
						<option value="<?= $datos->statusUusario; ?>" selected><?=  $status; ?></option>
                        <option value="1">Activo</option>
                        <option value="2">Vacaciones</option>
                        <option value="3">Baja</option>
                        </select>
                    </div>
					<div class="form-group col-md-8" id="MotivoStatus" style="display: none;">
						<div class="form-group">
							<label for="exampleFormControlTextarea1">Motivo Status</label>
							<textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
						</div>
					</div>
				</div>
				<!-- <button class="btn btn-primary" type="submit">Submit form</button> -->
				<!-- <input type="submit" class="btn btn-primary" id="btn-envDoctor" values="enviar" name="enviar"> -->
			<!-- </form> -->
			<hr>
			<h4>PERMISOS</h4>
			<!-- <form action="<?=base_url?>Doctor/permisos" method="POST" id="frmPermisos" novalidate> -->
				<div class="row" id="">
					<div class="col mb-4 border">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="Paciente" disabled>
							<label class="form-check-label" for="Paciente">
								PACIENTE
							</label>
						</div>
						<div class="form-check ml-5">
							<input class="form-check-input pacientesChecks" type="checkbox" value="1" name="check[]" id="pacienteAlta" <?php if (in_array('1',$menuPersonal)) {echo 'checked="checked"';}?>>
							<label class="form-check-label" for="pacienteAlta">
								ALTA PACIENTES
							</label>
						</div>
						<div class="form-check ml-5">
							<input class="form-check-input pacientesChecks" type="checkbox" value="2" name="check[]" id="pacienteEditar" <?php if (in_array('2',$menuPersonal)) {echo 'checked="checked"';}?>>
							<label class="form-check-label" for="pacienteEditar">
								MIS PACIENTES
							</label>
						</div>
						<div class="form-check ml-5">
							<input class="form-check-input pacientesChecks" type="checkbox" value="3" name="check[]" id="pacienteDatos" <?php if (in_array('3',$menuPersonal)) {echo 'checked="checked"';}?>>
							<label class="form-check-label" for="pacienteDatos">
								NUEVO INGRESO
							</label>
						</div>
					</div>
					<div class="col mb-4 ml-2 border">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="Consultorio">
							<label class="form-check-label" for="Consultorio">
								CONSULTORIO
							</label>
						</div>
						<div class="form-check ml-5">
							<input class="form-check-input consultorioCheck" type="checkbox" value="4" name="check[]" id="registroDiario" <?php if (in_array('4',$menuPersonal)) {echo 'checked="checked"';}?>>
							<label class="form-check-label" for="registroDiario">
								REGISTRO DIARIO
							</label>
						</div>
						<div class="form-check ml-5">
							<input class="form-check-input consultorioCheck" type="checkbox" value="5" name="check[]" id="registroGastos" <?php if (in_array('5',$menuPersonal)) {echo 'checked="checked"';}?>>
							<label class="form-check-label" for="registroGastos">
								REGISTRO GASTOS
							</label>
						</div>
						<div class="form-check ml-5">
							<input class="form-check-input consultorioCheck" type="checkbox" value="6" name="check[]" id="consultorioMedicmento" <?php if (in_array('6',$menuPersonal)) {echo 'checked="checked"';}?>>
							<label class="form-check-label" for="consultorioMedicmento">
								CONTROL
							</label>
						</div>
						
					</div>
					<div class="col mb-4 ml-2 border">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="Doctor">
							<label class="form-check-label" for="Doctor">
								ADMINISTRACION
							</label>
						</div>
						<div class="form-check ml-5">
							<input class="form-check-input doctorCheck" type="checkbox" value="7" name="check[]" id="doctorAlta" <?php if (in_array('7',$menuPersonal)) {echo 'checked="checked"';}?>>
							<label class="form-check-label" for="doctorAlta">
								TODOS LOS PACIENTES
							</label>
						</div>
						<div class="form-check ml-5">
							<input class="form-check-input doctorCheck" type="checkbox" value="8" name="check[]" id="doctorLista" <?php if (in_array('8',$menuPersonal)) {echo 'checked="checked"';}?>>
							<label class="form-check-label" for="doctorLista">
								ALTA CONSULTORIO
							</label>
						</div>
						<div class="form-check ml-5">
							<input class="form-check-input doctorCheck" type="checkbox" value="9" name="check[]" id="doctorEditar" <?php if (in_array('9',$menuPersonal)) {echo 'checked="checked"';}?>>
							<label class="form-check-label" for="doctorEditar">
								LISTA CONSULTORIO
							</label>
						</div>
						<div class="form-check ml-5">
							<input class="form-check-input doctorCheck" type="checkbox" value="10" name="check[]" id="doctorEditar" <?php if (in_array('10',$menuPersonal)) {echo 'checked="checked"';}?>>
							<label class="form-check-label" for="doctorEditar">
								REPORTE GLOBAL
							</label>
						</div>
						<div class="form-check ml-5">
							<input class="form-check-input doctorCheck" type="checkbox" value="11" name="check[]" id="doctorEditar" <?php if (in_array('11',$menuPersonal)) {echo 'checked="checked"';}?>>
							<label class="form-check-label" for="doctorEditar">
								LISTA DOCTORES
							</label>
						</div>
						<div class="form-check ml-5">
							<input class="form-check-input doctorCheck" type="checkbox" value="12" name="check[]" id="doctorEditar" <?php if (in_array('12',$menuPersonal)) {echo 'checked="checked"';}?>>
							<label class="form-check-label" for="doctorEditar">
								ALTA DOCTOR
							</label>
						</div>
					</div>
				</div>
				<div class="mt-4 text-left botonRegistrar">
					<button type="submit" class="btn btn-lg btn-outline-success" name="btnPermisos">REGISTRAR</button>
					<!-- <input type="submit" class="btn btn-primary" id="btn-Permisos" values="REGISTRAR" name="btnPermisos"> -->
				</div>
			</form>
		</div>
	</div>
</div>

