@include('layouts.header')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('layouts.content-header')
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header d-flex flex-row justify-content-between align-items-center">
                    <h3 class="card-title flex-grow-1">Meus contatos</h3>
                    <button class="btn btn-primary float-end" data-toggle="modal" data-target="#modal-default">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                            <tr>
                                <td>{{$contact->name}}</td>
                                <td>{{$contact->cpf}}</td>
                                <td class="d-flex flex-row justify-content-center">
                                    <div class="btn-group">
                                        <a href="/admin/contact/to/see/{{$contact->id}}" class="btn btn-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="/admin/contact/remove/{{$contact->id}}" class="btn btn-primary">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                                @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>Ações</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div><!-- /.container-fluid -->
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h4 class="modal-title">Adicionar contato</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/admin/contacts" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <input name="name" type="text" class="form-control" id="nome" placeholder="Nome do cotato">
                                </div>
                                <div class="form-group">
                                    <label for="cpf">cpf</label>
                                    <input name="cpf" type="text" class="form-control" id="cpf" placeholder="CPF do contato">
                                </div>
                                <button type="button" id="input-phone" class="btn btn-primary"><i class="fas fa-plus"></i></button>
                                <div class="form-group">
                                    <label for="phone">Telefone</label>
                                    <input name="phone[]" class="form-control phone" placeholder="telefone do contato" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
                <!-- /.modal-content -->
    </section>
    <!-- /.content -->
</div>
@include('layouts.footer')
