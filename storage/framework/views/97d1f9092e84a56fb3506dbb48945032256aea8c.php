<?php $__env->startSection('contenidoSolicitud'); ?>
<!-- Form -->
<h2>Cotizar SOAT</h2>
<div class="wizard" id="wizard-cotizar-soat">
  <ul class="nav">
    <li>
      <a class="nav-link" href="#tab-pane-datos-personales">Paso 1 <br /><small>Datos personales</small></a>
    </li>
    <li>
      <a class="nav-link" href="#tab-pane-datos-vehiculo">Paso 2 <br /><small>Datos del vehículo</small></a>
    </li>
    <li>
      <a class="nav-link" href="#tab-pane-datos-cotizacion">Paso 3 <br /><small>Datos de la cotización</small></a>
    </li>
  </ul>

  <form autocomplete="off" id="frm-cotizar-soat">
    <div class="tab-content">
      <!-- Datos personales -->
      <div class="tab-pane" id="tab-pane-datos-personales">
        <div class="container">
          <fieldset class="form-group">
            <div class="row">
              <legend class="col-sm-5 col-form-label pt-0">¿Que tipo de persona es Usted?</legend>
              <div class="col-sm-7">
                <?php echo $__env->make('web.componentes.radiobutton_tipo_cliente', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
              </div>
            </div>
          </fieldset>

          <div class="form-group row d-none">
            <label for="txt-razon-social" class="col-sm-5 col-form-label">Razon Social</label>
            <div class="col-sm-7">
              <input type="text" name="razon_social" id="txt-razon-social" class="form-control" maxlength="100" required />
            </div>
          </div>

          <div class="form-group row">
            <label for="txt-nombres" class="col-sm-5 col-form-label">Nombres</label>
            <div class="col-sm-7">
              <input type="text" name="nombres" id="txt-nombres" class="form-control" maxlength="40" required />
            </div>
          </div>

          <div class="form-group row">
            <label for="txt-apellido-paterno" class="col-sm-5 col-form-label">Apellido Paterno</label>
            <div class="col-sm-7">
              <input type="text" name="apellido_paterno" id="txt-apellido-paterno" class="form-control" maxlength="40"
                required />
            </div>
          </div>

          <div class="form-group row">
            <label for="txt-apellido-materno" class="col-sm-5 col-form-label">Apellido Materno</label>
            <div class="col-sm-7">
              <input type="text" name="apellido_materno" id="txt-apellido-materno" class="form-control"
                maxlength="40" />
            </div>
          </div>

          <div class="form-group row">
            <label for="ddo-tipo-documento-identidad" class="col-sm-5 col-form-label">Documento de
              Identidad</label>
            <div class="col-sm-7">
              <div class="form-group">
                <select name="tipo_documento_identidad" id="ddo-tipo-documento-identidad" class="form-control" required>
                  <?php $__currentLoopData = $tipoDocumentoIdentidad; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($tipo->IdTipoDocumentoIdentidad); ?>"><?php echo e($tipo->Descripcion); ?>

                  </option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>

              <div class="form-group">
                <input type="text" name="numero_documento_identidad" id="txt-numero-documento-identidad" maxlength="15"
                  required class="form-control" placeholder="N° de documento" />
              </div>
            </div>
          </div>


          <div class="form-group row">
            <label for="txt-telefono" class="col-form-label col-sm-5">Teléfono/Celular</label>
            <div class="col-sm-7">
              <input type="tel" name="telefono" id="txt-telefono" class="form-control" maxlength="40" required />
            </div>
          </div>

          <div class="form-group row">
            <label for="txt-correo" class="col-form-label col-sm-5">Correo electrónico</label>
            <div class="col-sm-7">
              <input type="email" name="correo" id="txt-correo" class="form-control" maxlength="40" required />
            </div>
          </div>
        </div>
      </div>
      <!-- End Datos personales -->

      <!-- Datos del vehiculo -->
      <div class="tab-pane" id="tab-pane-datos-vehiculo">
        <div class="container">
          <div class="form-group row">
            <label for="ddo-anio-vehiculo" class="col-form-label col-sm-5">Año de fabricación</label>
            <div class="col-sm-7">
              <select name="anio_vehiculo" id="ddo-anio-vehiculo" class="form-control" required>
                <?php for($i = date('Y'); $i >= 1950; $i--): ?>
                <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                <?php endfor; ?>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="txt-placa" class="col-form-label col-sm-5">Placa</label>
            <div class="col-sm-7">
              <input type="text" name="placa" id="txt-placa" class="form-control" maxlength="10" required />
            </div>
          </div>

          <div class="form-group row">
            <label for="txt-uso" class="col-form-label col-sm-5">Uso del vehículo</label>
            <div class="col-sm-7">
              <select name="uso" id="txt-uso" class="form-control" required>
                <option value="">-- Escoja una opción --</option>
                <option value="Particular">Particular</option>
                <option value="Carga">Carga</option>
                <option value="Transporte de Personal">Transporte de Personal</option>
                <option value="Escolar">Escolar</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="txt-asientos" class="col-form-label col-sm-5">Asientos</label>
            <div class="col-sm-7">
              <input type="number" name="asientos" id="txt-asientos" class="form-control" step="1" min="1" value="1"
                required />
            </div>
          </div>
        </div>
      </div>
      <!-- End Datos del vehiculo-->

      <!-- Datos de la cotizacion-->
      <div class="tab-pane" id="tab-pane-datos-cotizacion">
        <div class="container">
          <fieldset class="form-group">
            <div class="row">
              <legend class="col-sm-5 col-form-label pt-0">Elija la compañia de seguros con la que quiere
                trabajar</legend>
              <div class="col-sm-7">
                <?php echo $__env->make('web.componentes.aseguradoras', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
              </div>
            </div>
          </fieldset>

          <fieldset class="form-group">
            <div class="row">
              <legend class="col-sm-5 col-form-label pt-0">¿Cuenta usted con un SOAT en este momento, o no?
              </legend>
              <div class="col-sm-7">
                <div class="form-check">
                  <input type="radio" name="tiene_soat" id="rad-tengo-soat" value="1" />
                  <label for="rad-tengo-soat" class="form-check-label">Si</label>
                </div>
                <div class="form-check">
                  <input type="radio" name="tiene_soat" id="rad-no-tengo-soat" value="0" />
                  <label for="rad-no-tengo-soat" class="form-check-label">No</label>
                </div>
              </div>
            </div>
          </fieldset>

          <div class="form-group row d-none">
            <label for="txt-fecha-vencimiento" class="col-sm-5 col-form-label">Ingrese la fecha de vencimiento
              de su SOAT actual (dia/mes/año)</label>
            <div class="col-sm-7">
              <input type="text" name="fecha_vencimiento" id="txt-fecha-vencimiento" class="form-control" required />
            </div>
          </div>
        </div>
      </div>
      <!-- End Datos de la cotizacion-->
    </div>
  </form>
</div>
<!-- End Form -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
Solicitudes - Cotizar SOAT
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.plantillas.seguro_solicitud', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>