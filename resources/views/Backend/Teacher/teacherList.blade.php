<table id="example" class="table table-striped table-bordered dt-responsive nowrap text-sm" style="width:100%">
    <thead>
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>
            <th>Designation</th>
            <th>Department</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($teacher as $key => $value)
        <tr>
            <td>{{$key+1}}</td>
            <td>
                <img src="/{{ $value->users->profile_photo_path ? $value->users->profile_photo_path:'Backend_assets/profile.jpg' }}" alt="Profile" class="img-fluid" style="height: 50px; width: 50px; border-radius: 50%">
            </td>
            <td>{{$value->teacher_name}}</td>
            <td>{{$value->users->email}}</td>
            <td>{{$value->Designation->teacher_designation_name}}</td>
            <td>{{$value->Department->department_name}}</td>
            <td>
                @if($value->status==1)
                <span class="text text-success">Active</span>
                @else
                <span class="text text-danger">Inactive</span>
                @endif
            </td>
            <td>
                @if($value->status==1)
                <button class="btn btn-outline-success btn-sm status" id="status" data="{{$value->teacher_id}}"><i class="fas fa-sync"></i></button>
                @else
                <button class="btn btn-outline-info btn-sm status" id="status" data="{{$value->teacher_id}}"><i class="fas fa-sync"></i></button>
                @endif
                <button class="btn btn-outline-danger btn-sm" id="delete" data-csrf="{{csrf_token()}}" data="{{$value->teacher_id}}"><i class="fas fa-trash"></i></button>
                <a type="button" href="{{route('teacher.edit',$value->teacher_id)}}" class="btn btn-outline-info btn-sm edit"><i class="fas fa-edit"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
    <thead>
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>
            <th>Designation</th>
            <th>Department</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
</table>
{{ $teacher->links() }}