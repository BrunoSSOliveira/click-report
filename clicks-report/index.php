<?php
/*
Plugin Name: WP-CLI Click Report
Description: Adiciona um comando ao WP-CLI para imprimir um relatório de histórico de registros.
Version: 1.0
Author: Bruno Sousa (teste | Clube do Valor).
*/

if ( defined( 'WP_CLI' ) && WP_CLI ) {
    require_once( 'class-wpcli-click-report.php' );
}
