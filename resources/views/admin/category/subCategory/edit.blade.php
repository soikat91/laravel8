<form action="{{ route('subcategory.update')}}" method="POST">
    @csrf
    <div class="modal-body">
        
        <div class="form-group">
                         
            <label for="category_name">Category</label>
            
            <select class="form-control" name="category_id">

                <option value="">select One</option>
             
                @foreach ($category as $row)

                <option value="{{ $row->id }}" 
                    @if ($row->id == $data->category_id) selected=""  @endif  >{{ $row->category_name}}</option> 

                @endforeach
            </select>
            
        </div>

        <div class="form-group">
             
            <label for="category_name">SubCategory Name</label>
            <input type="text" class="form-control" name="subcategory_name" id="edit_subcategory_name" value="{{ $data->subcategory_name }}">
            <input type="text" class="form-control" name="id" id="edit_subcategory_id" value="{{ $data->id }}">
            
        </div>
        
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>