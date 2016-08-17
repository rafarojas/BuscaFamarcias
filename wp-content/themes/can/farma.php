<?php
/*
  Template Name: farma
 */
get_header();

$args = array( 'post_status' => 'publish' , 
                'post_type'   => 'farmacia',
                'orderby'     => 'date',
                'posts_per_page' => -1,
                'order'       => 'ASC'
            );

$farmacia = new WP_Query( $args );

?> 

<script type="text/javascript">
    $(document).ready(function(){

        $(".cupon_title").hide();
        $("#farma_list").hide();
        $("#medi_details").hide();

        $("#nav-ing-one").on('mouseover',function(){
            $(this).removeClass("ing-exp");
            $(this).removeClass("nav-animation-exp");
            $(this).addClass("ing");
            $(this).addClass("nav-animation");
            $(this).append('<style>#main_navigationbar  .navbar-nav > li > a.ing:before{opacity:1; left:-10px; }</style>');
            $(this).append('<style>#main_navigationbar  .navbar-nav > li > a.ing:after{opacity:1; left:65px; }</style>');
        });

        $("#nav-ing-two").on('mouseover',function(){
            $(this).removeClass("ing-exp");
            $(this).removeClass("nav-animation-exp");
            $(this).addClass("ing-two");
            $(this).addClass("nav-animation");
            $(this).append('<style>#main_navigationbar  .navbar-nav > li > a.ing-two:before{opacity:1; left:-10px; }</style>');
            $(this).append('<style>#main_navigationbar  .navbar-nav > li > a.ing-two:after{opacity:1; left:85px; }</style>');
        });

        $("#nav-ing-one").on('mouseout',function(){
            $(this).removeClass("ing");
            $(this).addClass("ing-exp");
            $(this).addClass("nav-animation-exp");
        });

        $("#nav-ing-two").on('mouseout',function(){
            $(this).removeClass("ing-two");
            $(this).addClass("ing-exp");
            $(this).addClass("nav-animation-exp");
        });

        $(function() {
            var availableTags = [
              "ARAKOR 60 mg x 20 COMPRIMIDOS",
              "ZEMIGLO 50 mg x 30 COMPRIMIDOS",
              "SIFROL ER 1.5 mg x 10 COMPRIMIDOS",
              "EXFORGE HCT 10 mg/ 160 mg / 25 mg x 14 COMPRIMIDOS",
              "EXFORGE HCT 10 mg/ 160 mg/ 12.5 mg X 28 COMPRIMIDOS",
              "XARELTO 10 mg x 10 COMPRIMIDOS",
              "SERETIDE INHALADOR 25/125 mcg x 120 DOSIS",
              "HUMULIN N 100 Ul / ml NPH x 1 VIAL 10 ml (FRIO 2 a 8 °C)",
              "GARDASIL 1 JERINGA PRELLENADA SUSPENSION INYECTABLE 0.5 ml (FRIO 2 a 8 °C)",
              "ETALPHA 1 mcg x 30 TABLETAS",
              "ALBOTHYL OVULOS 6 OVULOS [4301302]",
              "BADYKET 3500 UI 2 JERINGA PRELLENADA",
              "RANEXA 1000mg x 30 COMPRIMIDOS",
              "BRITOMAR 10 mg x 30 COMPRIMIDOS",
              "HIDRASEC SOBRES 30 x 18",
              "ELIQUIS 2.5 mg x 60 TABLETAS RECUBIERTAS",
              "EPIVAL ER 250 mg x 30 TABLETAS",
              "ROACCUTANE 20 mg x 30 CAPSULAS [242340]",
              "LIBRAX 5 / 2.5 mg x 30 CAPSULAS",
              "ATACAND PLUS 32/25 mg x 14 TABLETAS",
              "SYMBICORT TURBUHALER 160 / 4.5 mcg x 120 DOSIS"
            ];
            $( "#medicamento" ).autocomplete({
              source: availableTags
            });
          });

        $("#al").css('display','none'); $("#hd").css('display','none');  $("#cg").css('display','none'); $("#pt").css('display','none'); $("#lm").css('display','none'); $("#gct").css('display','none');

        $('.city').on('change', function() {
            city = $(this).find(":selected").val();
            switch (city) { 
                case 'sj': 
                    $("#sj").css('display','block'); $("#al").css('display','none'); $("#hd").css('display','none'); $("#cg").css('display','none'); $("#pt").css('display','none'); $("#lm").css('display','none'); $("#gct").css('display','none');
                    break;
                case 'al': 
                    $("#al").css('display','block'); $("#sj").css('display','none'); $("#hd").css('display','none'); $("#cg").css('display','none'); $("#pt").css('display','none'); $("#lm").css('display','none'); $("#gct").css('display','none');
                    break;
                case 'hd': 
                    $("#hd").css('display','block'); $("#al").css('display','none'); $("#sj").css('display','none'); $("#cg").css('display','none'); $("#pt").css('display','none'); $("#lm").css('display','none'); $("#gct").css('display','none');
                    break;      
                case 'cg': 
                    $("#cg").css('display','block'); $("#al").css('display','none'); $("#hd").css('display','none'); $("#sj").css('display','none'); $("#pt").css('display','none'); $("#lm").css('display','none'); $("#gct").css('display','none');
                    break;
                 case 'pt': 
                    $("#pt").css('display','block'); $("#al").css('display','none'); $("#hd").css('display','none'); $("#cg").css('display','none'); $("#sj").css('display','none'); $("#lm").css('display','none'); $("#gct").css('display','none');
                    break;
                case 'lm': 
                    $("#lm").css('display','block'); $("#al").css('display','none'); $("#hd").css('display','none'); $("#cg").css('display','none'); $("#pt").css('display','none'); $("#sj").css('display','none'); $("#gct").css('display','none');
                    break;      
                case 'gct': 
                    $("#gct").css('display','block'); $("#al").css('display','none'); $("#hd").css('display','none'); $("#cg").css('display','none'); $("#pt").css('display','none'); $("#lm").css('display','none'); $("#sj").css('display','none');
                    break;
            }
        });

    cupon = false;

    $( "#sub-ingresar" ).click(function() {
        cupon = true;
    });

    $( "#new-sub-medicamento" ).click(function() {
        $("#search-form").delay(500).fadeIn();
        $("#farma_list").fadeOut();
        $("#medi_details").fadeOut();
        $(".cupon_title").fadeOut();

        $("#fields-group").removeClass("fields-group-animation");
        $("#search-button").removeClass("search-button-animation");

        $("#new-search").addClass("new-search-animation");  
        $("#full_details").addClass("full-details-animation");
    });
    
    $( "#sub-medicamento" ).click(function() {
      medi = $( "#medicamento" ).val();
      pro = $( "select#provincia option:selected").val();
      can = $( "select#canton option:selected").val();

      $("#fields-group").addClass("fields-group-animation");
      $("#search-button").addClass("search-button-animation");
      $("#new-search").removeClass("new-search-animation");
      $("#full_details").removeClass("full-details-animation");

      $("ul.body_table").hide();
      $("#search-form").fadeOut();
      $("#farma_list").delay(500).fadeIn();
      $("#medi_details").delay(500).fadeIn();

      $("#medica-container").html("<p>" + medi + "</p>");

      switch (medi){

        case 'ARAKOR 60 mg x 20 COMPRIMIDOS':
        case 'ZEMIGLO 50 mg x 30 COMPRIMIDOS':
            $(".casa").html("<i>STENDHAL PHARMA</i>");
            break;

        case 'SIFROL ER 1.5 mg x 10 COMPRIMIDOS':
            $(".casa").html("<i>0201-BOERINGER PROMECO</i>");
            break;

        case 'EXFORGE HCT 10 mg/ 160 mg / 25 mg x 14 COMPRIMIDOS':
        case 'EXFORGE HCT 10 mg/ 160 mg/ 12.5 mg X 28 COMPRIMIDOS':
            $(".casa").html("<i>0627-NOVARTIS/VALUE LINE</i>");
            break;

        case 'XARELTO 10 mg x 10 COMPRIMIDOS':
            $(".casa").html("<i>0188-BAYER</i>");
            break;

        case 'SERETIDE INHALADOR 25/125 mcg x 120 DOSIS':
            $(".casa").html("<i>0202-GLAXO</i>");
            break;

        case 'HUMULIN N 100 Ul / ml NPH x 1 VIAL 10 ml (FRIO 2 a 8 °C)':
            $(".casa").html("<i>0559-ELI LILLY ENDOCRINO</i>");
            break;

        case 'GARDASIL 1 JERINGA PRELLENADA SUSPENSION INYECTABLE 0.5 ml (FRIO 2 a 8 °C)':
            $(".casa").html("<i>0290-MERCK S / D</i>");
            break;

        case 'ETALPHA 1 mcg x 30 TABLETAS':
            $(".casa").html("<i>0271-LEO PHARMACEUTICAL</i>");
            break;

        case 'ALBOTHYL OVULOS 6 OVULOS [4301302]':
            $(".casa").html("<i>0181-ROWE</i>");
            break;

        case 'BADYKET 3500 UI 2 JERINGA PRELLENADA':
        case 'RANEXA 1000mg x 30 COMPRIMIDOS':
            $(".casa").html("<i>0613-LAB. MENARINI</i>");
            break;

        case 'BRITOMAR 10 mg x 30 COMPRIMIDOS':
        case 'HIDRASEC SOBRES 30 x 18':
            $(".casa").html("<i>0464-FERRER</i>");
            break;

        case 'ELIQUIS 2.5 mg x 60 TABLETAS RECUBIERTAS':
            $(".casa").html("<i>0306-PFIZER S.A</i>");
            break;

        case 'EPIVAL ER 250 mg x 30 TABLETAS':
            $(".casa").html("<i>0173-ABBOTT LAB.</i>");
            break;

        case 'ROACCUTANE 20 mg x 30 CAPSULAS [242340]':
            $(".casa").html("<i>0332-ROCHE</i>");
            break;

        case 'LIBRAX 5 / 2.5 mg x 30 CAPSULAS':
            $(".casa").html("<i>0255-VALEANT FARMACEUTICA PANAMA</i>");
            break;

        case 'ATACAND PLUS 32/25 mg x 14 TABLETAS':
        case 'SYMBICORT TURBUHALER 160 / 4.5 mcg x 120 DOSIS':
            $(".casa").html("<i>0544-ASTRA ZENECA UK LIMITED</i>");
            break;
      }

      if(cupon == true){
            $(".cupon_title").show();
        }

      
        if (pro == "sj"){
            $("ul.5961").show(); $("ul.5964").show(); $("ul.5966").show(); $("ul.5968").show(); $("ul.5970").show();  
        }
      

      
        if (pro == "al"){ 
            $("ul.6062").show(); $("ul.6064").show(); $("ul.6066").show(); $("ul.6068").show(); $("ul.6070").show();
        }
      

      
        if (pro == "hd"){ 
            $("ul.6020").show(); $("ul.6022").show(); $("ul.6024").show(); $("ul.6026").show(); $("ul.6028").show();
        }
      

      
        if (pro == "cg"){ 
            $("ul.6034").show();  $("ul.6036").show(); $("ul.6038").show(); $("ul.6040").show(); $("ul.6042").show();
        }
      

      
        if (pro == "pt"){ 
            $("ul.6102").show(); $("ul.6104").show();  $("ul.6106").show(); $("ul.6108").show(); $("ul.6110").show();
        }
      

      
        if (pro == "lm"){ 
            $("ul.6163").show(); $("ul.6165").show(); $("ul.6166").show(); $("ul.6168").show(); $("ul.6170").show();
        }
      

      
        if (pro == "gct"){ 
            $("ul.6135").show(); $("ul.6137").show(); $("ul.6139").show(); $("ul.6141").show(); $("ul.6143").show();
        }
      

    });

    });
</script>

<div class="container main-content">
    <div class="row">
        <section class="col-md-13">
            <h1 class="animation">
                <p class="a">E</p>
                <p class="b">n</p>
                <p class="c">c</p>
                <p class="d">u</p>
                <p class="e">e</p>
                <p class="f">n</p>
                <p class="dd">t</p>
                <p class="ee">r</p>
                <p class="ff">e</p>

                <p class="g">s</p>
                <p class="h">u</p>
                <p class="i">s</p>

                <p class="j">M</p>
                <p class="k">e</p>
                <p class="l">d</p>
                <p class="m">i</p>
                <p class="n">c</p>
                <p class="o">a</p>
                <p class="p">m</p>
                <p class="q">e</p>
                <p class="r">n</p>
                <p class="s">t</p>
                <p class="t">o</p>
                <p class="v">s</p>
            </h1>
            <h1 class="no_animation">Busque sus Medicamentos</h1>
        </section>
    </div>
</div>

<!--Search Form-->
<section id="search-form" class="custom-form">
    <div class="container main-content">
        <div class="row">
            <section class="col-xs-6 mobile-size">
                <div class="row"> 
                    <div class="col-sm-10">
                        <fieldset id="fields-group" class="">

                            <div class="col-xs-6">
                                <div class="form-group">
                                    <fieldset>
                                        <label for="medicamento">Medicamento</label>
                                        <input type="text" class="form-control bg-gray" id="medicamento" name="medicamento" value="" tabindex="1">
                                    </fieldset>
                                 </div>
                            </div>
                          
                            <div class="col-xs-6 city">
                                <div class="form-group"> 
                                    <fieldset>
                                        <label for="provincia">Provincia</label>
                                        <div class="select-topic">
                                            <fieldset>
                                                <select class="form-control bg-gray" id="provincia" tabindex="3">
                                                    <option value="" data-hidden="true"></option>                       
                                                    <option value="sj">San Jose</option>
                                                    <option value="al">Alajuela</option>
                                                    <option value="hd">Heredia</option>
                                                    <option value="cg">Cartago</option>
                                                    <option value="pt">Puntarenas</option>
                                                    <option value="lm">Limon</option>
                                                    <option value="gct">Guanacaste</option>
                                               </select>
                                            </fieldset>
                                            <span class="glyphicon glyphicon-menu-down select-drop"></span>                      
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div id="sj" class="col-xs-6">
                                <div class="form-group"> 
                                    <fieldset>
                                        <label for="canton">Cantón</label>
                                        <div class="select-topic">
                                            <fieldset>
                                                <select class="form-control bg-gray" name="canton" id="canton" tabindex="4">
                                                    <option value="" data-hidden="true"></option>  
                                                    <option value="san_jose">San Jose</option>                     
                                                    <option value="escazu">Escazu</option>
                                                    <option value="desamparados">Desamparados</option>
                                                    <option value="puriscal">Puriscal</option>
                                                    <option value="tarrazu">Tarrazu</option>
                                                    <option value="aserri">Aserri</option>
                                                    <option value="mora">Mora</option>
                                                    <option value="goicoechea">Goicoechea</option>
                                                    <option value="santa_ana">Santa Ana</option>
                                                    <option value="alajuelita">Alajuelita</option>
                                                    <option value="vazques_de_coronado">Vazques de Coronado</option>
                                                    <option value="acosta">Acosta</option>
                                                    <option value="tibas">Tibas</option>
                                                    <option value="moravia">Moravia</option>
                                                    <option value="montesdeoca">Montes de Oca</option>
                                                    <option value="turrubares">Turrubares</option>
                                                    <option value="dota">Dota</option>
                                                    <option value="Curridabat">Curridabat</option>
                                                    <option value="leon_cortes_castro">Leon Cortes Castro</option>
                                                    <option value="perez_zeledon">Perez Zeledon</option>
                                               </select>
                                            </fieldset>
                                            <span class="glyphicon glyphicon-menu-down select-drop"></span>                      
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div id="al" class="col-xs-6">
                                <div class="form-group"> 
                                    <fieldset>
                                        <label for="time_in_business">Cantón</label>
                                        <div class="select-topic">
                                            <fieldset>
                                                <select class="form-control bg-gray" name="time_in_business" id="time_in_business" tabindex="4">
                                                    <option value="" data-hidden="true"></option> 
                                                    <option value="alajuela">Alajuela</option>
                                                    <option value="san_carlos">San Carlos</option>
                                                    <option value="upala">Upala</option>
                                                    <option value="los_chiles">Los Chiles</option>
                                                    <option value="guatuso">Guatuso</option>
                                                    <option value="san_mateo">San Mateo</option>
                                                    <option value="orotina">Orotina</option>
                                                    <option value="san_ramon">San Ramon</option>
                                                    <option value="grecia">Grecia</option>
                                                    <option value="atenas">Atenas</option>
                                                    <option value="naranjo">Naranjo</option>
                                                    <option value="palmares">Palmares</option>
                                                    <option value="poas">Poas</option>
                                                    <option value="zarcero">Zarcero</option>
                                                    <option value="valverde_vega">Valverde Vega</option>
                                               </select>
                                            </fieldset>
                                            <span class="glyphicon glyphicon-menu-down select-drop"></span>                      
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div id="hd" class="col-xs-6">
                                <div class="form-group"> 
                                    <fieldset>
                                        <label for="time_in_business">Cantón</label>
                                        <div class="select-topic">
                                            <fieldset>
                                                <select class="form-control bg-gray" name="time_in_business" id="time_in_business" tabindex="4">
                                                    <option value="" data-hidden="true"></option>                       
                                                    <option value="heredia">Heredia</option>
                                                    <option value="sarapiqui">Sarapiqui</option>
                                                    <option value="barva">Barva</option>
                                                    <option value="santo_domingo">Santo Domingo</option>
                                                    <option value="santa_barbara">Santa Barbara</option>
                                                    <option value="san_rafael">San Rafael</option>
                                                    <option value="san_isidro">San Isidro</option>
                                                    <option value="belen">Belen</option>
                                                    <option value="flores">Flores</option>
                                                    <option value="san_pablo">San Pablo</option>
                                               </select>
                                            </fieldset>
                                            <span class="glyphicon glyphicon-menu-down select-drop"></span>                      
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div id="cg" class="col-xs-6">
                                <div class="form-group"> 
                                    <fieldset>
                                        <label for="time_in_business">Cantón</label>
                                        <div class="select-topic">
                                            <fieldset>
                                                <select class="form-control bg-gray" name="time_in_business" id="time_in_business" tabindex="4">
                                                    <option value="" data-hidden="true"></option>                       
                                                    <option value="cartago">Cartago</option>
                                                    <option value="paraiso">Paraiso</option>
                                                    <option value="la_union">La Union</option>
                                                    <option value="jimenez">Jimenez</option>
                                                    <option value="turrialba">Turrialba</option>
                                                    <option value="alvarado">Alvarado</option>
                                                    <option value="oreamuno">Oreamuno</option>
                                                    <option value="el_guarco">El Guarco</option>
                                               </select>
                                            </fieldset>
                                            <span class="glyphicon glyphicon-menu-down select-drop"></span>                      
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div id="pt" class="col-xs-6">
                                <div class="form-group"> 
                                    <fieldset>
                                        <label for="time_in_business">Cantón</label>
                                        <div class="select-topic">
                                            <fieldset>
                                                <select class="form-control bg-gray" name="time_in_business" id="time_in_business" tabindex="4">
                                                    <option value="" data-hidden="true"></option>                       
                                                    <option value="puntarenas">Puntarenas</option>
                                                    <option value="esparza">Esparza</option>
                                                    <option value="montes_de_oro">Montes de Oro</option>
                                                    <option value="aguirre">Aguirre</option>
                                                    <option value="parrita">Parrita</option>
                                                    <option value="garabito">Garabito</option>
                                                    <option value="buenos_aires">Buenos Aires</option>
                                                    <option value="osa">Osa</option>
                                                    <option value="golfito">Golfito</option>
                                                    <option value="coto_brus">Coto Brus</option>
                                                    <option value="corredores">Corredores</option>
                                               </select>
                                            </fieldset>
                                            <span class="glyphicon glyphicon-menu-down select-drop"></span>                      
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div id="lm" class="col-xs-6">
                                <div class="form-group"> 
                                    <fieldset>
                                        <label for="time_in_business">Cantón</label>
                                        <div class="select-topic">
                                            <fieldset>
                                                <select class="form-control bg-gray" name="time_in_business" id="time_in_business" tabindex="4">
                                                    <option value="" data-hidden="true"></option>                       
                                                    <option value="limon">Limon</option>
                                                    <option value="pococi">Pococi</option>
                                                    <option value="siquirres">Siquirres</option>
                                                    <option value="talamanca">Talamanca</option>
                                                    <option value="matina">Matina</option>
                                               </select>
                                            </fieldset>
                                            <span class="glyphicon glyphicon-menu-down select-drop"></span>                      
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div id="gct" class="col-xs-6">
                                <div class="form-group"> 
                                    <fieldset>
                                        <label for="time_in_business">Cantón</label>
                                        <div class="select-topic">
                                            <fieldset>
                                                <select class="form-control bg-gray" name="time_in_business" id="time_in_business" tabindex="4">
                                                    <option value="" data-hidden="true"></option>                       
                                                    <option value="liberia">Liberia</option>
                                                    <option value="nicoya">Nicoya</option>
                                                    <option value="santa_cruz">Santa Cruz</option>
                                                    <option value="bagaces">Bagaces</option>
                                                    <option value="carrillo">Carrillo</option>
                                                    <option value="canas">Cañas</option>
                                                    <option value="abangares">Abangares</option>
                                                    <option value="tilaran">Tilaran</option>
                                                    <option value="nandayure">Nandayure</option>
                                                    <option value="la_cruz">La Cruz</option>
                                                    <option value="hojancha">Hojancha</option>
                                               </select>
                                            </fieldset>
                                            <span class="glyphicon glyphicon-menu-down select-drop"></span>                      
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="col-xs-6 doc">
                                <div class="form-group">
                                    <fieldset>
                                        <label for="doc">Número de Médico</label>
                                        <input type="text" class="form-control bg-gray" id="doc" name="doc" value="" tabindex="2">
                                    </fieldset>
                                 </div>
                            </div>
                            
                        </fieldset>
                    

                        <div id="search-button" class="search-button">
                            <div class="form-group"> 
                                <div class="text-center">
                                    <div role="complementary" class="widget-area applynow">
                                        <section class="widget widget_applynow_widget" id="applynow_widget-3">
                                            <a id="sub-medicamento" class="btn btn-blue-bg btn-getquote" title="Buscar" tabindex="5"> Buscar</a>
                                     </section>           
                                   </div>
                               </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </div>
</section>  

<section id="medi_details">
    <div class="container">
        <div class="row">
            <div class="col-md-13 container ">

                <div id="new-search" class="new-search">
                    <div class="form-group"> 
                        <div role="complementary" class="widget-area applynow">
                            <section class="widget widget_applynow_widget" id="applynow_widget-3">
                                <a id="new-sub-medicamento" class="btn btn-blue-bg btn-getquote" title="Nueva Busqueda" tabindex="4">Nueva Busqueda</a>
                         </section>           
                       </div>
                    </div>
                </div>

                <div id="full_details" class="full_details">
                    <img src="http://encuentramedicina.com/wp-content/themes/can/images/xarelto.jpeg" alt="test"/>
                    <div class="left_details">
                        <div id="medica-container"></div>
                        <p class="casa"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>  

<section id="farma_list">
    <div class="container">
        <div class="row">
            <div class="col-md-12 container ">

                <ul class="header_table">
                    <li class="name">Farmacia</li>
                    <li class="phone">Telefono</li>
                    <li class="address">Direccion</li>
                </ul>
                <hr/>

                <?php 
                    while ($farmacia->have_posts()) : $farmacia->the_post(); ?>

                    <ul class="<?php echo get_the_ID() ?> body_table">         
                        <li class="name" data-toggle="modal" data-target="#myModal_<?php echo get_the_ID() ?>"><?php echo get_the_title(); ?></li>
                        <li class="phone" data-toggle="modal" data-target="#myModal_<?php echo get_the_ID() ?>"><?php echo get_post_meta($post->ID, 'wpcf-telefono', true); ?></li>
                        <li class="address" data-toggle="modal" data-target="#myModal_<?php echo get_the_ID() ?>"><?php echo get_post_meta($post->ID, 'wpcf-direccion-exacta', true); ?></li>
                    <hr/> 
                    </ul>                  

                    <!-- Modal -->
                    <div class="modal fade" id="myModal_<?php echo get_the_ID(); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body text-center">
                                    <div class="thumbnail">
                                        <div class="caption">
                                            <h1><?php echo get_the_title(); ?></h1>
                                            <h4>Telefono: <?php echo get_post_meta($post->ID, 'wpcf-telefono', true); ?></h4>
                                            <h4>Correo Electronico: <?php echo get_post_meta($post->ID, 'wpcf-correo-electronico', true); ?></h4>
                                            <h4 class="content">Direccion: <?php echo get_post_meta($post->ID, 'wpcf-direccion-exacta', true); ?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</section>

<div class="container main-content cupon_title">
    <div class="row">
        <section class="col-md-13">
            <h2>Cupón # A01</h2>
        </section>
    </div>
</div>



<?php get_footer(); ?>

