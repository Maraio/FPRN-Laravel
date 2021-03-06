@extends('layouts.template')

@section('page')
  <!--  @if(!Auth::check())
    <section class="success" id="about">
        <div class="container ">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>IMP+</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-2">
                    <p>Freelancer is a free bootstrap theme created by Start Bootstrap. The download includes the complete source files including HTML, CSS, and JavaScript as well as optional LESS stylesheets for easy customization. adad</p>
                </div>
                <div class="col-lg-4">
                    <div class="img-responsive">
                         <img class="img-responsive" src="{{ asset('img/logo_login.jpg') }}">
                    </div>
                </div>
                <div class="col-lg-8 col-lg-offset-2 text-center">
                     <a href="#" class="btn btn-lg btn-outline">
                        <i class="fa fa-download"></i> Download Theme
                    </a> 
                </div>
            </div>
        </div>
    </section>
    @endif  -->
@endsection

@section('content')


     @if(Auth::check())
<div class="row">
    <div class="span12">
        <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
                <h3> Procurar Combatente</h3>
            </div>

            <div class="widget-content">
                <div class="widget big-stats-container">
                    <div>
                        <form id="formPesquisar" class="form-horizontal" action="<?php //echo base_url('index.php/PedidoEmprestimo_controller/sendCampoPesquisar') ?>" method="post">
                             {{ csrf_field() }}
                            <fieldset>
                                <br>
                                <div class="control-group">											
                                    <label class="control-label" for="term">Nome/Apelido ou Nr<sup></sup></label>
                                    <div class="controls">
                                        <input class="span4" id="term" name="term" placeholder="Procurar pelo nome/apelido/Nr. Combatente" />	
                                    </div> <!-- /controls -->				
                                </div> <!-- /control-group -->
                                <div class="form-actions">
                                    <button type="button" class="btn btn-primary btn-large" id="btnBuscar">Buscar</button> 
                                </div> <!-- /form-actions -->                              

                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/span 12-->

    <div class="span12">
        <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
                <h3>Combatentes</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
                <table class="table table-striped table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th> Numero do Combatente </th>
                            <th> Nome</th>
                            <th> Apelido</th>
                            <th> Contacto</th>
                            <th> Genero</th>
                            <th> Provincia</th>
                            <th class="td-actions"> </th>
                        </tr>
                    </thead>
                    <tbody id="showdata">
                    </tbody>
                </table>
            </div>
            <!-- /widget-content --> 
        </div>
    </div>
</div>
<!-- /row -->
<script>
    //autocomplete
    // $(function () {
    //     $("#term").autocomplete({
    //         source: "<?php// echo base_url('index.php/PedidoEmprestimo_controller/returnCombatenteAutoComplete') ?>"
    //     });
    // });
    
    //listar combatentes encontrados
    $(function () {

        $('#term').autocomplete({
            source : '{{ route('combatenteauto') }}',
            minlenght:1,
            autoFocus:true,
            select:function(e,ui){
               // alert(ui.item.id);
               var html = '';
                html += '<tr>' +
                                '<td>' + ui.item.numecom + '</td>' +
                                '<td>' + ui.item.value + '</td>' +
                                '<td>' + ui.item.apelido + '</td>' +
                                '<td>' + ui.item.contacto + '</td>' +
                                '<td>' + ui.item.genero + '</td>' +
                                '<td>' + ui.item.provincia + '</td>' +
                                '<td>' +
                                '<a href= "/pedidoemprestimos/'+ui.item.id+'" class="btn btn-success">Seleccionar</a>' +
                                '</td>' +
                                '</tr>';
                                $('#showdata').html(html);
            }
        });

        $('#btnBuscar').click(function () {
            var dataSend = $('#formPesquisar').serialize();
            //console.log("chegou aqui");
            visualizarCombatentes(dataSend);
        });

        //funcao que visualiza ista de combatentes buscados na hora da pesquisa
        function  visualizarCombatentes(dataSend) {
              //console.log("chegou aqui no ajax...");
            $.ajax({
                //type: 'jax',
                method: 'get',
                url: '/combatentes',
                //data: 'null',
                //async: false,
               // dataType: 'json',
                success: function (data) {
                    var html = '';
                    var i;
                    var id=0;
                    for (i = 0; i < data.length; i++) {
                       // id=data[i].id;
                        // console.log(data[i]);
                         //console.log(i);
                        html += '<tr>' +
                                '<td>' + data[i].numeroCombatente + '</td>' +
                                '<td>' + data[i].nome + '</td>' +
                                '<td>' + data[i].apelido + '</td>' +
                                '<td>' + data[i].telefone + '</td>' +
                                '<td>' + data[i].sexo + '</td>' +
                                '<td>' + data[i].provincia.provincia + '</td>' +
                                '<td>' +
                                '<a href= "/pedidoemprestimos/'+data[i].id+'" class="btn btn-success">Seleccionar</a>' +
                                '</td>' +
                                '</tr>';
                    }
                    $('#showdata').html(html);
                },
                error: function (error) {
                    alert('Nao conseguir fazer retrive da base de dados'+error);
                }
            });
        }
    });

</script>
@endif
@endsection
