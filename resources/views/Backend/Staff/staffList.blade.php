<table class="text-sm table table-striped table-bordered no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
    <thead class=" text-sm">
        <tr> 
            <th>#</th>
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Status</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
        @foreach($staff as $key => $value)
        <tr>
            <td>{{$key+1}}</td>
            <td>
                <img src="/Backend_assets/Files/Staff/{{$value->staff_image}}" alt="Profile" class="img-fluid" style="height: 50px; width: 50px; border-radius: 50%">
            </td>
            <td>{{$value->staff_name}}</td>
            <td>{{$value->staff_email}}</td>
            <td>{{$value->staff_phone}}</td>
            <td>
                @if ($value->status == 1)
                    <span class="text-success">Active</span>
                @else
                    <span class="text-danger">Inactive</span>
                @endif
            </td>
            <td>
                @if ($value->status == 1)
                    <button class="btn btn-outline-success btn-sm" id="status" data="{{$value->staff_id}}"><i class="fas fa-sync"></i></button>
                @else
                    <button class="btn btn-outline-info btn-sm" id="status" data="{{$value->staff_id}}"><i class="fas fa-sync"></i></button>
                @endif
                
                <button type="button" class="btn btn-outline-danger btn-sm delete" data-csrf="{{csrf_token()}}" data="{{$value->staff_id}}">
                    <i class="fa fa-trash"></i>
                </button>
                <button type="button" class="btn btn-outline-info btn-sm edit" data="{{$value->staff_id}}" data-toggle="modal" data-target="#edit_modal">
                    <i class="fas fa-edit"></i>
                </button>
                
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </tfoot>
</table>