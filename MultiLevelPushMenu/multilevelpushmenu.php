
<div class="container_menu">
			<!-- Push Wrapper -->
			<div class="mp-pusher" id="mp-pusher">

				<!-- mp-menu -->
				<nav id="mp-menu" class="mp-menu">
					<div class="mp-level">
						<h2 class="icon icon-world"><a href="../../../painel.php"><img src="../../../MultiLevelPushMenu/img/logo_113x57.png"/></a></h2>
						<ul>
							<!--aba pessoal-->
                            <li class="icon icon-arrow-left">
								<a class="icon icon-data" href="#">Pessoal</a>
								<div class="mp-level">
									<h2 class="icon icon-display">Pessoal</h2>
									<a class="mp-back" href="#">voltar</a>
									<ul>
										<!--menu militar-->
                                        <li class="icon icon-arrow-left">
											<a class="icon icon-user" href="#">Militar</a>
											<div class="mp-level">
												<h2>Militar</h2>
												<a class="mp-back" href="#">voltar</a>
												<ul>
													<li><a href="../../../modulos/mod_militar/form_post/form_incluir_militar.php">Cadastrar</a></li>
													<li><a href="../../../modulos/mod_militar/relacoes/visualizar_mil_cad.php?consulta=">Cadastrados</a></li>
													<li><a href="../../../modulos/mod_militar/relacoes/visualizar_mil_cad.php?sit=Servindo normalmente&consulta=">Embarcados</a></li>
													<li><a href="../../../modulos/mod_militar/relacoes/visualizar_mil_cad.php?sit=Destacado&consulta=">Destacados</a></li>
												</ul>
											</div>
										</li><!--/menu militar-->
                                        
										<!--menu ordmov-->
                                        <li class="icon icon-arrow-left">
											<a class="icon icon-tag" href="#">ORDMOV</a>
											<div class="mp-level">
												<h2>ORDMOV</h2>
												<a class="mp-back" href="#">voltar</a>
												<ul>
													<li><a href="../../../modulos/mod_militar/relacoes/visualizar_mil_cad.php?mod=ordmov&func=mov-e&tipo=incluir&sit=Servindo normalmente&consulta=">MOV-E</a></li>
													<li><a href="../../../modulos/mod_militar/relacoes/visualizar_mil_cad.php?mod=ordmov&func=mov-s&tipo=incluir&sit=Servindo normalmente&consulta=">MOV-S</a></li>
													<li><a href="../../../modulos/mod_ordmov/relacoes/rel_moventacao.php">Movimentações realizadas</a></li>												</ul>
											</div>
										</li><!--/menu ordmov-->
                                        
                                        <!--menu plano de busca-->
										<li class="icon icon-arrow-left">
											<a class="icon icon-location" href="#">Plano de busca</a>
											<div class="mp-level">
												<h2>Plano de busca</h2>
												<a class="mp-back" href="#">voltar</a>
												<ul>
													<li><a href="../../../modulos/mod_militar/relacoes/visualizar_mil_cad.php?mod=militar&func=plano_busca&tipo=incluir&sit=Servindo normalmente&consulta=">Incluir</a></li>
												</ul>
											</div>
										</li><!--/menu plano de busca-->

                                        <!--menu relatórios-->
										<li class="icon icon-arrow-left">
											<a class="icon icon-note" href="#">Relatórios</a>
											<div class="mp-level">
												<h2>Relatórios</h2>
												<a class="mp-back" href="#">voltar</a>
												<ul>
													<li><a href="../../../modulos/mod_militar/relacoes/rel_oficialidade_pdf.php" target="_blank">Oficialidade</a></li>
													<li><a href="../../../modulos/mod_militar/relacoes/rel_militares_div_depto_pdf.php" target="_blank">Militares por Departamento</a></li>													
													<li><a href="../../../modulos/mod_militar/relacoes/rel_militares_div_dp_pdf.php" target="_blank">Militares por Divisão</a></li>
												</ul>
											</div>
										</li><!--/menu relatórios-->
									</ul>
								</div>
							</li><!--/aba pessoal-->
                            
                            <!--aba adestramento-->
							<li class="icon icon-arrow-left">
								<a class="icon icon-news" href="#">Adestramento</a>
								<div class="mp-level">
									<h2 class="icon icon-news">Adestramento</h2>
									<a class="mp-back" href="#">voltar</a>
                                    <ul>
                                    	 <!--menu realização de cursos-->
                                    	<li class="icon icon-arrow-left">
											<a class="icon icon-study" href="#">Realização de cursos</a>
											<div class="mp-level">
												<h2>Realização de cursos</h2>
												<a class="mp-back" href="#">voltar</a>
													<ul>
														<li><a href="../../../modulos/mod_militar/relacoes/visualizar_mil_cad.php?mod=adestramento&func=curso&tipo=incluir&sit=Servindo normalmente&consulta=">Incluir</a></li>
														<li><a href="../../../modulos/mod_adestramento/relacoes/rel_cursos_mil.php?consulta=">Visualizar</a></li>
													</ul>
                                             </div>
                                     	</li><!--/menu realização de cursos-->
                                        
                                        <!--menu parametros-->
                                    	<li class="icon icon-arrow-left">
											<a class="icon icon-settings" href="#">Parâmetros</a>
											<div class="mp-level">
												<h2>Parâmetros</h2>
												<a class="mp-back" href="#">voltar</a>
													<ul>
														<li><a href="../../../modulos/mod_adestramento/form_post/form_incluir_curso.php">Incluir curso</a></li>
														<li><a href="../../../modulos/mod_adestramento/relacoes/rel_cursos_cad.php">Visualizar cursos cadastrados</a></li>
													</ul>
                                             </div>
                                     	</li><!--/menu realização de cursos-->
                                     </ul>    
								</div>
							</li> <!--/aba adestramento-->
							
                            <!--aba afastamentos-->
							<li class="icon icon-arrow-left">
								<a class="icon icon-world" href="#">Afastamentos</a>
								<div class="mp-level">
									<h2 class="icon icon-shop">Afastamentos</h2>
									<a class="mp-back" href="#">voltar</a>
									<ul>
                                    
										<!-- menu licença especial-->                                    	<li class="icon icon-arrow-left">
											<a class="icon icon-note" href="#">Licença especial</a>
											<div class="mp-level">
												<h2>Licença especial</h2>
												<a class="mp-back" href="#">voltar</a>
												<ul>
                                                	<li><a href="../../../modulos/mod_militar/relacoes/visualizar_mil_cad.php?mod=afastamento&func=lic_esp&tipo=incluir&sit=Servindo normalmente&consulta=">Incluir</a></li>
													<!--<li><a href="#">Visualizar</a></li>-->
    											</ul>
											</div>
										</li><!-- /menu licença especial-->
                                        
                  						<!-- menu férias-->
                                        <li class="icon icon-arrow-left">
											<a class="icon icon-calendar" href="#">Férias</a>
											<div class="mp-level">
												<h2>Férias</h2>
												<a class="mp-back" href="#">voltar</a>
												<ul>
                                                	<li><a href="../../../modulos/mod_militar/relacoes/visualizar_mil_cad.php?mod=afastamento&func=ferias&tipo=incluir&sit=Servindo normalmente&consulta=">Incluir</a></li>
													<li><a href="../../../modulos/mod_ferias/relacoes/rel_ferias_mil_depto_div_go.php">Visualizar</a></li>
                                                	<li><a href="../../../modulos/mod_ferias/form_post/form_sel_ano_fer_prog.php">Planejamento de férias</a></li>
													<li><a href="../../../modulos/mod_ferias/form_post/form_sel_ano_fer_prog.php?tipo=relatorio">Relatório do planejamento</a></li>
    											</ul>
											</div>
										</li><!-- /menu férias-->

                                        <!-- menu outros afastamentos-->
                                        <li class="icon icon-arrow-left">
											<a class="icon icon-paperplane" href="#">Outros afastamentos</a>
											<div class="mp-level">
												<h2>Outros afastamentos</h2>
												<a class="mp-back" href="#">voltar</a>
												<ul>
                                                	<li><a href="../../../modulos/mod_militar/relacoes/visualizar_mil_cad.php?mod=afastamento&func=outros_afastamento&tipo=incluir&sit=Servindo normalmente&consulta=">Incluir</a></li>
    											</ul>
											</div>
										</li><!-- /menu outros afastamentos-->
                                        
                  						<!-- menu relatórios-->
                                        <li class="icon icon-arrow-left">
											<a class="icon icon-display" href="#">Relatórios</a>
											<div class="mp-level">
												<h2>Relatórios</h2>
												<a class="mp-back" href="#">voltar</a>
												<ul>
                                                	<li><a href="../../../modulos/mod_afastamento/form_post/form_controle_acesso_diario.php">Controle de afastamento diário</a></li>
													<li><a href="../../../modulos/mod_afastamento/relacoes/rel_controle_presenca.php">Controle de presença</a></li>
    											</ul>
											</div>
										</li><!-- /menu relatórios-->
										
									</ul>
								</div>
							</li> <!--/aba afastamentos-->
                            
                            <!--aba atribuições-->
							<li class="icon icon-arrow-left">
								<a class="icon icon-display" href="#">Atribuições</a>
								<div class="mp-level">
									<h2 class="icon icon-shop">Atribuições</h2>
									<a class="mp-back" href="#">voltar</a>
									<ul>
                                    
										<!-- menu Tipo de atribuição-->                                    	<li class="icon icon-arrow-left">
											<a class="icon icon-display" href="#">Tipo de atribuição</a>
											<div class="mp-level">
												<h2>Tipo de atribuição</h2>
												<a class="mp-back" href="#">voltar</a>
												<ul>
                                                	<li><a href="../../../modulos/mod_atribuicao/form_post/form_incluir_tp_atribuicao.php">Criar</a></li>
													<li><a href="../../../modulos/mod_atribuicao/relacoes/rel_tp_atribuicao.php">Visualizar tipo de atribuição</a></li>
    											</ul>
											</div>
										</li><!-- /menu Tipo de atribuição-->
                                        
                  						<!-- menu atribuições-->
                                        <li class="icon icon-arrow-left">
											<a class="icon icon-display" href="#">Atribuições</a>
											<div class="mp-level">
												<h2>Atribuições</h2>
												<a class="mp-back" href="#">voltar</a>
												<ul>
                                                	<li><a href="../../../modulos/mod_atribuicao/form_post/form_incluir_atribuicao.php">Criar</a></li>
													<li><a href="../../../modulos/mod_atribuicao/relacoes/rel_atribuicao.php">Visualizar atribuições</a></li>
    											</ul>
											</div>
										</li><!-- /menu atribuições-->

                                        <!-- menu assunção-->
                                        <li class="icon icon-arrow-left">
											<a class="icon icon-display" href="#">Assunção</a>
											<div class="mp-level">
												<h2>Assunção</h2>
												<a class="mp-back" href="#">voltar</a>
												<ul>
                                                	<li><a href="../../../modulos/mod_militar/relacoes/visualizar_mil_cad.php?mod=atribuicao&func=assuncao&tipo=incluir&sit=Servindo normalmente&consulta=">Incluir</a></li>
                                                    <li><a href="../../../modulos/mod_atribuicao/relacoes/rel_ass_at.php">Visualizar assunções</a></li>
    											</ul>
											</div>
										</li><!-- /menu assunção-->
                                        
                  						<!-- menu passagem-->
                                        <li class="icon icon-arrow-left">
											<a class="icon icon-settings" href="#">Passagem</a>
											<div class="mp-level">
												<h2>Passagem</h2>
												<a class="mp-back" href="#">voltar</a>
												<ul>
                                                	<li><a href="../../../modulos/mod_atribuicao/relacoes/rel_pass_at.php">Incluir</a></li>
    											</ul>
											</div>
										</li><!-- /menu passagem-->
									</ul>
								</div>
							</li> <!--/aba atribuições-->
                
                             <!--aba saúde-->
							<li class="icon icon-arrow-left">
								<a class="icon icon-display" href="#">Saúde</a>
								<div class="mp-level">
									<h2 class="icon icon-shop">Saúde</h2>
									<a class="mp-back" href="#">voltar</a>
									<ul>
                                    
										<!-- menu Inspeção de saúde-->                                    	<li class="icon icon-arrow-left">
											<a class="icon icon-display" href="#">Inspeção de saúde</a>
											<div class="mp-level">
												<h2>Inspeção de saúde</h2>
												<a class="mp-back" href="#">voltar</a>
												<ul>
                                                	<li><a href="../../../modulos/mod_militar/relacoes/visualizar_mil_cad.php?mod=saude&func=insp_sd&tipo=incluir&sit=Servindo normalmente&consulta=">Incluir</a></li>
													<li><a href="../../../modulos/mod_saude/relacoes/rel_insp_saude_mil.php?consulta=">Visualizar</a></li>
    											</ul>
											</div>
										</li><!-- /menu Inspeção de saúde-->
                                        
                  						<!-- menu doação de sangue-->
                                        <li class="icon icon-arrow-left">
											<a class="icon icon-display" href="#">Doação de sangue</a>
											<div class="mp-level">
												<h2>Doação de sangue</h2>
												<a class="mp-back" href="#">voltar</a>
												<ul>
                                                	<li><a href="../../../modulos/mod_militar/relacoes/visualizar_mil_cad.php?mod=saude&func=doa_sang&tipo=incluir&sit=Servindo normalmente&consulta=">Incluir doação</a></li>
													<li><a href="../../../modulos/mod_saude/relacoes/rel_doacao_mil.php?consulta">Visualizar</a></li>
    											</ul>
											</div>
										</li><!-- /menu doação de sangue-->

                                        <!-- menu dados de saúde-->
                                        <li class="icon icon-arrow-left">
											<a class="icon icon-display" href="#">Dados de saúde</a>
											<div class="mp-level">
												<h2>Dados de saúde</h2>
												<a class="mp-back" href="#">voltar</a>
												<ul>
                                                	<li><a href="../../../modulos/mod_militar/relacoes/visualizar_mil_cad.php?mod=saude&func=dados_sd&tipo=incluir&sit=Servindo normalmente&consulta=">Incluir</a></li>
                                                    <li><a href="../../../odulos/mod_saude/relacoes/rel_dados_saude.php?consulta=">Visualizar</a></li>
    											</ul>
											</div>
										</li><!-- /menu dados de saúde-->
                                        
                  						<!-- menu parametros-->
                                        <li class="icon icon-arrow-left">
											<a class="icon icon-settings" href="#">Parâmetros</a>
											<div class="mp-level">
												<h2>Parâmetros</h2>
												<a class="mp-back" href="#">voltar</a>
												<ul>
                                                	<li><a href="../../../modulos/mod_saude/form_post/form_incluir_loc_doa.php">Incluir local de doação</a></li>
                                                	<li><a href="../../../modulos/mod_saude/relacoes/rel_loc_doa.php?consulta=">Visualizar</a></li>
                                                </ul>
											</div>
										</li><!-- /menu parametros-->
									</ul>
								</div>
							</li> <!--/aba saúde-->
               
                             <!--aba serviço-->
							<li class="icon icon-arrow-left">
								<a class="icon icon-display" href="#">Serviço</a>
								<div class="mp-level">
									<h2 class="icon icon-display">Serviço</h2>
									<a class="mp-back" href="#">voltar</a>
									<ul>
                                    
										<!-- menu Serviço no porto-->                                    	<li class="icon icon-arrow-left">
											<a class="icon icon-display" href="#">Serviço no porto</a>
											<div class="mp-level">
												<h2>Serviço no porto</h2>
												<a class="mp-back" href="#">voltar</a>
												<ul>
                                                	<li><a href="../../../modulos/mod_militar/relacoes/visualizar_mil_cad.php?mod=servico&func=svc_porto&tipo=incluir&sit=Servindo normalmente&consulta=">Incluir</a></li>
    											</ul>
											</div>
										</li><!-- /menu Serviço no porto-->
                                        
									</ul>
								</div>
							</li> <!--/aba serviço-->
                	
                    	</ul>
					</div>
				</nav>


<div class="scroller"><!-- this is for emulating position fixed of the nav -->
<div class="scroller-inner">
                
<!-- ...Continuação do Menu level -->
<!-- /mp-menu -->
	<div class="block block-40 clearfix">
		<a href="#" id="trigger"><img src="../../../MultiLevelPushMenu/img/img_menu_horiz.png" width="37" height="37"></a>
	</div>
</div>