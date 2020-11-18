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
               <input type="text" name="student_name[]" class="form-control" id="student_name" value=" {{$value->student_name}}" >
            </td>
            <td>
                <div class="custom-control custom-radio">
                    <input type="checkbox" id="attendance_status" name="attendance_status[]" value="1" class="present" required=""> Present &nbsp;
                    <input type="checkbox" id="attendance_status" name="attendance_status[]" value="0" class="absent"  required=""> Absent
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

