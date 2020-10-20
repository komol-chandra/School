<table class="table table-striped table-bordered no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
    <thead>
        <tr>
            <th>Session Name</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($session as $key => $value)
        <tr>
            <td>{{$value->session_name}}</td>

            <td>
                @if ($value->session_status == 1)
                    <span class="text-success">Active</span>
                @else
                    <span class="text-danger">Inactive</span>
                @endif
            </td>

            <td>
                @if ($value->session_status == 1)
                <button class="btn btn-outline-success btn-sm" id="session_status" data="{{$value->session_id}}"><i class="fas fa-sync"></i></button>
            @else
                <button class="btn btn-outline-info btn-sm" id="session_status" data="{{$value->session_id}}"><i class="fas fa-sync"></i></button>
            @endif

                <button type="button" class="btn btn-outline-danger btn-sm delete" data-csrf="{{csrf_token()}}" data="{{$value->session_id}}">
                    <i class="fa fa-trash"></i>
                </button>
                <button type="button" class="btn btn-outline-info btn-sm edit" data="{{$value->session_id}}" data-toggle="modal" data-target="#edit_session">
                    <i class="fas fa-edit"></i>
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>

