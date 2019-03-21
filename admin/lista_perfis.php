<?php require_once("_incs/header.php");?>

       <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Perfis</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      Listagem de Perfis cadastrados
                    </p>
                    <table class="table table-striped projects">
                    <thead>
                        <tr>
                          <th style="width: 30%">Empresa</th>
                          <th>Membros</th>
                          <th>Respostas</th>
                          <th>Status Pagamento</th>
                          <th style="width: 30%">Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                                $stmt = $conn->query("SELECT a.id,tx_empresa,a.tx_nome,a.tx_cargo,b.tx_plano_pt,date_format(a.dt_cadastro,'%d/%m/%Y') as datacadastro FROM agile_perfil a inner join agile_planos b on a.id_plano = b.id");
                                                            
                                while($perfil = $stmt->fetch(PDO::FETCH_OBJ)) {
                          ?>
                        <tr>
                          
                          
                          <td><?php echo utf8_encode($perfil->tx_empresa);?>
                            <br />
                            <small>Cadastrado em <?php echo $perfil->datacadastro;?></small>
                          </td>
                          <td>
                            <ul class="list-inline">
                              <li>
                                <img src="images/user.png" class="avatar" alt="Avatar">
                              </li>
                              <li>
                                <img src="images/user.png" class="avatar" alt="Avatar">
                              </li>
                              <li>
                                <img src="images/user.png" class="avatar" alt="Avatar">
                              </li>
                              <li>
                                <img src="images/user.png" class="avatar" alt="Avatar">
                              </li>
                            </ul>
                          </td>
                          <td class="project_progress">
                            <div class="progress progress_sm">
                              <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="57"></div>
                            </div>
                            <small>57% Completo</small>
                          </td>
                          <td>
                            <button type="button" class="btn btn-success btn-xs">Pago</button>
                          </td>
                          <td>
                            <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Criar Diagnóstico </a>
                            <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar Diagnóstico </a>
                            <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                          </td>
                        </tr>
                        <?php } ?>

                     
                    </table>
                  </div>
                </div>
              </div>
</div>
        <!-- /page content -->
<?php require_once("_incs/footer.php");?>