<table class="table table-striped table-bordered no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
    <thead>
        <tr>
            <th>#</th>
            <th>Class Room Name</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $key => $value)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$value->classroom_name}}</td>

            <td>
                @if ($value->classroom_status == 1)
                    <span class="text-success">Active</span>
                @else
                    <span class="text-danger">Inactive</span>
                @endif
            </td>

            <td>
                @if ($value->classroom_status == 1)
                <button class="btn btn-outline-success btn-sm" id="classroom_status" data="{{$value->classroom_id}}"><i class="fas fa-sync"></i></button>
            @else
                <button class="btn btn-outline-info btn-sm" id="classroom_status" data="{{$value->classroom_id}}"><i class="fas fa-sync"></i></button>
            @endif

                <button type="button" class="btn btn-outline-danger btn-sm delete" data-csrf="{{csrf_token()}}" data="{{$value->classroom_id}}">
                    <i class="fa fa-trash"></i>
                </button>
                <button type="button" class="btn btn-outline-info btn-sm edit" data="{{$value->classroom_id}}" data-toggle="modal" data-target="#edit_classroom">
                    <i class="fas fa-edit"></i>
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>#</th>
            <th>Class Room Name</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </tfoot>
</table>
<div class="row">
    <div class="pagination dataTables_paginate  paging_simple_numbers" id=" zero_config_paginate">{{$data->links()}}</div>
</div>
