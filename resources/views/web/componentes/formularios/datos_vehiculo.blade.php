<div class="container">
  <div class="form-group row">
    <label for="ddo-anio-vehiculo" class="col-form-label col-sm-5">Año de fabricación</label>
    <div class="col-sm-7">
      <select name="anio_vehiculo" id="ddo-anio-vehiculo" class="form-control" required>
        @for($i = date('Y'); $i >= 1950; $i--)
          <option value="{{ $i }}">{{ $i }}</option>
        @endfor
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
    <label for="ddo-uso" class="col-form-label col-sm-5">Uso del vehículo</label>
    <div class="col-sm-7">
      <select name="uso" id="ddo-uso" class="form-control" required>
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
      <input type="number" name="asientos" id="txt-asientos" class="form-control" step="1" min="1" value="1" required />
    </div>
  </div>

  @if($formulario === 'frm-cotizar_seguro_vehicular')
    <div class="form-group row">
      <label for="txt-clase-vehiculo" class="col-form-label col-sm-5">Clase de vehículo</label>
      <div class="col-sm-7">
        <select name="clase_vehiculo" id="txt-clase-vehiculo" class="form-control" required>
          <option value="">-- Escoja una opción --</option>
          @foreach($claseVehiculo as $clase)
            <option value="{{ $clase->IdClaseVehiculo }}">{{ $clase->Descripcion }}</option>
          @endforeach
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label for="txt-marca" class="col-form-label col-sm-5">Marca</label>
      <div class="col-sm-7">
        <input type="text" name="marca" id="txt-marca" class="form-control" maxlength="40" required />
      </div>
    </div>

    <div class="form-group row">
      <label for="txt-modelo" class="col-form-label col-sm-5">Modelo</label>
      <div class="col-sm-7">
        <input type="text" name="modelo" id="txt-modelo" class="form-control" maxlength="100" required />
      </div>
    </div>

    <div class="form-group row">
      <label for="txt-costo-vehiculo" class="col-form-label col-sm-5">Costo del vehículo (precio en
        US$)</label>
      <div class="col-sm-7">
        <input type="number" name="costo" id="txt-costo-vehiculo" class="form-control" required min="1" step="1.00" />
      </div>
    </div>
  @endif
</div>