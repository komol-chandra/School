<table class="table table-striped table-bordered no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
    <thead>
        <tr>   
            <th>Name</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($student as $key => $value)
        <tr>
            <td>
                <div class="form-group row">
                    <div class="col-md-9">
                        <input type="text" name="student_name[]" class="form-control" id="student_name[]" value="{{$value->student_id}}">
                    </div>
                </div>
            </td>
            <td>
                <div class="form-group row">
                    <div class="custom-control custom-radio">
                        <input type="checkbox" id="attendance_status[]" name="attendance_status[]" value="1" class="present" required=""> Present &nbsp;
                        <input type="checkbox" id="attendance_status[]" name="attendance_status[]" value="0" class="absent"  required=""> Absent
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

