<form action="{{ route('tables.update', $table->id ) }}" method="POST">
  
  @csrf
  @method('PUT')  
  
  <div class="modal fade" id="ModelEdit{{$table->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modifier tables</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
      
          <div class="form-groupe">
            <input type="text" name="name" id="name" class="form-control" placeholder="Titre" value="{{$table->name}}">

        </div>
        <div class="form-groupe">
        <select name="status" id="status" class="form-control">
           <option value=""  disabled>Disponible </option>

            <option {{$table->status === 1 ? "selected" : ""}} value="1">Oui </option>
            <option {{$table->status === 0 ? "selected" : ""}} value="0">Non</option>

        </select>
            <div class="form-groupe">
          
    </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button class="btn btn-primary">
            valider
            </button>
        </div>
      </div>
    </div>
  </div>
  
  </form>