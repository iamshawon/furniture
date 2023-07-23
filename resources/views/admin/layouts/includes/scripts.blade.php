    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/backend/') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('assets/backend/') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets/backend/') }}/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets/backend/') }}/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('assets/backend/') }}/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('assets/backend/') }}/js/demo/chart-area-demo.js"></script>
    <script src="{{ asset('assets/backend/') }}/js/demo/chart-pie-demo.js"></script>



    <!-- Datatable Page level plugins  -->
    <script src="{{ asset('assets/backend/') }}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets/backend/') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Datatable Page level custom scripts -->
    <script src="{{ asset('assets/backend/') }}/js/demo/datatables-demo.js"></script>



    <!-- Toastr JS-->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

    <script src="{{ asset('assets/toastr/') }}/toastr.min.js"></script>


    <script>
        @if (Session::has('message'))

            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
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

            // Position
            // toastr.options.positionClass = 'toast-bottom-right';


            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('message') }}", 'Warnning!', {
                        timeOut: 3000
                    });
                    break;
                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        @endif
    </script>



    <!-- Sweet Alert 2 JS -->
    {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    <script src="{{ asset('assets/sweetalert2/') }}/sweetalert2.min.js"></script>

    <script>
        $('.delete').click(function(event) {
            var form = $(this).closest("form");
            event.preventDefault();
            Swal.fire({
                title: 'Do you want to delete?',
                text: "Once deleted, you will not be able to recover this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Successfully Deleted!',
                        'You clicked the button!',
                        'success'
                    )
                    form.submit()
                }
            })
        });
    </script>



    <!-- Summernote JS -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 200,
            });
        });
    </script>
