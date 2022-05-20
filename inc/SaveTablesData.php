<?php

namespace Inc;

final class SaveTablesData {
    private $connection;
    private $sql;
    public function __construct() {
        global $wpdb;
        $wpdb->hide_errors();
        $collate = $wpdb->get_charset_collate();

        $table=$wpdb->prefix. 'simple_form_tables_values';

        $sql = "CREATE TABLE ".$table." (
            `id` INT(255) NOT NULL AUTO_INCREMENT,
            `form_fields` LONGTEXT,
            time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB ".$collate."";

        require_once ABSPATH."wp-admin/includes/upgrade.php";
        dbDelta($sql);
        
    }
}


// Old 

// namespace Inc;

// final class SaveTablesData {
//     private $connection;
//     private $sql;
//     public function __construct() {
//         $this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
//         global $wpdb;
//         $wpdb->hide_errors();
//         $collate = $wpdb->get_charset_collate();

//         /* This will create this pluign main table */
//         $table=$wpdb->prefix. 'simple_form_tables_values';

//         $this->sql = "CREATE TABLE ".$table." (
//             `id` INT(255) NOT NULL AUTO_INCREMENT,
//             `form_fields` LONGTEXT,
//             time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
//             PRIMARY KEY (`id`)
//         ) ENGINE=InnoDB ".$collate."";

//         $this->create_tables();
        
//     }

//     public function create_tables() {
//         $this->connection->query($this->sql);
//     }
// }