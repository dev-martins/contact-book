<!-- /.content-wrapper -->
<footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js')}}"></script>

<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{ asset('plugins/toastr/toastr.min.js')}}"></script>
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="{{ asset('dist/js/demo.js')}}"></script> -->

<!-- InputMask -->
<script src="{{ asset('plugins/moment/moment.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

<!-- Page specific script -->
<script>
    $(function() {
        //datatable
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });

        //toast
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        $('.toastrDefaultSuccess').click(function() {
            toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
        });

        //mask
        $('#cpf').mask('000.000.000-00');
        $(document).on('focus', '.phone', function() {
            $(this).mask('(00) 00000-0000');
        });


        //new input phone
        $('#input-phone').click(function() {
            $("form .card-body").append(`<div class="form-group">
                                    <label for="phone">Telefone</label>
                                    <input name="phone[]"  class="form-control phone" placeholder="telefone do contato" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                                </div>`);
        })

        // edit contact
        $(document).on('click', '.edit', function() {
            $('#contact-inputs div').remove()
            $('#contact-inputs').append(`<div class="form-group">
                                        <label for="nome">Nome</label>
                                        <input name="name" type="text" class="form-control" id="nome" placeholder="Nome do cotato" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="cpf">cpf</label>
                                        <input name="cpf" type="text" class="form-control" id="cpf" placeholder="CPF do contato" value="">
                                    </div>`)
            var phone = $(this).data("phone");
            var id = $(this).data("id");
            var dataPhoneId = $(this).data("phone-id");
            var name = $(this).data("name");
            var cpf = $(this).data("cpf");
            var dataContactId = $(this).data("contact-id");
            $('#nome').val(name);
            $('#cpf').val(cpf);
            $('.phone').val(phone);
            $('#contact-id').val(id);
            $('form').attr('action', `/admin/contact/edit/${dataPhoneId}`)
            $('#input-phone button').remove()
        })

        // add phone
        $(document).on('click', '#addcontact', function() {
            var id = $(this).data("id");
            $('#nome').val("");
            $('#cpf').val("");
            $('.phone').val("");
            $('form').attr('action', '/admin/contact/phone')
            $('#input-phone button').remove()
            $('#contact-inputs div').remove()
            $('#input-phone').append(`<button type="button" id="input-phone" class="btn btn-primary"><i class="fas fa-plus"></i></button>`)
            $('#contact-id').val(id);

        })
    });
</script>
</body>

</html>
