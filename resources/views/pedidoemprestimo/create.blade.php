@extends('layouts.template')

@section('content')

<div class="row">
    <div class="span12">
        <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
                <h3> Enviar Pedido de Emprestimo</h3>
            </div>

            <div class="widget-content">
                <div class="widget big-stats-container">
                    <div class="widget-content" style="padding:10px;">
                        <div>
                            <form class="form-horizontal" action="<?php //echo base_url('index.php/PedidoEmprestimo_controller/gravarPedidoEmprestimo') ?>" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="combatenteId" value="{{ $combatente->id }}"/>
                                <input type="hidden" name="projectoId" value="0" id="projectoId">
                                <div class="container">
                                    <div class="row">
                                        <div class="span6">
                                            <fieldset>
                                                <div class="control-group">											
                                                    <label class="control-label" for="username"></label>
                                                    <div class="controls">   
                                                        <h4 class="help-block">Pedido de Emprestimo</h4>
                                                        <div id="sucesso" style="width: 370px; color: green;font-size: 18px"></div>
                                                    </div> <!-- /controls -->				
                                                </div> <!-- /control-group -->

                                                <div class="control-group">	
                                                    <label class="control-label" for="Country">Linha de credito<sup></sup></label>
                                                    <div class="controls">
                                                        <select class="span4" name="linhacreditoId" id="linhacreditoId">
                                                            <option value="1">Linha de Credito Simplificado</option>    
                                                            <option value="2">Linha de Credito Empreendedorismo</option>  
                                                        </select>
                                                    </div> <!-- /controls -->				
                                                </div> <!-- /control-group -->

                                                <div class="control-group">	
                                                    <label class="control-label" for="Country">Rendimento Mensal<sup></sup></label>
                                                    <div class="controls">
                                                        <input class="span4" name="rendimento" placeholder="Exemplo: 5000" required=""/>
                                                    </div> <!-- /controls -->				
                                                </div> <!-- /control-group -->

                                                <div class="control-group">											
                                                    <label class="control-label" for="lastname">Motante Solicitado<sup></sup></label>
                                                    <div class="controls">
                                                        <input class="span4" name="montante" placeholder="Exemplo: 40000" type="text" required=""/>
                                                    </div> <!-- /controls -->				
                                                </div> <!-- /control-group -->

                                                <div class="control-group">											
                                                    <label class="control-label" for="phone">Pagamento (Mensal)<sup></sup></label>
                                                    <div class="controls">
                                                        <select class="span4" name="tempoProposto">
                                                            <?php
                                                            for ($i = 3; $i <= 60; $i++) {
                                                                if ($i == 12) {
                                                                    echo '<option value="' . $i . '">Um Ano</option>';
                                                                } else if ($i == 24) {
                                                                    echo '<option value="' . $i . '">Dois Anos</option>';
                                                                } else if ($i == 36) {
                                                                    echo '<option value="' . $i . '">Três Anos</option>';
                                                                } else if ($i == 48) {
                                                                    echo '<option value="' . $i . '">Quatro Anos</option>';
                                                                } else if ($i == 60) {
                                                                    echo '<option value="' . $i . '">Cinco Anos</option>';
                                                                } else {
                                                                    echo '<option value="' . $i . '">' . $i . ' Meses</option>';
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div> <!-- /controls -->				
                                                </div> <!-- /control-group -->


                                                <div class="control-group">											
                                                    <label class="control-label" for="bio">Observação </label>
                                                    <div class="controls">
                                                        <textarea class="span4" name="observacao" placeholder="">N/A</textarea>
                                                    </div> <!-- /controls -->				
                                                </div> <!-- /control-group -->

                                                <div class="form-actions">
                                                    <button class="btn btn-primary" id="addPedidoEmprestimo">Prosseguir</button> 
                                                    <a  href="<?php //echo base_url('index.php/PedidoEmprestimo_controller/pesquisarCombatente') ?>" class="btn">Cancelar</a>
                                                </div> <!-- /form-actions -->

                                            </fieldset>
                                        </div>
                                        <div class="span4">
                                            <h4>Dados do Combatente</h4>
                                            <hr>
                                            <img src=" {{ asset('img/User-blue-icon.png') }}" width="120px" alt=""/><br>
                                            <b>Nome</b>: {{ $combatente->nome }}<br>
                                            <b>Apelido</b>: {{ $combatente->apelido }}<br>
                                            <b>Contacto</b>: {{ $combatente->telefone }}<br>
                                            <b>Sexo</b>: {{ $combatente->sexo }}<br>
                                            <b>Provincia: {{ $combatente->provincias_id }}</b><br>
                                            <b>Numero de Combatente</b>:{{ $combatente->numeroCombatente }}
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/span 12-->
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #0098d0;color: #ffffff">
                <h4 class="modal-title" id="myModalLabel">ADICIONAR O PROJECTO</h4>
            </div> 
            <form id="myFormProjecto" action=""  method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="tituloProjecto">Titulo do Projecto</label>
                        <input type="text" class="form-control" name="tituloProjecto" id="tituloProjecto" placeholder="Exemplo: " required="" style="width: 500px">
                    </div>
                    <div class="form-group">
                        <label for="objectivo">Objectivo</label>
                        <textarea name="objectivo" id="objectivo" class="form-control" cols="25" rows="5" required="" style="width: 500px"></textarea>
                    </div>  
                    <div class="form-group">
                        <label for="AreaActuacaoId">Área de Actuação</label>
                        <select class="form-control" name="AreaActuacaoId" id="AreaActuacaoId"  style="width: 500px">
                            @foreach($areaactuacao as $value)
                                                  
                                <option value="{{ $value->id }}"> {{ $value->areaactuacaofundo }} </option>
                                 
                             @endforeach                        
                        </select>
                    </div>  
                    <div class="form-group">
                        <label for="publicoAlvo">Publico Alvo</label>
                        <input type="text" class="form-control" name="publicoAlvo" id="publicoAlvo" required=""  placeholder="Exemplo: " style="width: 500px">
                    </div>  
                    <div class="form-group">
                        <label for="duracaoProjecto">Duração do projecto</label>
                        <input type="text" class="form-control"  name="duracaoProjecto" id="duracaoProjecto" required="" placeholder="Exemplo: " style="width: 500px">
                    </div>  
                    <div class="form-group">
                        <label for="custoProjecto">Custo do Projecto em Meticais</label>
                        <input type="text" class="form-control" name="custoProjecto" id="custoProjecto" required="" placeholder="Exemplo: 200000" style="width: 500px">
                    </div> 
                    <div class="form-group">
                        <label for="userfile">Anexar Algum Documento</label>
                        <input type="file" class="form-control" id="userfile" name="userfile" placeholder="Exemplo: " style="width: 500px">
                    </div> 

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">cancelar</button>
                    <button type="button" class="btn btn-primary" id="btnAddProjecto" data-dismiss="modal">Adicionar</button>
                </div>  
            </form> 
        </div>
    </div>
</div>
<script>


    $(function () {
        $('#btnAddProjecto').click(function () {
            var data = $('#myFormProjecto').serialize();
            console.log(data);
            $.ajax({
                type: 'jax',
                method: 'post',
                url: "{{ route('projecto.store')}}",
                data: data,
                //async: false,
                dataType: 'json',
                success: function (resposta) {
                    $('input[name="projectoId"]').val(resposta);
                    // $('#sucesso').html('Projecto Adicionado com sucesso').fadeIn().delay(4000).fadeOut('show');
                    $('#sucesso').text("Projecto Adicionado com sucesso");
                    $("#sucesso").append("<img id='theImg' src='{{ asset('img/project.png') }}'/>");
                },
                error: function () {
                    $("#sucesso").load(location.href + " #sucesso>*", "");
                    $('#sucesso').text('Projecto nao foi gravado');
                }
            });
        });

        $('#addPedidoEmprestimo').click(function () {
            //console.log($("#projectoId").val());
            if ($("#projectoId").val() == 0 && $("#linhacreditoId").val() == 2) {
                $('#myModal').modal('show');
            }
        });

        $(document).ready(function () {
            $("select").change(function () {
                if ($(this).val() == 2)
                {
                    $('#myModal').modal('show');
                }
            });
        });
    });


</script>

@endsection