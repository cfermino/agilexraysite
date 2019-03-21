<?php require_once("_incs/header.php");?>

       <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
<h3><?php if(isset($_GET['id']) and $_GET['id'] > 0){ ?>Editar <?php }else{ ?> Adicionar <?php } ?> | Texto</h3>
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
                                $stmt = $conn->query("SELECT id,tx_texto,tx_texto_en,in_status,tx_tipo FROM agile_configuracoes where id='".$_GET['id']."'");
                                $ramo = $stmt->fetch(PDO::FETCH_OBJ);
                          ?>
                      

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ramo-pt">Texto - PT <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="ramo-pt" value="<?php echo utf8_encode($ramo->tx_texto);?>" name="texto-pt" required="required" class="form-control col-md-7 col-xs-12" style="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ramo-en">Texto - EN <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="ramo-en"  value="<?php echo utf8_encode($ramo->tx_texto_en);?>"  name="texto-en"  class="form-control col-md-7 col-xs-12" style="">
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ramo-en">Tipo <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="ramo-en"  value="<?php echo utf8_encode($ramo->tx_tipo);?>"  name="tipo"  class="form-control col-md-7 col-xs-12" style="">
                            </div>
                        </div>                                
                                
                        
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button class="btn btn-primary" onclick="javascript:window.location.assign('lista_textos.php');" type="button">Voltar</button>
                            <button class="btn btn-primary"  type="reset">Limpar</button>
                            <?php if(isset($_GET['id']) and $_GET['id'] > 0){ ?>
                                <button type="submit" class="btn btn-success">Editar</button>
                            <?php }else{ ?>
                                <button type="submit" class="btn btn-success">Cadastrar</button>
                            <?php } ?>
                            
                            <input type="hidden" name="id" value="<?php echo $_GET['id'];?>"/>
                            <input type="hidden" name="table" value="textos"/>

                            </div>
                        </div>

                        </form>
                    </div>
                    </div>
              </div>
</div>
        <!-- /page content -->
<?php require_once("_incs/footer.php");?>