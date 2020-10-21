
<table class="table table-striped table-bordered no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
    <thead>
        <tr>
            <th>#</th>
            <th>Class Name</th>
            <th>Subject Name</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
        @foreach($subject as $key => $value)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$value->className->class_name}}</td>
            <td>{{$value->subject_name}}</td>
            <td>
                <button type="button" class="btn btn-outline-danger btn-sm delete" data-csrf="{{csrf_token()}}" data="{{$value->subject_id}}">
                    <i class="fa fa-trash"></i>
                </button>
                <button type="button" class="btn btn-outline-info btn-sm edit" data="{{$value->subject_id}}" data-toggle="modal" data-target="#edit_subject">
                    <i class="fas fa-edit"></i>
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>#</th>
            <th>Class Name</th>
            <th>Subject Name</th>
            <th>Action</th>
        </tr>
    </tfoot>
</table>

