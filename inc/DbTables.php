<?php

namespace Inc;

defined('ABSPATH') || wp_die(__('You can\'t access this page', 'sheetstowptable'));

final class DbTables {
    /**
     * @var mixed
     */
    private $connection;
    /**
     * @var mixed
     */
    private $sql;
    public function __construct() {
        $this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        global $wpdb;
        $wpdb->hide_errors();
        $collate = $wpdb->get_charset_collate();

        /* This will create this pluign main table */
        $table=$wpdb->prefix. 'simple_form_tables';

        $this->sql = "CREATE TABLE ".$table." (
            `id` INT(255) NOT NULL AUTO_INCREMENT,
            `form_name` VARCHAR(255) DEFAULT NULL,
            `form_fields` LONGTEXT,
            time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB ".$collate."";

        $this->create_tables();
        
    }

    public function create_tables() {
        $this->connection->query($this->sql);
    }
}