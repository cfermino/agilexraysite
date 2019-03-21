<?php require_once("_incs/header.php");?>

       <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
<h3><?php if(isset($_GET['id']) and $_GET['id'] > 0){ ?>Editar <?php }else{ ?> Adicionar <?php } ?> | Pergunta</h3>
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
                                $stmt = $conn->query("SELECT id,tx_pergunta_pt,tx_pergunta_en,in_status,id_eixo FROM agile_perguntas where id='".$_GET['id']."'");
                                $pergunta = $stmt->fetch(PDO::FETCH_OBJ);
                          ?>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pergunta-pt">Eixo  <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="id_eixo"  class="form-control col-md-7 col-xs-12">
                                    <option value="" selected>Selecione</option>
                                    <?php   
                                            $stmt = $conn->query("SELECT id,tx_eixo_pt,tx_eixo_en,in_status,in_plotavel FROM agile_eixos");
                                            while($eixos = $stmt->fetch(PDO::FETCH_OBJ)) {
                                    ?>
                                                <option value="<?php echo $eixos->id;?>" <?php if($pergunta->id_eixo == $eixos->id){ ?> selected <?php } ?>><?php echo utf8_encode($eixos->tx_eixo_pt);?></option> 
                                    <?php } ?>
                                    
                            </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pergunta-pt">Pergunta - PT <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="pergunta-pt" value="<?php echo utf8_encode($pergunta->tx_pergunta_pt);?>" name="pergunta-pt" required="required" class="form-control col-md-7 col-xs-12" style="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pergunta-en">Pergunta - EN 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="pergunta-en"  value="<?php echo utf8_encode($pergunta->tx_pergunta_en);?>"  name="pergunta-en"  class="form-control col-md-7 col-xs-12" style="">
                            </div>
                        </div>  
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pergunta-en">Peso 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="pergunta-en"  value="<?php echo utf8_encode($pergunta->in_peso);?>"  name="in_peso"  class="form-control col-md-7 col-xs-12" style="">
                            </div>
                        </div>                           
                        
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button class="btn btn-primary" onclick="javascript:window.location.assign('lista_perguntas.php');" type="button">Voltar</button>
                            <button class="btn btn-primary"  type="reset">Limpar</button>
                            <?php if(isset($_GET['id']) and $_GET['id'] > 0){ ?>
                                <button type="submit" class="btn btn-success">Editar</button>
                            <?php }else{ ?>
                                <button type="submit" class="btn btn-success">Cadastrar</button>
                            <?php } ?>
                            
                            <input type="hidden" name="id" value="<?php echo $_GET['id'];?>"/>
                            <input type="hidden" name="table" value="perguntas"/>

                            </div>
                        </div>

                        </form>
                    </div>
                    </div>
              </div>
</div>
        <!-- /page content -->
<?php require_once("_incs/footer.php");?>