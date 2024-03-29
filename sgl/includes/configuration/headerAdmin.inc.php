<?php
// This example header.inc.php is intended to be modified for your application.
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=<?php _p(QApplication::$EncodingType); ?>" />
        <?php if (isset($strPageTitle)) { ?>
        <title><?php _p($strPageTitle); ?></title>
            <?php } ?>
        <style type="text/css">@import url("<?php _p(__VIRTUAL_DIRECTORY__ . __CSS_ASSETS__); ?>/styles.css");</style>
    </head>
    <body>
        <div id="header_container">
            <div id="header">
            </div>
        </div>
        <div id="banner_container">
            <div id="banner">
            </div>
        </div>
        <?php
        if (isset($_SESSION['User']))
        {?>
            <ul class="menu" style="padding: 0 0 0 16%;">
            <li class="top"><a href="<?php _p(__VIRTUAL_DIRECTORY__ . __FORM_ADMINISTRADOR__) ?>/index.php" target="_self" class="top_link"><span>Inicio</span></a>
            <li class="top"><a href="<?php _p(__VIRTUAL_DIRECTORY__ . __FORM_ADMINISTRADOR__) ?>/Licencia.php" target="_self" class="top_link"><span>C.N.P.</span></a>
                <ul class="sub">
                    <li><a href="<?php _p(__VIRTUAL_DIRECTORY__ . __FORM_ADMINISTRADOR__) ?>/licencia_list.php" target="_self">C.N.P.</a></li>
                    <li><a href="<?php _p(__VIRTUAL_DIRECTORY__ . __FORM_ADMINISTRADOR__) ?>/fase_licencia_list.php" target="_self">Fase C.N.P.</a></li>
                    <li><a href="<?php _p(__VIRTUAL_DIRECTORY__ . __FORM_ADMINISTRADOR__) ?>/vigencia_documento_list.php" target="_self">Vigencia de Documentos</a></li>
                    <li><a href="<?php _p(__VIRTUAL_DIRECTORY__ . __FORM_ADMINISTRADOR__) ?>/empresa_list.php" target="_self">Empresa</a></li>
                    <li><a href="<?php _p(__VIRTUAL_DIRECTORY__ . __FORM_ADMINISTRADOR__) ?>/lista_producto_list.php" target="_self">Lista de Producto</a></li>
                    <li><a href="<?php _p(__VIRTUAL_DIRECTORY__ . __FORM_ADMINISTRADOR__) ?>/producto_list.php" target="_self">Producto</a></li>
                    <!--<li><a href="<?php _p(__VIRTUAL_DIRECTORY__ . __FORM_ADMINISTRADOR__) ?>/codigo_pago_list.php" target="_self">Código Pago</a></li>
                    <li><a href="<?php _p(__VIRTUAL_DIRECTORY__ . __FORM_ADMINISTRADOR__) ?>/tipo_de_pago_list.php" target="_self">Tipo de Pago</a></li>-->
                    <li><a href="<?php _p(__VIRTUAL_DIRECTORY__ . __FORM_ADMINISTRADOR__) ?>/importacion_list.php" target="_self">Importacion</a></li>
                </ul>
            </li>
            <li class="top"><a href="<?php _p(__VIRTUAL_DIRECTORY__ . __FORM_ADMINISTRADOR__) ?>/Procesos.php" target="_self" class="top_link"><span>Procesos</span></a>
                <ul class="sub">
                    <li><a href="<?php _p(__VIRTUAL_DIRECTORY__ . __FORM_ADMINISTRADOR__) ?>/proceso_list.php" target="_self">Proceso</a></li>
                    <li><a href="<?php _p(__VIRTUAL_DIRECTORY__ . __FORM_ADMINISTRADOR__) ?>/fase_list.php" target="_self">Fase</a></li>
                    <li><a href="<?php _p(__VIRTUAL_DIRECTORY__ . __FORM_ADMINISTRADOR__) ?>/documento_list.php" target="_self">Documento</a></li>
                    <li><a href="<?php _p(__VIRTUAL_DIRECTORY__ . __FORM_ADMINISTRADOR__) ?>/documentos_fase_list.php" target="_self">Documento de Gestión</a></li>
                </ul>
            </li>
            <li class="top"><a href="<?php _p(__VIRTUAL_DIRECTORY__ . __FORM_ADMINISTRADOR__) ?>/Proveedor.php" target="_self" class="top_link"><span>Proveedores</span></a>
                <ul class="sub">
                    <li><a href="<?php _p(__VIRTUAL_DIRECTORY__ . __FORM_ADMINISTRADOR__) ?>/pais_list.php" target="_self">País</a></li>
                    <li><a href="<?php _p(__VIRTUAL_DIRECTORY__ . __FORM_ADMINISTRADOR__) ?>/proveedor_list.php" target="_self">Proveedor</a></li>
                    <li><a href="<?php _p(__VIRTUAL_DIRECTORY__ . __FORM_ADMINISTRADOR__) ?>/transporte_list.php" target="_self">Transporte</a></li>
                </ul>
            </li>
            <li class="top"><a href="<?php _p(__VIRTUAL_DIRECTORY__ . __FORM_ADMINISTRADOR__) ?>/Administrador.php" target="_self" class="top_link"><span>Administrador</span></a>
                <ul class="sub">
                    <li><a href="<?php _p(__VIRTUAL_DIRECTORY__ . __FORM_ADMINISTRADOR__) ?>/administrador_list.php" target="_self">Administrador</a></li>
                    <li><a href="<?php _p(__VIRTUAL_DIRECTORY__ . __FORM_ADMINISTRADOR__) ?>/empleado_list.php" target="_self">Empleado</a></li>
                    <li><a href="<?php _p(__VIRTUAL_DIRECTORY__ . __FORM_ADMINISTRADOR__) ?>/responsable_list.php" target="_self">Responsable</a></li>
                </ul>
            </li>
            <li class="top"><a href="<?php _p(__VIRTUAL_DIRECTORY__ . __FORM_ADMINISTRADOR__) ?>/Seguimientos.php" target="_self" class="top_link"><span>Seguimiento</span></a>
                <ul class="sub">
                    <li><a href="<?php _p(__VIRTUAL_DIRECTORY__ . __FORM_ADMINISTRADOR__) ?>/seg_licencia_list.php" target="_self">Seguimiento C.N.P.</a></li>
                    <li><a href="<?php _p(__VIRTUAL_DIRECTORY__ . __FORM_ADMINISTRADOR__) ?>/seg_empresa.php" target="_self">Seguimiento Empresas</a></li>
                    <li><a href="<?php _p(__VIRTUAL_DIRECTORY__ . __FORM_ADMINISTRADOR__) ?>/seg_producto.php" target="_self">Seguimiento Productos</a></li>
                    <li><a href="<?php _p(__VIRTUAL_DIRECTORY__ . __FORM_ADMINISTRADOR__) ?>/seg_pais_list.php" target="_self">Seguimiento Paises</a></li>
                </ul>
            </li>
            <li class="top"><a href="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__) ?>/includes/logout.php" target="_self" class="top_link"><span>Salir</span></a></li>
        </ul>

        <?php
        }else{ QApplication::Redirect(__SUBDIRECTORY__. '/includes/login.php');}
        ?>
        <div id="content">

