<table class="table table-striped table-bordered no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
    <thead>
        <tr>
        </tr>
    </thead>
    <tbody>
        @foreach($routine as $key => $value)
        <tr>
            <td>{{$value->dayName->day_name}}</td>
            <td>
                <p>
                    <i class="fas fa-address-book"></i>
                    {{$value->subjectName->subject_name}}
                </p>
                <p>
                    <i class="fas fa-clock"></i>
                     {{$value->startHour->sh_hour}}:{{$value->startMinute->sm_minute}}-{{$value->endHour->en_hour}}:{{$value->endMinute->em_minute}}
                </p>
                <p>
                    <i class="fas fa-user-circle"></i>
                     {{$value->teacher->teacher_name}}
                </p>
                <p>
                    <i class=" fas fa-home"></i>
                     {{$value->classRoom->classroom_name}}
                </p>
            </td>
            <td>
                <button type="button" class="btn btn-outline-danger btn-sm delete" data-csrf="{{csrf_token()}}" data="{{$value->routine_id}}">
                    <i class="fa fa-trash"></i>
                </button>
                <button type="button" class="btn btn-outline-info btn-sm edit" data="{{$value->routine_id}}" data-toggle="modal" data-target="#edit_class_routine">
                    <i class="fas fa-edit"></i>
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
