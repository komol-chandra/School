<table class="table table-striped table-bordered no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
    <thead>
        <tr> 
            <th>#</th>
            <th>Class Name</th>
            <th>Section Name</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($section as $key => $value)
        <tr>
            <td>{{$key+1}}</td>
            <td>
                @php $class_data = collect($class)->where('class_id', $value->class_name)->first() @endphp
                {{$class_data->class_name}}
            </td>
            <td>{{$value->section_name}}</td>
            <td>
                @if($value->status==1)
                <span class="text-success">Active</span>
                @else
                <span class="text-danger">Inactive</span>
                @endif

            </td>
            <td>
                @if($value->status == 1)
                <button class="btn btn-outline-success btn-sm status" id="status" data="{{$value->section_id}}"><i class="fas fa-sync"></i></button>
                @else
                <button class="btn btn-outline-info btn-sm status" id="status" data="{{$value->section_id}}"><i class="fas fa-sync"></i></button>
                @endif
                <button class="btn btn-outline-danger btn-sm delete" data="{{$value->section_id}}" data-csrf="{{csrf_token()}}"><i class="fa fa-trash"></i></button>
                
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>#</th>
            <th>Class Name</th>
            <th>Section Name</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </tfoot>
</table>
{{$section->links()}}
