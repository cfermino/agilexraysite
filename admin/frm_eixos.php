<?php require_once("_incs/header.php");?>

                        <?php
                                $stmt = $conn->query("SELECT id,tx_eixo_pt,tx_eixo_en,in_status,in_plotavel,id_diagnostico,in_peso FROM agile_eixos where id='".$_GET['id']."'");
                                $eixo = $stmt->fetch(PDO::FETCH_OBJ);
                          ?>

       <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
<h3><?php if(isset($_GET['id']) and $_GET['id'] > 0){ ?>Editar <?php }else{ ?> Adicionar <?php } ?> | Eixo</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    
                    <div class="x_content">
                        <br>
                        <form id="demo-form2" method="post" action="insert_registers.php" data-parsley-validate="" class="form-horizontal form-label-left"  >
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pergunta-pt">Diagnóstico  <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <select required name="id_diagnostico"  class="form-control col-md-7 col-xs-12">
                                    <option value="" selected>Selecione</option>
                                    <?php   
                                            $stmt = $conn->query("SELECT id,tx_diagnostico_pt FROM agile_diagnosticos");
                                            while($diagnosticos = $stmt->fetch(PDO::FETCH_OBJ)) {
                                    ?>
                                                <option value="<?php echo $diagnosticos->id;?>" <?php if($eixo->id_diagnostico == $diagnosticos->id){ ?> selected <?php } ?>><?php echo utf8_encode($diagnosticos->tx_diagnostico_pt);?></option> 
                                    <?php } ?>
                                    
                            </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="eixo-pt">Eixo Plotável  <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <select required name="in_plotavel"  class="form-control col-md-7 col-xs-12" >
                                    <option value="" selected>Selecione</option>
                                    <option value="1" <?php if($eixo->in_plotavel == 1){ ?> selected <?php } ?>>Sim</option> 
                                    <option value="0" <?php if($eixo->in_plotavel == 0){ ?> selected <?php } ?>>Não</option> 
                            </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="eixo-pt">Eixo - PT <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="eixo-pt" value="<?php echo utf8_encode($eixo->tx_eixo_pt);?>" name="eixo-pt" required="required" class="form-control col-md-7 col-xs-12" style="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="eixo-en">Eixo - EN <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="eixo-en"  value="<?php echo utf8_encode($eixo->tx_eixo_en);?>"  name="eixo-en"  class="form-control col-md-7 col-xs-12 required" style="">
                            </div>
                        </div>   
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="eixo-en">Peso <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="eixo-en"  value="<?php echo utf8_encode($eixo->in_peso);?>"  name="in_peso"  class="form-control col-md-7 col-xs-12 required" style="">
                            </div>
                        </div>                                
                                
                        
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button class="btn btn-primary" onclick="javascript:window.location.assign('lista_eixos.php');" type="button">Voltar</button>
                            <button class="btn btn-primary"  type="reset">Limpar</button>
                            <?php if(isset($_GET['id']) and $_GET['id'] > 0){ ?>
                                <button type="submit" class="btn btn-success">Salvar</button>
                            <?php }else{ ?>
                                <button type="submit" class="btn btn-success">Cadastrar</button>
                            <?php } ?>
                            
                            <input type="hidden" name="id" value="<?php echo $_GET['id'];?>"/>
                            <input type="hidden" name="table" value="eixos"/>

                            </div>
                        </div>

                        </form>
                    </div>
                    </div>
              </div>
</div>
        <!-- /page content -->
<?php require_once("_incs/footer.php");?>