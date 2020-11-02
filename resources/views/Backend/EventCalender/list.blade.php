<table class="text-sm table table-striped table-bordered no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
    <thead class=" text-sm">
        <tr> 
            <th>#</th>
            <th>Title</th>
            <th>Starting Date</th>
            <th>Ending Date</th>
            <th>Status</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
        @foreach($data as $key => $value)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$value->event_title}}</td>
            <td>{{$value->event_start_date}}</td>
            <td>{{$value->event_end_date}}</td>
            <td>
                @if ($value->status == 1)
                    <span class="text-success">Active</span>
                @else
                    <span class="text-danger">Inactive</span>
                @endif
            </td>
            <td>
                @if ($value->status == 1)
                    <button class="btn btn-outline-success btn-sm" id="status" data="{{$value->event_calender_id}}"><i class="fas fa-sync"></i></button>
                @else
                    <button class="btn btn-outline-info btn-sm" id="status" data="{{$value->event_calender_id}}"><i class="fas fa-sync"></i></button>
                @endif
                
                <button type="button" class="btn btn-outline-danger btn-sm delete" data-csrf="{{csrf_token()}}" data="{{$value->event_calender_id}}">
                    <i class="fa fa-trash"></i>
                </button>
                
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Starting Date</th>
            <th>Ending Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </tfoot>
</table>