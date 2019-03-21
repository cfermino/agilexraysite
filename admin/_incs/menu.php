<!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a hreg="home.php"><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                        <?php if($_SESSION['nome'] <> 'Madu'){ ?>
                        <ul class="nav child_menu">
                        <li><a href="gente/production/index.html">Dashboard</a></li>
                        <li><a href="gente/production/index2.html">Dashboard2</a></li>
                        <li><a href="gente/production/index3.html">Dashboard3</a></li>
                        </ul>
                        <?php } ?>
                    </li>
                    <li><a><i class="fa fa-gear"></i> Configurações <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="lista_cargos.php">Cargos</a></li>
                            <li><a href="lista_diagnosticos.php">Diagnósticos</a></li>
                            <li><a href="lista_eixos.php">Eixos</a></li>
                            <li><a href="lista_perguntas.php">Perguntas</a></li>
                            <li><a href="lista_planos.php">Planos</a></li>
                            <li><a href="lista_ramos.php">Ramos de Atividade</a></li>
                            <li><a href="lista_textos.php">Textos</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-gear"></i> Cadastros <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="listar_solicitacoes.php">Diagnósticos</a></li>
                        </ul>
                    </li>                    
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->