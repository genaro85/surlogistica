<?php
// This example header.inc.php is intended to be modfied for your application.
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
        <ul class="menu">
            <li class="top"><a href="<?php _p(__VIRTUAL_DIRECTORY__ . __FORM_EMPLEADO__) ?>/index.php" target="_self" class="top_link"><span>Inicio</span></a>
            <li class="top"><a href="<?php _p(__VIRTUAL_DIRECTORY__ . __FORM_EMPLEADO__) ?>/Licencia.php" target="_self" class="top_link"><span>C.N.P.</span></a>
                <ul class="sub">
                    <li><a href="<?php _p(__VIRTUAL_DIRECTORY__ . __FORM_EMPLEADO__) ?>/licencia_list.php" target="_self">C.N.P.</a></li>
                    <li><a href="<?php _p(__VIRTUAL_DIRECTORY__ . __FORM_EMPLEADO__) ?>/codigo_pago_list.php" target="_self">Código Pago</a></li>
                    <li><a href="<?php _p(__VIRTUAL_DIRECTORY__ . __FORM_EMPLEADO__) ?>/tipo_de_pago_list.php" target="_self">Tipo de Pago</a></li>
                    <li><a href="<?php _p(__VIRTUAL_DIRECTORY__ . __FORM_EMPLEADO__) ?>/empresa_list.php" target="_self">Empresa</a></li>
                    <li><a href="<?php _p(__VIRTUAL_DIRECTORY__ . __FORM_EMPLEADO__) ?>/fase_licencia_list.php" target="_self">Fase C.N.P.</a></li>
                    <li><a href="<?php _p(__VIRTUAL_DIRECTORY__ . __FORM_EMPLEADO__) ?>/vigencia_documento_list.php" target="_self">Vigencia de Documentos</a></li>
                    <li><a href="<?php _p(__VIRTUAL_DIRECTORY__ . __FORM_EMPLEADO__) ?>/importacion_list.php" target="_self">Importación</a></li>
                    <li><a href="<?php _p(__VIRTUAL_DIRECTORY__ . __FORM_EMPLEADO__) ?>/producto_list.php" target="_self">Producto</a></li>
                    <li><a href="<?php _p(__VIRTUAL_DIRECTORY__ . __FORM_EMPLEADO__) ?>/lista_producto_list.php" target="_self">Lista de Producto</a></li>
                </ul>
            </li>
            <li class="top"><a href="<?php _p(__VIRTUAL_DIRECTORY__ . __FORM_EMPLEADO__) ?>/Proveedor.php" target="_self" class="top_link"><span>Proveedores</span></a>
                <ul class="sub">
                    <li><a href="<?php _p(__VIRTUAL_DIRECTORY__ . __FORM_EMPLEADO__) ?>/transporte_list.php" target="_self">Transporte</a></li>
                    <li><a href="<?php _p(__VIRTUAL_DIRECTORY__ . __FORM_EMPLEADO__) ?>/proveedor_list.php" target="_self">Proveedor</a></li>
                    <li><a href="<?php _p(__VIRTUAL_DIRECTORY__ . __FORM_EMPLEADO__) ?>/pais_list.php" target="_self">País</a></li>
                </ul>
            </li>
            <li class="top"><a href="<?php _p(__SUBDIRECTORY__) ?>/includes/logout.php" target="_self" class="top_link"><span>Salir</span></a></li>
        </ul>
        <div id="content">

