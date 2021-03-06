<script src="{{asset('Backend_assets/assets/libs/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('Backend_assets/assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{asset('Backend_assets/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('Backend_assets/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{asset('Backend_assets/assets/extra-libs/sparkline/sparkline.js')}}"></script>
<script src="{{asset('Backend_assets/dist/js/waves.js')}}"></script>
<script src="{{asset('Backend_assets/dist/js/sidebarmenu.js')}}"></script>
<script src="{{asset('Backend_assets/dist/js/custom.min.js')}}"></script>
<script src="{{asset('Backend_assets/assets/libs/flot/excanvas.js')}}"></script>
<script src="{{asset('Backend_assets/assets/libs/flot/jquery.flot.js')}}"></script>
<script src="{{asset('Backend_assets/assets/libs/flot/jquery.flot.pie.js')}}"></script>
<script src="{{asset('Backend_assets/assets/libs/flot/jquery.flot.time.js')}}"></script>
<script src="{{asset('Backend_assets/assets/libs/flot/jquery.flot.stack.js')}}"></script>
<script src="{{asset('Backend_assets/assets/libs/flot/jquery.flot.crosshair.js')}}"></script>
<script src="{{asset('Backend_assets/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script>
<script src="{{asset('Backend_assets/dist/js/pages/chart/chart-page-init.js')}}"></script>
<script src="{{asset('Backend_assets/assets/extra-libs/DataTables/datatables.min.js')}}"></script>
<script src="{{asset('Backend_assets/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
{{-- dashbord chart --}}
<script src="{{asset('Backend_assets/assets/libs/chart/matrix.interface.js')}}"></script>
<script src="{{asset('Backend_assets/assets/libs/chart/excanvas.min.js')}}"></script>
<script src="{{asset('Backend_assets/assets/libs/flot/jquery.flot.js')}}"></script>
<script src="{{asset('Backend_assets/assets/libs/flot/jquery.flot.pie.js')}}"></script>
<script src="{{asset('Backend_assets/assets/libs/flot/jquery.flot.time.js')}}"></script>
<script src="{{asset('Backend_assets/assets/libs/flot/jquery.flot.stack.js')}}"></script>
<script src="{{asset('Backend_assets/assets/libs/flot/jquery.flot.crosshair.js')}}"></script>
<script src="{{asset('Backend_assets/assets/libs/chart/jquery.peity.min.js')}}"></script>
<script src="{{asset('Backend_assets/assets/libs/chart/matrix.charts.js')}}"></script>
<script src="{{asset('Backend_assets/assets/libs/chart/jquery.flot.pie.min.js')}}"></script>
<script src="{{asset('Backend_assets/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script>
<script src="{{asset('Backend_assets/assets/libs/chart/turning-series.js')}}"></script>
<script src="{{asset('Backend_assets/dist/js/pages/chart/chart-page-init.js')}}"></script>
<!-- Editor -->
<script src="{{asset('Backend_assets/js/editor.js')}}"></script>

    {{-- dashbord chart --}}
<script src="{{asset('Backend_assets/assets/libs/moment/min/moment.min.js')}}"></script>
<script src="{{asset('Backend_assets/assets/libs/fullcalendar/dist/fullcalendar.min.js')}}"></script>
<script src="{{asset('Backend_assets/dist/js/pages/calendar/cal-init.js')}}"></script>
<script src="{{asset('Backend_assets/js/sweetalert.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
<script type="text/javascript">
  toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-bottom-right",
    "preventDuplicates": true,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }
</script>
<script>
    @foreach ($errors->all() as $error)
        toastr.warning("{{ $error }}", "Warning!");
    @endforeach
    @if(Session::has('message'))
      var type = "{{ Session::get('alert-type') }}";
      switch(type){
          case 'info':
          toastr.warning("{{ $error }}", "Warning!");
            break;
          case 'warning':
            toastr.warning("{{ $error }}", "Warning!");
            break;
          case 'success':
          toastr.warning("{{ $error }}", "Warning!");
              break;
          case 'error':
            toastr.warning("{{ $error }}", "Warning!");
              break;
      }
    @endif
  </script>
  @yield('js')
