<div class="container">
  <?php if($formulario === 'frm-cotizar_seguro_vehicular' || $formulario === 'frm-cotizar_soat'): ?>
    <fieldset class="form-group">
      <div class="row">
        <legend class="col-sm-5 col-form-label pt-0">¿Que tipo de persona es Usted?</legend>
        <div class="col-sm-7">
          <div class="form-check">
            <input type="radio" name="tipo_cliente" id="rad-persona-natural" value="N" class="form-check-input"
              checked />
            <label for="rad-persona-natural" class="form-check-label">Persona Natural</label>
          </div>
          <div class="form-check">
            <input type="radio" name="tipo_cliente" id="rad-persona-juridica" value="J" class="form-check-input" />
            <label for="rad-persona-juridica" class="form-check-label">Persona Jurídica</label>
          </div>
        </div>
      </div>
    </fieldset>
  <?php endif; ?>

  <?php if($formulario === 'frm-cotizar_seguro_vehicular' || $formulario === 'frm-cotizar_soat'): ?>
    <div class="form-group row d-none">
      <label for="txt-razon-social" class="col-sm-5 col-form-label">Razon Social</label>
      <div class="col-sm-7">
        <input type="text" name="razon_social" id="txt-razon-social" class="form-control" maxlength="100"  />
      </div>
    </div>
  <?php endif; ?>

  <div class="form-group row">
    <label for="txt-nombres" class="col-sm-5 col-form-label">Nombres</label>
    <div class="col-sm-7">
      <input type="text" name="nombres" id="txt-nombres" class="form-control" maxlength="40"  />
    </div>
  </div>

  <div class="form-group row">
    <label for="txt-apellido-paterno" class="col-sm-5 col-form-label">Apellido Paterno</label>
    <div class="col-sm-7">
      <input type="text" name="apellido_paterno" id="txt-apellido-paterno" maxlength="40" class="form-control"
         />
    </div>
  </div>

  <div class="form-group row">
    <label for="txt-apellido-materno" class="col-sm-5 col-form-label">Apellido Materno</label>
    <div class="col-sm-7">
      <input type="text" name="apellido_materno" id="txt-apellido-materno" maxlength="40" class="form-control" />
    </div>
  </div>

  <?php if($formulario === 'frm-afiliar-seguro-estudiante'): ?>
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
  <?php endif; ?>

  <?php if($formulario === 'frm-afiliar-seguro-estudiante'): ?>
    <div class="form-group row">
      <label for="ddo-pais" class="col-sm-5 col-form-label">Pais de procedencia</label>
      <div class="col-sm-7">
        <select name="pais" id="ddo-pais" class="form-control" required>
          <?php $__currentLoopData = $paises; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pais): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($pais->Codigo); ?>"
              <?php echo e($pais->Codigo === 'PE' ? 'selected': ''); ?>>
              <?php echo e($pais->Nombre); ?>

            </option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
      </div>
    </div>
  <?php endif; ?>

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
        <input type="text" name="numero_documento_identidad" id="txt-numero-documento-identidad" maxlength="15" required
          class="form-control" placeholder="N° de documento" />
      </div>
    </div>
  </div>

  <?php if($formulario === 'frm-afiliar-seguro-estudiante'): ?>
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
  <?php endif; ?>

  <?php if($formulario === 'frm-afiliar-seguro-estudiante'): ?>
    <div class="form-group row">
      <label class="col-sm-5 col-form-label" for="txt-fecha-nacimiento">Fecha de Nacimiento
        (dia/mes/año)</label>
      <div class="col-sm-7">
        <input type="text" name="fecha_nacimiento" id="txt-fecha-nacimiento" class="form-control" required />
      </div>
    </div>
  <?php endif; ?>

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