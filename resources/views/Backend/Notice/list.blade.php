<table class="table table-striped table-bordered no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
    <thead>
    </thead>
    <tbody>
        @foreach($notice as $key => $value)
        <tr>
            <td>{{$value->notice_title}}</td>
            {{-- <td>
                <button type="button" class="btn btn-outline-danger btn-sm delete" data-csrf="{{csrf_token()}}" data="{{$value->library_id}}">
                    <i class="fa fa-trash"></i>
                </button>
                <button type="button" class="btn btn-outline-info btn-sm edit" data="{{$value->library_id}}" data-toggle="modal" data-target="#edit_library">
                    <i class="fas fa-edit"></i>
                </button>
            </td> --}}
        </tr>
        @endforeach
    </tbody>
</table>
