<!-- Modal -->
<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Registrar Usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        {{Form::open(['url'=>'usuarios'])}}
        <div class="modal-body">
            <div class="form-group">
                <label for="name" class="col-form-label">Nick Name</label>
                <input required type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="email" class="col-form-label">Email</label>
                <input required type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="idRol" class="col-form-label">Rol</label>
                <select required class="form-control" id="idRol" name="idRol">
                    <option value="">-- Seleccionar --</option>
                    @foreach ($roles as $r)
                        <option value="{{$r->id}}">{{$r->display_name}}</option>
                    @endforeach
                </select>
            </div>
          </div>
          <div class="modal-footer">
            <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Cancelar">
            <input type="submit" class="btn btn-primary" value="Aceptar">
          </div>
          {{Form::Close()}}
      </div>
    </div>
  </div>
