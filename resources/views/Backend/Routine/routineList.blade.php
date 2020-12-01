{{-- < class="table table-striped table-bordered no-footer text-sm" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info"> --}}

<div class="overflow-auto">
<table class="table table-bordered " border="2" cellspacing="0" cellpadding="0">
    <tbody>
        <tr class="gradeA">
            <style type="text/css">
                .head{
                    width:28px;
                    height:28px;
                    position:relative;
                    }
                    .head:before{
                        content: "Period";
                        position: absolute;
                        margin-left: 40%;
                        margin-top: -4%;
                    }
                    .head:after{
                        content: "Day";
                        position: absolute;
                        border-top: 1px solid red;
                        text-align: center;
                        width: 65px;
                        transform: rotate(24deg);
                        transform-origin: 0% 0%;
                    }
            </style>
            <td class="head"></td>
            <td style="text-align: center;font-size: 12px;font-weight: bold;">1<sup>st</sup>Period</td>
            <td style="text-align: center;font-size: 12px;font-weight: bold;">2<sup>nd</sup>Period</td>
            <td style="text-align: center;font-size: 12px;font-weight: bold;">3<sup>rd</sup>Period</td>
            <td style="text-align: center;font-size: 12px;font-weight: bold;">4<sup>th</sup>Period</td>
            <td style="text-align: center;font-size: 12px;font-weight: bold;">5<sup>th</sup>Period</td>
        </tr>

        {{-- <tr class="gradeA">
            <td width="100">Saturday</td>
            <td>
                <div class="">
                    <button style="height: 105px;;width: 230px;" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <span style="color:crimson">
                        Mathematics-1 
                        </span>
                        <br>
                        ( 07.10 AM - 08.00 AM)
                        <br>
                        <span>
                        <br><span style="color: green">Md.Altab Hossain</span>
                        </span>
                    </button>    
                </div>
            </td>
            <td>
                <div class="">
                    <button style="height: 105px;;width: 230px;" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <span style="color:crimson">
                        Social Science 
                        </span>
                        <br>
                        ( 03.00 PM - 03.50 PM)
                        <br>
                        <span>
                        <br><span style="color: green">Rabya Khathun</span>
                        </span>
                    </button>   
                </div>
            </td>
            <td>
                <div class="">
                    <button style="height: 105px;;width: 230px;" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <span style="color:crimson">
                        Basic Electricity 
                        </span>
                        <br>
                        ( 03.50 PM - 05.30 PM)
                        <br>
                        <span>
                        <br><span style="color: green">Shaima Hanif</span>
                        </span>
                    </button> 
                </div>
            </td>
            
            <td>
                <div class="">
                    <button style="height: 105px;;width: 230px;" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <span style="color:crimson">
                        Chemistry 
                        </span>
                        <br>
                        ( 05.30 PM - 06.20 PM)
                        <br>
                        <span>
                        <br><span style="color: green">A.T.M Tazmilur Rahman</span>
                        </span>
                    </button>   
                </div>
            </td>
            <td>
                <div>
                    <button style="height: 105px;;width: 230px;" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <span style="color:crimson">
                        Ceramic Engineering Materials-1 
                        </span>
                        <br>
                        ( 06.20 PM - 07.10 AM)
                        <br>
                        <span>
                        <br><span style="color: green">Jakiya Jafrin</span>
                        </span>
                    </button>
                </div>
            </td>            
        </tr> --}}
        <tr class="gradeA">
            <td width="100">
                @foreach($eachData as $key => $value)
                    {{ $value->day_name }}
                @endforeach
            </td>
        </tr>
    </tbody>
  </table>
</div>