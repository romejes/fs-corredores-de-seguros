<?php $__env->startSection('contenidoSolicitud'); ?>
<h2> Afiliación a Seguro Estudiantil contra Accidentes</h2>
<div class="wizard" id="wizard-seguro-estudiante">
  <ul class="nav">
    <li>
      <a class="nav-link" href="#tab-pane-datos-personales">Paso 1 <br /><small>Datos personales</small></a>
    </li>
    <li>
      <a class="nav-link" href="#tab-pane-pago">Paso 2 <br /><small>Información de pago</small></a>
    </li>
  </ul>

  <form autocomplete="off" id="frm-afiliacion-seguro-estudiante">
    <div class="tab-content">
      <!-- Datos personales -->
      <div class="tab-pane" id="tab-pane-datos-personales">
        <div class="container">
          <div class="form-group row">
            <label for="txt-nombres" class="col-sm-5 col-form-label">Nombres</label>
            <div class="col-sm-7">
              <input type="text" name="nombres" id="txt-nombres" class="form-control" maxlength="40" required />
            </div>
          </div>

          <div class="form-group row">
            <label for="txt-apellido-paterno" class="col-sm-5 col-form-label">Apellido Paterno</label>
            <div class="col-sm-7">
              <input type="text" name="apellido_paterno" id="txt-apellido-paterno" maxlength="40" class="form-control"
                required />
            </div>
          </div>

          <div class="form-group row">
            <label for="txt-apellido-materno" class="col-sm-5 col-form-label">Apellido Materno</label>
            <div class="col-sm-7">
              <input type="text" name="apellido_materno" id="txt-apellido-materno" maxlength="40"
                class="form-control" />
            </div>
          </div>

          <fieldset class="form-group">
            <div class="row">
              <legend class="col-sm-5 col-form-label pt-0">Sexo</legend>
              <div class="col-sm-7">
                <div class="form-check">
                  <input type="radio" name="sexo" value="M" id="rad-masculino" class="form-check-input" />
                  <label for="rad-masculino" class="form-check-label">Masculino</label>
                </div>
                <div class="form-check">
                  <input type="radio" name="sexo" value="F" id="rad-femenino" class="form-check-input" />
                  <label for="rad-femenino" class="form-check-label">Femenino</label>
                </div>
              </div>
            </div>
          </fieldset>

          <div class="form-group row">
            <label for="ddo-pais" class="col-sm-5 col-form-label">Pais de procedencia</label>
            <div class="col-sm-7">
              <select name="pais" id="ddo-pais" class="form-control" required>
                <?php $__currentLoopData = $paises; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pais): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($pais->Codigo); ?>" <?php echo e($pais->Codigo === 'PE' ? 'selected': ''); ?>>
                  <?php echo e($pais->Nombre); ?>

                </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
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
            <label for="ddo-estado-civil" class="col-sm-5 col-form-label">Estado Civil</label>
            <div class="col-sm-7">
              <select name="estado_civil" id="ddo-estado-civil" class="form-control" required>
                <option value="">-- Seleccione su estado civil --</option>
                <option value="casado">Casado(a)</option>
                <option value="soltero">Soltero(a)</option>
                <option value="viudo">Viudo(a)</option>
                <option value="divorciado">Divorciado(a)</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-5 col-form-label" for="txt-fecha-nacimiento">Fecha de Nacimiento
              (dia/mes/año)</label>
            <div class="col-sm-7">
              <input type="text" name="fecha_nacimiento" id="txt-fecha-nacimiento" class="form-control" required />
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

      <!-- Datos de la cotizacion-->
      <div class="tab-pane" id="tab-pane-pago">
        <div class="form-group col-12">
          <label for="fil-voucher">Adjunta la foto de tu voucher de pago</label>
          <div class="custom-file">
            <input type="file" name="voucher" id="fil-voucher" class="custom-file-input"
              accept="image/*,application/pdf" required />
            <label class="custom-file-label" for="fil-voucher" data-browse="Examinar">Seleccionar Archivo</label>
          </div>
        </div>
      </div>
      <!-- End Datos de la cotizacion-->
    </div>
  </form>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
Solicitudes - Afiliacion a Seguro Estudiantil contra Accidentes
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.plantillas.seguro_solicitud', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>