<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
 

    <title>Cadastro</title>
  </head>
  <body>
  
    <div class="container">
      <form action="register_user.php" method="post">
        <div class="row">
        
          <div class="input-field col s12">
          <label for="nome">Nome</label><input type="text"  name="nome" id="nome" placeholder="Nome"></div>
        </div>
        <div class="row">
          <div class="input-field col s12"><input type="text"  name="email" id="email" placeholder="E-mail"></div>
        </div>
        <div class="row">
          <div class="input-field col s12"><input type="password"  name="senha" id="" placeholder="Senha"></div>
        </div>
        <div class="row">
          <div class="input-field col s12"><input type="text" name="empresa" id="" placeholder="Empresa"></div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <select name="cargo">
            <option value="" disabled selected>Selecione</option>
              <option value="Diretor/Gerente de Produto">Diretor/Gerente de Produto</option>
              <option value="Product Manager/Owner">Product Manager/Owner</option>
              <option value="Diretor/Gerente de Processos Ágeis">Diretor/Gerente de Processos Ágeis</option>
              <option value="Agile Coach">Agile Coach</option>
              <option value="Scrum Master">Scrum Master</option>
            </select>  
            
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <select name="id_ramo_atividade">
            <option value="" disabled selected>Selecione</option>
              <option value="1">Tecnologia</option>
              <option value="2">Internet</option>
            </select>  
            
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <label>Diagnóstico de Product Manager/Product Owner</label><br/>
            <select name="id_diagnostico">
            <option value="" disabled selected>Selecione</option>
              <option value="1">Diagnóstico individual (eu mesmo)</option>
              <option value="2">Diagnóstico pelo gestor/agile coach (gestor/agile coach & avaliado)</option>
            </select>
          
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <select name="id_plano">
            <option value="" disabled selected>Selecione</option>
              <option value="1">Diagnóstico Único</option>
              <option value="2">Diagnóstico Único com Benchmark (visão comparativa (média geral e/ou média do setor))</option>
              <option value="3">Plano Mensal: assinatura com diagnósticos recorrentes & visão evolutiva</option>
              <option value="4">Plano Premium: assinatura com visão comparativa (média geral e/ou média do setor)</option>
            </select>  
            
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12"><input type="text" name="razao_social" id="" placeholder="Razão Social"></div>
        </div>
        <div class="row">
          <div class="input-field col s12"><input type="text" name="cnpj" id="" placeholder="CPNJ"></div>
        </div>
        <div class="row">
          <div class="input-field col s12"><input type="text" name="endereco" id="" placeholder="Endereço"></div>
        </div>
        <div class="row">
          <div class="input-field col s12"><input type="text" name="numero" id="" placeholder="Número"></div>
        </div>
        <div class="row">
          <div class="input-field col s12"><input type="text" name="complemento" id="" placeholder="Complemento"></div>
        </div>     
        <div class="row">
          <div class="input-field col s12"><input type="text" name="cep" id="" placeholder="CEP"></div>
        </div>
        <div class="row">
          <div class="input-field col s12"><input type="text" name="bairro" id="" placeholder="Bairro"></div>
        </div>
        <div class="row">
          <div class="input-field col s12"><input type="text" name="cidade" id="" placeholder="Cidade"></div>
        </div>
        <div class="row">
          <div class="input-field col s12"><input type="text" name="estado" id="" placeholder="Estado"></div>
        </div>
                <div class="row">
          <div class="input-field col s12"> <button class="btn waves-effect waves-light" type="submit" name="action">Enviar
    <i class="material-icons right">send</i>
  </button></div>
        </div>
        </form>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
          var elems = document.querySelectorAll('select');
          var instances = M.FormSelect.init(elems, options);
        });

        // Or with jQuery

        $(document).ready(function(){
          $('select').formSelect();
        });
              
    </script>
  </body>
</html>