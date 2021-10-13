<form action="{{ route('menus.update',$menu->id ) }}" method="POST">
    @method('PUT')  
  @csrf
  
  
  <div class="modal fade" id="ModelEdit{{$menu->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modifier menus</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
      
          <div class="form-groupe">
            <input type="text" name="title" id="title" class="form-control" placeholder="Titre" value="{{$menu->title}}">
            </div>
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