
<!-- Sweet Alert must put and top to work successfully with out error  -->
{{--<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>--}}
<script src="{{ url('assets/cdn/sweetalert2.js') }}" type="text/javascript"></script>

<!-- BEGIN VENDOR JS-->
<script src={{asset("assets/backend/vendors/js/vendors.min.js")}} type="text/javascript"></script>

{{--    summer note cdn --}}
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>


<!-- BEGIN VENDOR JS-->
<script src={{asset("assets/backend/vendors/js/tables/datatable/datatables.min.js")}}
        type="text/javascript"></script>
<script src={{asset("assets/backend/vendors/js/tables/datatable/dataTables.buttons.min.js")}}
        type="text/javascript"></script>

<script src={{asset("assets/backend/vendors/js/forms/toggle/bootstrap-switch.min.js")}}
        type="text/javascript"></script>
<script src={{asset("assets/backend/vendors/js/forms/toggle/bootstrap-checkbox.min.js")}}
        type="text/javascript"></script>
<script src={{asset("assets/backend/vendors/js/forms/toggle/switchery.min.js")}} type="text/javascript"></script>
<script src={{asset("assets/backend/js/scripts/forms/switch.js")}} type="text/javascript"></script>
<script src={{asset("assets/backend/vendors/js/forms/select/select2.full.min.js")}} type="text/javascript"></script>
<script src={{asset("assets/backend/js/scripts/forms/select/form-select2.js")}} type="text/javascript"></script>

<!-- BEGIN PAGE VENDOR JS-->
<script src={{asset("assets/backend/vendors/js/charts/chart.min.js")}} type="text/javascript"></script>
<script src={{asset("assets/backend/vendors/js/charts/echarts/echarts.js")}} type="text/javascript"></script>

<script src={{asset("assets/backend/vendors/js/extensions/datedropper.min.js")}} type="text/javascript"></script>
<script src={{asset("assets/backend/vendors/js/extensions/timedropper.min.js")}} type="text/javascript"></script>

<script src={{asset("assets/backend/vendors/js/forms/icheck/icheck.min.js")}} type="text/javascript"></script>
<script src={{asset("assets/backend/js/scripts/pages/chat-application.js")}}  type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src={{asset("assets/backend/js/core/app-menu.js")}} type="text/javascript"></script>
<script src={{asset("assets/backend/js/core/app.js")}} type="text/javascript"></script>
<script src={{asset("assets/backend/js/scripts/customizer.js")}} type="text/javascript"></script>
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src={{asset("assets/backend/js/scripts/pages/dashboard-crypto.js")}} type="text/javascript"></script>


<script src={{asset("assets/backend/js/scripts/tables/datatables/datatable-basic.js")}}
        type="text/javascript"></script>
<script src={{asset("assets/backend/js/scripts/extensions/date-time-dropper.js")}} type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->

<script src={{asset("assets/backend/js/scripts/forms/checkbox-radio.js")}} type="text/javascript"></script>

<script src={{asset("assets/backend/js/scripts/modal/components-modal.js")}} type="text/javascript"></script>



<script>
    window.onload = function(){
        $('.nav-item').removeClass('open');
        $('.active').addClass('open');

        // initialize summer note
        $('textarea.summernote').summernote({
            tabsize: 2,
            height: 150
        });
    }
    $('#meridians1').timeDropper({
        meridians: true,
        setCurrentTime: false
    });
    $('#meridians2').timeDropper({
        meridians: true,setCurrentTime: false

    });
    $('#meridians3').timeDropper({
        meridians: true,
        setCurrentTime: false
    });
    $('#meridians4').timeDropper({
        meridians: true,
        setCurrentTime: false
    });
    $('#meridians5').timeDropper({
        meridians: true,setCurrentTime: false

    });
    $('#meridians6').timeDropper({
        meridians: true,setCurrentTime: false
    });
    $('#meridians7').timeDropper({
        meridians: true,setCurrentTime: false
    });
    $('#meridians8').timeDropper({
        meridians: true,setCurrentTime: false
    });
    $('#meridians9').timeDropper({
        meridians: true,setCurrentTime: false
    });
    $('#meridians10').timeDropper({
        meridians: true,setCurrentTime: false
    });
    $('#meridians11').timeDropper({
        meridians: true,setCurrentTime: false
    });
    $('#meridians12').timeDropper({
        meridians: true,setCurrentTime: false
    });
    $('#meridians13').timeDropper({
        meridians: true,setCurrentTime: false
    });
    $('#meridians14').timeDropper({
        meridians: true,setCurrentTime: false
    });
</script>


