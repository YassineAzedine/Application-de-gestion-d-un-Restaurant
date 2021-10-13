<form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data">


    @csrf
       
   
       <div class="modal fade" id="ModelCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
           <div class="modal-content">
             <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Ajouter menus</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>
             <div class="modal-body">
           
               <div class="form-groupe">
                 <input type="text" name="title" id="title" class="form-control" placeholder="Titre" value="">
                 </div>

                 <div class="form-groupe">
                 <textarea name="description" id="description" cols="30" rows="10" placeholder="description"></textarea>
         </div>
         <div class="input-group mb-3">
           <div class="input-group-prepend">
           <div class="input-group-text">$</div>
          </div>


          <input type="number" name="price" id="price" class="form-control" placeholder="number" value="prix">
          <div class="input-group-append">
            <div class="input-group-text">.00</div>
           </div>
          </div>
          <div class="input-group mb-3">
            <div class="">
            <span class="input-group-text">Image</span>
           </div>
 
            <div class="custom-file">
           <input type="file" name="image" id="image" class="form-control" 
           class="custom-file-input" >
          <label class="custom-file-label">
           
          </label>
           </div>
          </div>
          <div class="form-groupe">
<select name="category_id" id="category_id">
  <option value="" selected disabled>Choisir un Categories</option>
  @foreach ($categories as $category)
      <option value="{{$category->id}}">
   {{   $category->title}}
      </option>
  @endforeach
</select>
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
   
   
   
   
       
   
     