<?php
    class Auth
    {
        public function __construct($config, $db)
        {
            $this->config = $config;
            $this->db = $db;
        }

        public function logout()
        {
            if ( !isset( $_SESSION[ 'user' ] ) ) 
            {
                header( "Location: https://revival.noit.eu/index/" );
            } 
            
            else if ( isset( $_SESSION[ 'user' ] ) != "" ) 
            {
                header( "Location: https://revival.noit.eu/login.php" );
            }

            unset( $_SESSION[ 'user' ] );
            
            session_unset();
            session_destroy();
            
            header( "Location: https://revival.noit.eu/index/" );
            exit;
        }
        
    }

?>