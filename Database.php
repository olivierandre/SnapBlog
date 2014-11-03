<?php

    class Database {

        protected static $database ; // Contient la connexion à la db

        public static function connectDatabase() {

            if(!empty(self::$database )) {
                return self::$database;
            }

            try {
                //connexion à la base avec la classe PDO et le dsn
                self::$database  = new PDO('mysql:host='.Config::DBHOST.';dbname='.Config::DBNAME, Config::DBUSER, Config::DBPASS, array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", //on s'assure de communiquer en utf8
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //on récupère nos données en array associatif par défaut
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING         //on affiche les erreurs. À modifier en prod. 
                ));

                return self::$database;

            } catch (PDOException $e) { //attrape les éventuelles erreurs de connexion
                echo 'Erreur de connexion : ' . $e->getMessage();
            }

        }

        public static function closeDatabase() {
            self::$database = null;
        }
    }
    
   
	