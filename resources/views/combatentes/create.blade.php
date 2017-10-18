@extends('layouts.template')

@section('content')
                            <form class="form-horizontal" action="{{ route('combatente.store')}}" method="post">
                               {{ csrf_field() }}
                                
                                <div class="container">
                                    <div class="row">
                                        <div class="span6">
                                            <fieldset>
                                                <div class="control-group">											
                                                    <label class="control-label" for="nome">Nome</label>
                                                    <input class="form-control" name="nome" id="nome" placeholder="Exemplo: Ana" required=""/>
                                                   			
                                                </div> <!-- /control-group -->

												<div class="control-group">											
                                                    <label class="control-label" for="apelido">Apelido</label>
                                                    <input class="form-control" name="apelido" id="apelido" placeholder="Exemplo: Cuinhane" required=""/>
                                                   			
                                                </div> <!-- /control-group -->

                                                <div class="control-group">											
                                                    <label class="control-label" for="telefone">Telefone</label>
                                                    <input class="form-control" name="telefone" id="telefone" placeholder="Exemplo: 841234567" required=""/>
                                                   			
                                                </div> <!-- /control-group -->    

                                                <div class="controls">
                                                	 <label class="control-label" for="sexo">Sexo</label>
                                                        <select class="span4" name="sexo" id="sexo">
                                                            <option value="Masculino">Masculino</option>    
                                                            <option value="Feminino">Feminino</option>  
                                                        </select>
                                                    </div> <!-- /controls -->	

                                                  <div class="controls">
                                                  		<label class="control-label" for="tipoMutuario">Tipo de Mutuario</label>
                                                        <select class="span4" name="tipoMutuario" id="tipoMutuario">
                                                            <option value="Antigo Combatente">Antigo Combatente</option>    
                                                            <option value="Desmobilizado de Guerra">Desmobilizado de Guerra</option>  
                                                        </select>
                                                    </div> <!-- /controls -->

                                                    <div class="control-group">											<label class="control-label" for="numeroCombatente">Numero de Combatente</label>
                                                    	<input class="form-control" name="numeroCombatente" id="numeroCombatente" placeholder="Exemplo: 4555557" required=""/>
                                                   			
                                                </div> <!-- /control-group -->	  

                                                <div class="controls">
                                                		<label class="control-label" for="provincia">Provincia</label>
                                                        <select class="span4" name="provincia" id="provincia">
                                                        	@foreach($province as $provincia)
	                                                            <option value={{ $provincia->id}}>{{ $provincia->provincia}}</option>    
	                                                            
                                                             @endforeach  
                                                        </select>
                                                    </div> <!-- /controls -->                                          

                                                

                                                <!-- <div class="control-group">	
                                                    <label class="control-label" for="Country">Rendimento Mensal<sup></sup></label>
                                                    <div class="controls">
                                                        <input class="span4" name="rendimento" placeholder="Exemplo: 5000" required=""/>
                                                    </div> <!-- /controls -->				
                                                <!--</div>  /control-group --> 

                                                                              

                                                <div class="form-actions">
                                                    <button class="btn btn-primary" id="addPedidoEmprestimo">Prosseguir</button> 
                                                    <a  href="<?php//      echo base_url('index.php/PedidoEmprestimo_controller/pesquisarCombatente') ?>" class="btn">Cancelar</a>
                                                </div> <!-- /form-actions -->

                                            </fieldset>
                                        </div>
                                        
                                    </div>
                                </div>

                            </form>

@endsection