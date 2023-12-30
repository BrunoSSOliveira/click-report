<?php

class WPCLI_Click_Report {

    public function __construct() {
        // Registra o comando WP-CLI
        if ( defined( 'WP_CLI' ) && WP_CLI ) {
            WP_CLI::add_command( 'click-report', array( $this, 'click_report_command' ) );
        }
    }

    // Callback para o comando click-report
    public function click_report_command( $args, $assoc_args ) {
        global $wpdb;

        // Define o número de itens no relatório
        $items_to_display = isset( $assoc_args['items'] ) ? intval( $assoc_args['items'] ) : 10;

        // Consulta para obter os registros
        $table_name = $wpdb->prefix . 'cclick_config';
        $click = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $table_name ORDER BY id DESC LIMIT %d", $items_to_display ) );

        if ( ! empty( $click ) ) {
            // Exibe os registros formatados
            foreach ( $click as $entry ) {
                WP_CLI::line( sprintf( 'ID: %d | IP: %s | Data: %s | Hora: %s', $entry->id, $entry->ip, $entry->date, $entry->time ) );
            }
        } else {
            WP_CLI::line( 'Nenhum registro encontrado.' );
        }
    }
}

// Inicia o plugin
new WPCLI_Click_Report();
