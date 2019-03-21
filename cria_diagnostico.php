
<?php require_once("_incs/header.php");?>
<script type="text/javascript">
      var verifyCallback = function(response) {
        alert(response);
      };
      var widgetId1;
      var widgetId2;
      var onloadCallback = function() {
        // Renders the HTML element with id 'example1' as a reCAPTCHA widget.
        // The id of the reCAPTCHA widget is assigned to 'widgetId1'.
        widgetId1 = grecaptcha.render('example1', {
          'sitekey' : '6LeTF3YUAAAAAJj5kYNOKd3Db96_cv8w0gBDym80',
          'theme' : 'light'
        });
        widgetId2 = grecaptcha.render(document.getElementById('example2'), {
          'sitekey' : '6LeTF3YUAAAAAJj5kYNOKd3Db96_cv8w0gBDym80'
        });
        grecaptcha.render('example3', {
          'sitekey' : '6LeTF3YUAAAAAJj5kYNOKd3Db96_cv8w0gBDym80',
          'callback' : verifyCallback,
          'theme' : 'dark'
        });
      };

      function validaRecaptcha(){
        validacaoEmail(registerForm.email);
        if($('#msgemail').html() != 'E-mail válido'){
          alert('Preencha o campo E-mail corretamente')
        }else{
          if(grecaptcha.getResponse(widgetId1) != ''){
              $('#registerForm').submit();
          }else{
            alert('Selecione o captcha');
          }

        }
      }
    </script>
   <div class="container">

    <div class="section">
<form id="registerForm" name="registerForm" action="gera_diagnostico.php" method="post">
    <div class="row">
        <div class="col s3">&nbsp;</div>
        <div class="input-field col s6 center">
        <label for="nome">Nome Completo</label><input type="text"  name="nome" id="nome" placeholder="Nome"  class="validate"></div>
        <div class="col s3">&nbsp;</div>
      </div>

      <div class="row">
      <div class="col s3">&nbsp;</div>
        <div class="input-field col s6">
            <input  type="email"  type="text" onblur="validacaoEmail(registerForm.email)"  name="email" id="email" placeholder="E-mail">
            <div id="msgemail"></div>
        </div>
        <div class="col s3">&nbsp;</div>
      </div>  
      <div class="row">
      <div class="col s3">&nbsp;</div>
          <div class="input-field col s6"><input type="password" class="validate" name="senha" id="senha" placeholder="Senha"></div>
          <div class="col s3">&nbsp;</div>
        </div>

      <div class="row">
      <div class="col s3">&nbsp;</div>
          <div class="input-field col s6"><input type="text" name="empresa" id="empresa" placeholder="Empresa"></div>
          <div class="col s3">&nbsp;</div>
        </div>

        <div class="row">
        <div class="col s3">&nbsp;</div>
            <div class="input-field col s6">
                <label for="nome">Ramo de Atividade</label><br/>
                <select name="id_ramo_atividade">
                    <option value="" disabled selected>Selecione</option>
                    <option value="1">Academia de Esportes, Artes Marciais</option>
                      <option value="1">Administração e Participação</option>
                      <option value="1">Advocacia</option>
                      <option value="1">Agricultura, Pecuária, Silvicultura</option>
                      <option value="1">Agências de Turismo, Viagem</option>
                      <option value="1">Alimentos</option>
                      <option value="1">Arquitetura, Paisagismo, Urbanismo</option>
                      <option value="1">Assessoria de Imprensa</option>
                      <option value="1">Automação</option>
                      <option value="1">Automotivo</option>
                      <option value="1">Açúcar e Álcool</option>
                      <option value="1">Bancário, Financeiro</option>
                      <option value="1">Bebidas</option>
                      <option value="1">Bens de Capital</option>
                      <option value="1">Bens de Consumo</option>
                      <option value="1">Borracha</option>
                      <option value="1">Café</option>
                      <option value="1">Calçados</option>
                      <option value="1">Comunicação</option>
                      <option value="1">Comércio Atacadista</option>
                      <option value="1">Comércio Varejista</option>
                      <option value="1">Concessionárias, Auto Peças</option>
                      <option value="1">Construção Civil</option>
                      <option value="1">Consultoria Geral</option>
                      <option value="1">Contabilidade, Auditoria</option>
                      <option value="1">Corretagem (Imóveis)</option>
                      <option value="1">Corretagem (Seguros)</option>
                      <option value="1">Corretagem de Títulos e Valores Imobiliários</option>
                      <option value="1">Cosméticos</option>
                      <option value="1">Diversão, Entretenimento</option>
                      <option value="1">Educação, Idiomas</option>
                      <option value="1">Eletrônica, Eletroeletrônica, Eletrodomésticos</option>
                      <option value="1">Embalagens</option>
                      <option value="1">Energia, Eletricidade</option>
                      <option value="1">Engenharia</option>
                      <option value="1">Equipamentos Industriais</option>
                      <option value="1">Equipamentos Médicos, Precisão</option>
                      <option value="1">Estética, Academias</option>
                      <option value="1">Eventos</option>
                      <option value="1">Farmacêutica, Veterinária</option>
                      <option value="1">Gráfica, Editoras</option>
                      <option value="1">Importação, Exportação</option>
                      <option value="1">Incorporadora</option>
                      <option value="1">Indústria</option>
                      <option value="1">Internet</option>
                      <option value="1">Jornais</option>
                      <option value="1">Jurídica</option>
                      <option value="1">Logística, Armazéns</option>
                      <option value="1">Madeiras</option>
                      <option value="1">Materiais de Construção</option>
                      <option value="1">Material de Escritório</option>
                      <option value="1">Mecânica, Manutenção</option>
                      <option value="1">Metalúrgica, Siderúrgica</option>
                      <option value="1">Mineração</option>
                      <option value="1">Móveis e Artefatos de Decoração</option>
                      <option value="1">Outros</option>
                      <option value="1">Papel e Derivados</option>
                      <option value="1">Petroquímico, Petróleo</option>
                      <option value="1">Plásticos</option>
                      <option value="1">Prestadora de Serviços</option>
                      <option value="1">Publicidade, Propaganda</option>
                      <option value="1">Recursos Humanos</option>
                      <option value="1">Relações Públicas</option>
                      <option value="1">Representação Comercial</option>
                      <option value="1">Restaurante, Industrial, Fast Food</option>
                      <option value="1">Saúde</option>
                      <option value="1">Segurança Patrimonial</option>
                      <option value="1">Seguros, Previdência Privada</option>
                      <option value="1">Sindicatos, Associações, ONGs</option>
                      <option value="1">Supermercado, Hipermercado</option>
                      <option value="1">Tecnologia da Informação</option>
                      <option value="1">Telecomunicações</option>
                      <option value="1">Telemarketing, Call Center</option>
                      <option value="1">Transportes</option>
                      <option value="1">Têxtil, Couro</option>
                      <option value="1">Órgãos Públicos</option>
                </select>  
            </div>
            <div class="col s3">&nbsp;</div>
        </div>
     
     <div class="row">
     <div class="col s3">&nbsp;</div>
        <div class="input-field col s6">
        <label for="cargo">Cargo</label><br/>
          <select name="cargo" id="cargo">
          <option value="" disabled selected>Selecione</option>
            <option value="Diretor/Gerente de Produto">Diretor/Gerente de Produto</option>
            <option value="Product Manager/Owner">Product Manager/Owner</option>
            <option value="Diretor/Gerente de Processos Ágeis">Diretor/Gerente de Processos Ágeis</option>
            <option value="Agile Coach">Agile Coach</option>
            <option value="Scrum Master">Scrum Master</option>
          </select>  
          
        </div>
        <div class="col s3">&nbsp;</div>
      </div>
    
<div class="row">
<div class="col s3">&nbsp;</div>
    <div class="col s6">
    <div id="example1"></div>
    <div class="col s3">&nbsp;</div>
    </div>
</div>


              <div class="row">
              <div class="col s3">&nbsp;</div>
        <div class="input-field col s6"> <button class="btn waves-effect waves-light" type="button" onclick="javascript:validaRecaptcha();" name="action">Cadastrar
  <i class="material-icons right">send</i>
</button></div>
<div class="col s3">&nbsp;</div>

      </div>
      <input type="hidden" name="tipo" value="<?php echo $_GET['tipo'];?>"/>
    </form>  
    </div>
    
  </div>
<?php require_once("_incs/footer.php");?>