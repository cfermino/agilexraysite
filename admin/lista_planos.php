<?php require_once("_incs/header.php");?>

       <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Planos</h3>
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
                    <button type="button" onclick="javascript:window.location.assign('frm_planos.php');" class="btn btn-success"><i class="fa fa-Plus"></i>Adicionar Plano</button>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      Listagem de Planos cadastrados
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Plano - PT</th>
                          <th>Plano - EN</th>
                          <th class="text-right">Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                                $stmt = $conn->query("SELECT id,tx_plano_pt,tx_plano_en,in_status FROM agile_planos");
                                while($planos = $stmt->fetch(PDO::FETCH_OBJ)) {
                          ?>
                        <tr>
                          <td><?php echo utf8_encode($planos->tx_plano_pt);?></td>
                          <td><?php echo utf8_encode($planos->tx_plano_en);?></td>
                          <td class="text-right"><a href="frm_planos.php?id=<?php echo $planos->id;?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar </a>
                          <?php if($planos->in_status == '1'){ ?>
                            <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-ban"></i> Desativar </a>
                          <?php }else{ ?>
                            <a href="#" class="btn btn-success btn-xs"><i class="fa fa-check"></i> Ativar </a>
                          <?php } ?>
                          </td>
                        </tr>
                      
                                <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
</div>
        <!-- /page content -->
<?php require_once("_incs/footer.php");?>