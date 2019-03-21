<?php require_once("_incs/header.php");?>

       <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
<h3><?php if(isset($_GET['id']) and $_GET['id'] > 0){ ?>Editar <?php }else{ ?> Adicionar <?php } ?> | Diagnóstico</h3>
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
                                $stmt = $conn->query("SELECT id_pai,id,tx_diagnostico_pt,tx_diagnostico_en,in_status,tx_texto_pt,tx_texto_en FROM agile_diagnosticos where id='".$_GET['id']."'");
                                $diagnostico = $stmt->fetch(PDO::FETCH_OBJ);
                          ?>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="diagnostico-pt">Diagnóstico Pai <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="id_pai_diagnostico"  class="form-control col-md-7 col-xs-12">
                                    <option value="">Selecione</option>
                                    <option value="1" <?php if($diagnostico->id_pai == 1){ ?> selected <?php } ?>>Diagnóstico de Product Manager/Product Owner</option> 
                                    <option value="2" <?php if($diagnostico->id_pai == 2){ ?> selected <?php } ?>>Diagnóstico de Scrum</option> 
                                    <option value="3" <?php if($diagnostico->id_pai == 3){ ?> selected <?php } ?>>Diagnóstico do Time</option> 
                            </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="diagnostico-pt">Diagnóstico - PT <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="diagnostico-pt" value="<?php echo utf8_encode($diagnostico->tx_diagnostico_pt);?>" name="diagnostico-pt" required="required" class="form-control col-md-7 col-xs-12" style="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="diagnostico-en">Diagnóstico - EN <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="diagnostico-en"  value="<?php echo utf8_encode($diagnostico->tx_diagnostico_en);?>"  name="diagnostico-en"  class="form-control col-md-7 col-xs-12" style="">
                            </div>
                        </div>      
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="diagnostico-en">Texto Introdutório - PT <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea id="tx_texto_pt" name="tx_texto_pt" rows="8" class="form-control col-md-7 col-xs-12" style=""><?php echo utf8_encode($diagnostico->tx_texto_pt);?> </textarea>
                            </div>
                        </div>      
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="diagnostico-en">Texto Introdutório - EN <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                
                            <textarea id="tx_texto_en" name="tx_texto_en" rows="8" class="form-control col-md-7 col-xs-12" style=""><?php echo utf8_encode($diagnostico->tx_texto_en);?></textarea>
                            </div>
                        </div> 
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="diagnostico-en">Corpo do E-mail Agile Coach ( Data Limite ou Respondentes Finalizados) - PT <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea id="corpo_email_pt" name="corpo_email_pt" rows="8" class="form-control col-md-7 col-xs-12" style=""><?php echo utf8_encode($diagnostico->tx_texto_pt);?> </textarea>
                            </div>
                        </div>      
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="diagnostico-en">Corpo do E-mail Agile Coach ( Data Limite ou Respondentes Finalizados) - EN <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                
                            <textarea id="corpo_email_en" name="corpo_email_en" rows="8" class="form-control col-md-7 col-xs-12" style=""><?php echo utf8_encode($diagnostico->tx_texto_en);?></textarea>
                            </div>
                        </div> 
                        
                        
                                
                        
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button class="btn btn-primary" onclick="javascript:window.location.assign('lista_diagnosticos.php');" type="button">Voltar</button>
                            <button class="btn btn-primary"  type="reset">Limpar</button>
                            <?php if(isset($_GET['id']) and $_GET['id'] > 0){ ?>
                                <button type="submit" class="btn btn-success">Editar</button>
                            <?php }else{ ?>
                                <button type="submit" class="btn btn-success">Cadastrar</button>
                            <?php } ?>
                            
                            <input type="hidden" name="id" value="<?php echo $_GET['id'];?>"/>
                            <input type="hidden" name="table" value="diagnosticos"/>

                            </div>
                        </div>

                        </form>
                    </div>
                    </div>
              </div>
</div>
        <!-- /page content -->
<?php require_once("_incs/footer.php");?>