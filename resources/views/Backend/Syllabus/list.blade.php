<table class="table table-striped table-bordered no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
    <thead>
        <tr>
            <th>Title</th>
            <th>Syllabus</th>
            <th>Class</th>
            <th>Subject</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($syllabus as $key => $value)
        <tr>
            <td>{{$value->syllabus_title_name}}</td>
            <td>
                <img src="/Backend_assets/Files/Syllabus//{{$value->syllabus_image}}" alt="Profile" class="img-fluid" style="height: 50px; width: 50px; border-radius: 50%">
            </td>
            <td>{{$value->className->class_name}}</td>
            <td>{{$value->subjectName->subject_name}}</td>
            <td>
                <button type="button" class="btn btn-outline-danger btn-sm delete" data-csrf="{{csrf_token()}}" data="{{$value->syllabus_id}}">
                    <i class="fa fa-trash"></i>
                </button>
                {{-- <button type="button" class="btn btn-outline-info btn-sm edit" data="{{$value->syllabus_id}}" data-toggle="modal" data-target="#edit_classroom">
                    <i class="fas fa-edit"></i>
                </button> --}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

