<form action="{{ route('tables.store') }}" method="POST">


    @csrf
       
   
       <div class="modal fade" id="ModelCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
           <div class="modal-content">
             <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Ajouter Table</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>
             <div class="modal-body">
           
               <div class="form-groupe">
                 <input type="text" name="name" id="name" class="form-control" placeholder="Titre" value="">
                 </div>
                 <div class="form-groupe">
                 <select name="status" id="status" class="form-control">
                    <option value="" selected disabled>Disponible </option>

                     <option value="1">Oui </option>
                     <option value="0">Non</option>

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
   
   
   
   
       
   
     