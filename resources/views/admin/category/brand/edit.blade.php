<form action="{{ route('brand.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal-body">        


        <div class="form-group">
             
            <label for="category_name">Brand Name</label>
            <input type="text" class="form-control" name="brand_name" id="brand_name" value="{{ $data->brand_name }}">           
            <input type="text" class="form-control" name="id" id="brand_name" value="{{ $data->id }}">           
            
        </div>
        <div class="form-group">
             
             <label for="category_name">Brand Logo</label>
             <input type="file" class="form-control" name="brand_logo" id="brand_logo">           
             <input type="text" class="form-control" name="old_brand_logo" id="brand_logo" value="{{ $data->brand_logo }}">           
             
         </div>
        
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>