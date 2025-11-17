</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<!-- jQuery -->
<script src="{{ asset('admin/assets/plugins/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('admin/assets/plugins/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- Slimscrollbar scrollbar JavaScript -->
<script src="{{ asset('admin/assets/js/jquery.slimscroll.js') }}"></script>

<!-- Wave Effects -->
<script src="{{ asset('admin/assets/js/waves.js') }}"></script>

<!-- Sidebar Menu -->
<script src="{{ asset('admin/assets/js/sidebarmenu.js') }}"></script>

<!-- Sticky Kit -->
<script src="{{ asset('admin/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>

<!-- Custom JavaScript -->
<script src="{{ asset('admin/assets/js/custom.min.js') }}"></script>

<!-- DataTables -->
<script src="{{ asset('admin/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/bpampuch/pdfmake@0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/bpampuch/pdfmake@0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>

<!-- Sparkline -->
<script src="{{ asset('admin/assets/plugins/sparkline/jquery.sparkline.min.js') }}"></script>

<!-- Morris Chart -->
<script src="{{ asset('admin/assets/plugins/raphael/raphael-min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/morrisjs/morris.min.js') }}"></script>

<!-- Dashboard Charts -->
<script src="{{ asset('admin/assets/js/dashboard1.js') }}"></script>

<!-- Style Switcher -->
<script src="{{ asset('admin/assets/plugins/styleswitcher/jQuery.style.switcher.js') }}"></script>

<!-- Toast -->
<link rel="stylesheet" href="{{ asset('admin/assets/plugins/toast-master/css/jquery.toast.css') }}">
<script src="{{ asset('admin/assets/plugins/toast-master/js/jquery.toast.js') }}"></script>
<script src="{{ asset('admin/assets/js/toastr.js') }}"></script>

<!-- Switchery -->
<script src="{{ asset('admin/assets/plugins/switchery/dist/switchery.min.js') }}"></script>

<!-- Select2 -->
<script src="{{ asset('admin/assets/plugins/select2/dist/js/select2.full.min.js') }}"></script>

<!-- Bootstrap Select -->
<script src="{{ asset('admin/assets/plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>

<!-- Bootstrap Tagsinput -->
<script src="{{ asset('admin/assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>

<!-- Bootstrap Touchspin -->
<script src="{{ asset('admin/assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js') }}"></script>

<!-- DFF -->
<script src="{{ asset('admin/assets/plugins/dff/dff.js') }}"></script>

<!-- MultiSelect -->
<script src="{{ asset('admin/assets/plugins/multiselect/js/jquery.multi-select.js') }}"></script>

<!-- Summernote -->
<script src="{{ asset('admin/assets/plugins/summernote/dist/summernote.min.js') }}"></script>

<!-- SweetAlert -->
<script src="{{ asset('admin/assets/plugins/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/sweetalert/jquery.sweet-alert.custom.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before(
                                '<tr class="group"><td colspan="5">' + group +
                                '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });

    // Auto-show Laravel flash messages and validation errors as toasts (with delay to ensure functions are loaded)
    setTimeout(function() {
        @if (session('success'))
            if (typeof showSuccessToast === 'function') {
                showSuccessToast('{{ session('success') }}');
                console.log('Success toast shown: {{ session('success') }}');
            } else {
                console.log('showSuccessToast function not available. Message: {{ session('success') }}');
            }
        @endif

        @if (session('error'))
            if (typeof showErrorToast === 'function') {
                showErrorToast('{{ session('error') }}');
                console.log('Error toast shown: {{ session('error') }}');
            } else {
                console.log('showErrorToast function not available. Message: {{ session('error') }}');
            }
        @endif

        @if ($errors->has('error'))
            if (typeof showErrorToast === 'function') {
                showErrorToast('{{ $errors->first('error') }}');
                console.log('Validation error toast shown: {{ $errors->first('error') }}');
            } else {
                console.log('showErrorToast function not available. Error: {{ $errors->first('error') }}');
            }
        @endif

        @if ($errors->any() && !$errors->has('error'))
            if (typeof showErrorToast === 'function') {
                showErrorToast('{{ $errors->first() }}');
                console.log('General validation error toast shown: {{ $errors->first() }}');
            } else {
                console.log('showErrorToast function not available. Error: {{ $errors->first() }}');
            }
        @endif

        @if (session('warning'))
            if (typeof showWarningToast === 'function') {
                showWarningToast('{{ session('warning') }}');
                console.log('Warning toast shown: {{ session('warning') }}');
            } else {
                console.log('showWarningToast function not available. Message: {{ session('warning') }}');
            }
        @endif

        @if (session('info'))
            if (typeof showInfoToast === 'function') {
                showInfoToast('{{ session('info') }}');
                console.log('Info toast shown: {{ session('info') }}');
            } else {
                console.log('showInfoToast function not available. Message: {{ session('info') }}');
            }
        @endif
    }, 500);
</script>


<script>
    jQuery(document).ready(function() {
        // Switchery
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function() {
            new Switchery($(this)[0], $(this).data());
        });
        // For select 2
        $(".select2").select2();
        $('.selectpicker').selectpicker();
        //Bootstrap-TouchSpin
        $(".vertical-spin").TouchSpin({
            verticalbuttons: true,
            verticalupclass: 'ti-plus',
            verticaldownclass: 'ti-minus'
        });
        var vspinTrue = $(".vertical-spin").TouchSpin({
            verticalbuttons: true
        });
        if (vspinTrue) {
            $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
        }
        $("input[name='tch1']").TouchSpin({
            min: 0,
            max: 100,
            step: 0.1,
            decimals: 2,
            boostat: 5,
            maxboostedstep: 10,
            postfix: '%'
        });
        $("input[name='tch2']").TouchSpin({
            min: -1000000000,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: '$'
        });
        $("input[name='tch3']").TouchSpin();
        $("input[name='tch3_22']").TouchSpin({
            initval: 40
        });
        $("input[name='tch5']").TouchSpin({
            prefix: "pre",
            postfix: "post"
        });
        // For multiselect
        $('#pre-selected-options').multiSelect();
        $('#optgroup').multiSelect({
            selectableOptgroup: true
        });
        $('#public-methods').multiSelect();
        $('#select-all').click(function() {
            $('#public-methods').multiSelect('select_all');
            return false;
        });
        $('#deselect-all').click(function() {
            $('#public-methods').multiSelect('deselect_all');
            return false;
        });
        $('#refresh').on('click', function() {
            $('#public-methods').multiSelect('refresh');
            return false;
        });
        $('#add-option').on('click', function() {
            $('#public-methods').multiSelect('addOption', {
                value: 42,
                text: 'test 42',
                index: 0
            });
            return false;
        });
        $(".ajax").select2({
            ajax: {
                url: "https://api.github.com/search/repositories",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function(data, params) {
                    // parse the results into the format expected by Select2
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data, except to indicate that infinite
                    // scrolling can be used
                    params.page = params.page || 1;
                    return {
                        results: data.items,
                        pagination: {
                            more: (params.page * 30) < data.total_count
                        }
                    };
                },
                cache: true
            },
            escapeMarkup: function(markup) {
                return markup;
            }, // let our custom formatter work
            minimumInputLength: 1,
            templateResult: formatRepo, // omitted for brevity, see the source of this page
            templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
        });
    });
</script>

{{-- <script>
    jQuery(document).ready(function() {

        $('.summernote').summernote({
            height: 350, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });

        $('.inline-editor').summernote({
            airMode: true
        });

    });

    window.edit = function() {
            $(".click2edit").summernote()
        },
        window.save = function() {
            $(".click2edit").summernote('destroy');
        }
</script> --}}
<!-- ============================================================== -->

</body>

</html>
