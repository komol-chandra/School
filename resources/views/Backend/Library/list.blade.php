<table class="table table-striped table-bordered no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
    <thead>
        <tr>
            <th>Book Name</th>
            <th>Author</th>
            <th>Copies</th>
            <th>Available Copies</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($library as $key => $value)
        <tr>
            <td>{{$value->book_name}}</td>
            <td>{{$value->author_name}}</td>
            <td>{{$value->copy_number}}</td>
            <td>{{$value->copy_number}}</td>
            <td>
                <button type="button" class="btn btn-outline-danger btn-sm delete" data-csrf="{{csrf_token()}}" data="{{$value->library_id}}">
                    <i class="fa fa-trash"></i>
                </button>
                <button type="button" class="btn btn-outline-info btn-sm edit" data="{{$value->library_id}}" data-toggle="modal" data-target="#edit_library">
                    <i class="fas fa-edit"></i>
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
