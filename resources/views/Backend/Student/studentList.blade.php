<table class="table table-striped table-bordered no-footer text-sm" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
    <thead>
        <tr>
            <th>#</th>
            <th>Profile</th>
            <th>Name</th>
            <th>Roll</th>
            <th>Class</th>
            <th>Section</th>
            <!-- <th>Category</th> -->
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($student as $key =>$value)
        <tr>
            <td>{{$key+1}}</td>
            <td>
                <img src="/Backend_assets/Files/Student/student_image/{{$value->student_image}}" alt="Profile" class="img-fluid" style="height: 50px; width: 50px; border-radius: 50%">
            </td>
            <td>{{$value->student_name}}</td>
            <td>{{$value->student_roll_number}}</td>
            <td>{{$value->className->class_name}}</td>
            <td>{{$value->sectionName->section_name}}</td>
            {{--<td>{{$value->categoryName->category_name}}</td>--}}
            <td>
                @if($value->status==1)
                <span class="text-success"> Active</span>
                @else
                <span class="text-secondary"> Inactive</span>
                @endif
            </td>
            <td>
                @if($value->status == 1)
                <button class="btn btn-outline-success btn-sm status" id="status" data="{{$value->student_id}}"><i class="fas fa-sync"></i></button>
                @else
                <button class="btn btn-outline-info btn-sm status" id="status" data="{{$value->student_id}}"><i class="fas fa-sync"></i></button>
                @endif
                <button class="btn btn-outline-danger btn-sm delete" data="{{$value->student_id}}" data-csrf="{{csrf_token()}}"><i class="fa fa-trash"></i></button>
                <a type="button" href="{{route('student.edit',$value->student_id)}}" class="btn btn-outline-info btn-sm edit"><i class="fas fa-edit"></i></a>

            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>  
            <th>#</th>
            <th>Profile</th>
            <th>Name</th>
            <th>Roll</th>
            <th>Class</th>
            <th>Section</th>
            <!-- <th>Category</th> -->
            <th>Status</th>
            <th>Action</th>
        </tr>
    </tfoot>
</table>