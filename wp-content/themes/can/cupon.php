<?php
/*
  Template Name: cupon
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
    
    $( "#sub-medicamento" ).click(function() {
      medi = $( "#medicamento" ).val();
      pro = $( "select#provincia option:selected").val();
      can = $( "select#canton option:selected").val();

      $("ul.body_table").hide();
      $(".cupon_title").show();

      if (medi == "Acetaminofen" || medi == "acetaminofen"){
        if (pro == "sj"){
            $("ul.5943").show();
            $("ul.5944").show();
            $("ul.5945").show();
            $("ul.5946").show();  
        }
      }

      if (medi == "Panadol" || medi == "panadol"){
        if (pro == "al" || pro == "pt"){ 
            $("ul.5947").show();
            $("ul.5948").show();
            $("ul.5949").show();
            $("ul.5950").show();
            $("ul.5955").show();
            $("ul.5956").show();
            $("ul.5957").show();
            $("ul.5958").show();
        }
      }

      if (medi == "Acetaminofen" || medi == "acetaminofen"){
        if (pro == "al"){
            $("ul.5951").show();
            $("ul.5952").show();
            $("ul.5953").show();
            $("ul.5954").show();  
        }
      }

      if (medi == "Panadol" || medi == "panadol"){
        if (pro == "hd" || pro == "lm"){ 
            $("ul.5960").show();
            $("ul.5961").show();
            $("ul.5962").show();
            $("ul.5963").show();
            $("ul.5964").show();
            $("ul.5965").show();
            $("Ul.5966").show();
            $("ul.5967").show();
        }
      }

      if (medi == "Panadol" || medi == "panadol"){
        if (pro == "sj"){ 
            $("ul.5960").show();
            $("ul.5961").show();
            $("ul.5962").show();
            $("ul.5963").show();
            $("ul.5964").show();
            $("ul.5965").show();
            $("ul.5966").show();
            $("ul.5967").show();
        }
      }

      if (medi == "Panadol" || medi == "panadol"){
        if (pro == "gct" || pro == "cg"){ 
            $("ul.5980").show();
            $("ul.5981").show();
            $("ul.5982").show();
            $("ul.5983").show();
            $("ul.5984").show();
            $("ul.5985").show();
            $("ul.5986").show();
            $("ul.5987").show();
        }
      }

      if (medi == "Acetaminofen" || medi == "acetaminofen"){
        if (pro == "gct" || pro == "cg"){
            $("ul.5991").show();
            $("ul.5992").show();
            $("ul.5993").show();
            $("ul.5994").show(); 
            $("ul.5995").show();
            $("ul.5996").show(); 
        }
      }

      if (medi == "Acetaminofen" || medi == "acetaminofen"){
        if (pro == "pt" || pro == "lm"){
            $("ul.5997").show();
            $("ul.5998").show();
            $("ul.5999").show();
            $("ul.5600").show(); 
        }
      }
    });

    });
</script>

<div class="container main-content">
    <div class="row">
        <section class="col-md-13">
            <h1><?php echo get_the_title($post->ID); ?></h1>
        </section>
    </div>
</div>

<!--Search Form-->
<section id="search-form" class="custom-form">
    <div class="container main-content">
        <div class="row">
            <section class="col-md-13">
                <div class="row"> 

                    <div class="col-sm-3">
                        <div class="form-group">
                            <fieldset>
                                <label for="medicamento">Medicamento</label>
                                <input type="text" class="form-control bg-gray" id="medicamento" name="medicamento" value="" tabindex="1">
                            </fieldset>
                         </div>
                    </div>
                  
                    <div class="col-sm-3 city">
                        <div class="form-group"> 
                            <label for="provincia">Provincia</label>
                            <div class="select-topic">
                                <fieldset>
                                    <select class="form-control bg-gray" id="provincia" tabindex="2">
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
                        </div>
                    </div>

                    <div id="sj" class="col-sm-3">
                        <div class="form-group"> 
                            <label for="canton">Canton</label>
                            <div class="select-topic">
                                <fieldset>
                                    <select class="form-control bg-gray" name="canton" id="canton" tabindex="3">
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
                        </div>
                    </div>

                    <div id="al" class="col-sm-3">
                        <div class="form-group"> 
                            <label for="time_in_business">Canton</label>
                            <div class="select-topic">
                                <fieldset>
                                    <select class="form-control bg-gray" name="time_in_business" id="time_in_business" tabindex="3">
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
                        </div>
                    </div>

                    <div id="hd" class="col-sm-3">
                        <div class="form-group"> 
                            <label for="time_in_business">Canton</label>
                            <div class="select-topic">
                                <fieldset>
                                    <select class="form-control bg-gray" name="time_in_business" id="time_in_business" tabindex="3">
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
                        </div>
                    </div>

                    <div id="cg" class="col-sm-3">
                        <div class="form-group"> 
                            <label for="time_in_business">Canton</label>
                            <div class="select-topic">
                                <fieldset>
                                    <select class="form-control bg-gray" name="time_in_business" id="time_in_business" tabindex="3">
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
                        </div>
                    </div>

                    <div id="pt" class="col-sm-3">
                        <div class="form-group"> 
                            <label for="time_in_business">Canton</label>
                            <div class="select-topic">
                                <fieldset>
                                    <select class="form-control bg-gray" name="time_in_business" id="time_in_business" tabindex="3">
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
                        </div>
                    </div>

                    <div id="lm" class="col-sm-3">
                        <div class="form-group"> 
                            <label for="time_in_business">Canton</label>
                            <div class="select-topic">
                                <fieldset>
                                    <select class="form-control bg-gray" name="time_in_business" id="time_in_business" tabindex="3">
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
                        </div>
                    </div>

                    <div id="gct" class="col-sm-3">
                        <div class="form-group"> 
                            <label for="time_in_business">Canton</label>
                            <div class="select-topic">
                                <fieldset>
                                    <select class="form-control bg-gray" name="time_in_business" id="time_in_business" tabindex="3">
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
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group"> 
                            <div class="text-center">
                                <div role="complementary" class="widget-area applynow">
                                    <section class="widget widget_applynow_widget" id="applynow_widget-3">
                                        <a id="sub-medicamento" class="btn btn-blue-bg btn-getquote" title="Buscar" tabindex="4"> Buscar</a>
                                 </section>           
                               </div>
                           </div>
                        </div>
                    </div>

                </div>
            </section>
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
                    <li class="email">Correo Electronico</li>
                    <li class="address">Direccion</li>
                </ul>
                <hr/>

                <?php 
                    while ($farmacia->have_posts()) : $farmacia->the_post(); ?>

                    <ul class="<?php echo get_the_ID() ?> body_table">         
                        <li class="name" data-toggle="modal" data-target="#myModal_<?php echo get_the_ID() ?>"><?php echo get_the_title(); ?></li>
                        <li class="phone" data-toggle="modal" data-target="#myModal_<?php echo get_the_ID() ?>"><?php echo get_post_meta($post->ID, 'wpcf-telefono', true); ?></li>
                        <li class="email" data-toggle="modal" data-target="#myModal_<?php echo get_the_ID() ?>"><?php echo get_post_meta($post->ID, 'wpcf-correo-electronico', true); ?></li>
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
            <h1>Cupón # A01</h1>
        </section>
    </div>
</div>

<!-- footer -->

<?php get_footer(); ?>

