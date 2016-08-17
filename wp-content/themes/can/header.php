<?php
ob_start();
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
    <head> 
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <?php wp_head(); ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
        <!-- Auto Complete -->
        <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

</head>
<body <?php body_class(); ?>>

    <?php
    global $show_more_limit,$post;
    $show_more_limit = get_option('posts_per_page');
    //Fetch whether to show sticky nav on page or not
    wp_reset_postdata();
    $sticky_nav_value = get_post_meta($post->ID, 'wpcf-display-sticky-navigation', true);
    ?>

    <section class="out_nav">
        <div class="utility-navigation">
            <div class="container">
                <div class="navbar-collapse2">              
                    <?php
                    // Call utility header
                    //$args = array('menu' => 'Utility Navigation', 'menu_class' => 'nav navbar-nav navbar-right', 'container' => false);
                    //wp_nav_menu($args);
                    ?>  
                   
                </div>
            </div>  
        </div>
    </section>

    <div id="main_navigationbar" class="primary-nav">
                <div class="container">
                    <div class="navbar-header ">
                        <a href="http://encuentramedicina.com/"><img class="header_logo" alt="logo" src="http://encuentramedicina.com/wp-content/themes/can/images/farma_logo.png"/></a>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse, .navbar-collapse2">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse mob-main-menu">
                        <div class='responsive-bg'> 
                            <ul class="nav navbar-nav navbar-right">
                                <div class="row visible-xs">
                                    <div class="col-xs-12 mob-style">
                                        <div class="col-xs-6 main">
                                            <div class="row">
                                                <p class='label-main-menu'>Menu</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 close-x">
                                            <div class="row">
                                                <button class="btn-close-menu pull-right"  data-toggle="collapse" data-target=".navbar-collapse, .navbar-collapse2">
                                                    <span class="glyphicon glyphicon-remove"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>  

                                <li id="menu-item-5928" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5928" data-toggle="modal" data-target="#myModal_10010020">
                                    <a id="nav-ing-one" data-toggle="collapse" data-target=".navbar-collapse, .navbar-collapse2">Ingresar</a>
                                </li>  
                                <li id="menu-item-5927" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5927" data-toggle="modal" data-target="#myModal_10010030">
                                    <a id="nav-ing-two" data-toggle="collapse" data-target=".navbar-collapse, .navbar-collapse2">Registrarse</a>
                                </li> 
                   
                                
                            </ul>
                        </div>
                        <div class="nav-cover visible-xs">


                        </div>


                    </div><!-- /.navbar-collapse -->
                </div>
            </div> 

    <div class="wrapper">
        <nav class="navbar" role="navigation">
         <!--   <div class="utility-navigation">
                <div class="container">
                    <div class="navbar-collapse2">              
                        <?php
                        // Call utility header
                        //$args = array('menu' => 'Utility Navigation', 'menu_class' => 'nav navbar-nav navbar-right', 'container' => false);
                        //wp_nav_menu($args);
                        ?>  
                        <ul id="menu-utility-navigation" class="nav navbar-nav navbar-right">
                            <li id="menu-item-5927" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5927" data-toggle="modal" data-target="#myModal_10010020"><a>Sign Up</a></li>
                            <li id="menu-item-5928" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5928" data-toggle="modal" data-target="#myModal_10010020"><a>Login</a></li>
                        </ul>
                    </div>
                </div>  
            </div>  -->

            <!-- Modal Login-->
            <div class="modal fade" id="myModal_10010020" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg login" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body text-center">
                            <div class="thumbnail">
                                <div class="caption">
                                    <h1>Ingrese a su Cuenta</h1>
                                    <fieldset>
                                        <label for="user">Usuario:</label>
                                        <input type="text" placeholder="Ingrese su usuario" class="form-control bg-gray no-border" id="user" name="user" value="" tabindex="6">
                                        <label class="pwd" for="pwd">Contraseña:</label>
                                        <input type="password" placeholder="Ingrese su Contraseña" class="form-control bg-gray no-border" id="pwd" name="pwd" value="" tabindex="7">
                                        <a id="sub-ingresar" class="btn btn-getquote" data-dismiss="modal" title="Ingresar" tabindex="6">Ingresar</a>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 

            <!-- Modal Sign up-->
            <div class="modal fade sing_in" id="myModal_10010030" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg login" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body text-center">
                            <div class="thumbnail">
                                <div class="caption">
                                    <h1>Nueva Cuenta</h1>
                                    <fieldset>
                                        <label for="user">Nombre Completo:</label>
                                        <input type="text" placeholder="Ingrese su nombre" class="form-control bg-gray no-border" id="user" name="user" value="" tabindex="8">
                                        <label class="pwd no-border" for="user">Correo Electronico:</label>
                                        <input type="text" placeholder="Ingrese su correo" class="form-control bg-gray no-border" id="user" name="user" value="" tabindex="9">
                                        <label class="pwd no-border" for="user">Telefono:</label>
                                        <input type="text" placeholder="Ingrese su telefono" class="form-control bg-gray no-border" id="user" name="user" value="" tabindex="10">
                                        <label class="pwd no-border" for="pwd">Contraseña:</label>
                                        <input type="password" placeholder="Ingrese su contraseña" class="form-control bg-gray no-border" id="pwd" name="pwd" value="" tabindex="11">
                                        <a id="sub-ingresar" class="btn btn-getquote" data-dismiss="modal" title="Registrar" tabindex="12">Registrar</a>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 

             
        </nav>

       
