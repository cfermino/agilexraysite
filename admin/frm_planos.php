<?php require_once("_incs/header.php");?>

       <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
<h3><?php if(isset($_GET['id']) and $_GET['id'] > 0){ ?>Editar <?php }else{ ?> Adicionar <?php } ?> | Plano</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    
                    <div class="x_content">
                        <br>
                        <form id="demo-form2" method="post" action="insert_registers.php" data-parsley-validate="" class="form-horizontal form-label-left"  >
                        <?php
                                $stmt = $conn->query("SELECT id,tx_plano_pt,tx_plano_en,in_status FROM agile_planos where id='".$_GET['id']."'");
                                $plano = $stmt->fetch(PDO::FETCH_OBJ);
                          ?>
                      

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="plano-pt">Plano - PT <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="plano-pt" value="<?php echo utf8_encode($plano->tx_plano_pt);?>" name="plano-pt" required="required" class="form-control col-md-7 col-xs-12" style="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="plano-en">Plano - EN <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="plano-en"  value="<?php echo utf8_encode($plano->tx_plano_en);?>"  name="plano-en"  class="form-control col-md-7 col-xs-12" style="">
                            </div>
                        </div>        
                                
                        
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button class="btn btn-primary" onclick="javascript:window.location.assign('lista_planos.php');" type="button">Voltar</button>
                            <button class="btn btn-primary"  type="reset">Limpar</button>
                            <?php if(isset($_GET['id']) and $_GET['id'] > 0){ ?>
                                <button type="submit" class="btn btn-success">Editar</button>
                            <?php }else{ ?>
                                <button type="submit" class="btn btn-success">Cadastrar</button>
                            <?php } ?>
                            
                            <input type="hidden" name="id" value="<?php echo $_GET['id'];?>"/>
                            <input type="hidden" name="table" value="planos"/>

                            </div>
                        </div>

                        </form>
                    </div>
                    </div>
              </div>
</div>
        <!-- /page content -->
<?php require_once("_incs/footer.php");?>