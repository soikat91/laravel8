<form action="{{ route('childCategory.update') }}" method="POST">
    @csrf
    <div class="modal-body">
        
        <div class="form-group">
                         
            <label for="category_name">Category/SubCateggory</label>
            
            <select class="form-control" name="category_id">

               
                
                @foreach ($category as $row)
                <option disabled value="{{ $row->id }}">{{ $row->category_name }}</option>  
                @php
                    $subCat=DB::table('sub_categories')->where('category_id',$row->id)->get();
                @endphp
                @foreach ($subCat as $row)
                <option value="{{ $row->id }}"
                    @if ($row->id==$data->sub_category_id )  selected=""                       
                    @endif   >-{{ $row->subcategory_name}}</option>
                @endforeach
                 

                @endforeach
            </select>
            
        </div>

        <div class="form-group">
             
            <label for="category_name">ChildCategory Name</label>
            <input type="text" class="form-control" name="childCategoryName" id="edit_childCategory_name" value="{{ $data->childCategoryName }}">
            <input type="text" class="form-control" name="id" id="edit_childCategory_name" value="{{ $data->id }}">
            
        </div>
        
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>