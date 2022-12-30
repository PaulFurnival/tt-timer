<?php

/**
 * Control logic and utility functions for the entire site.
 */
class Site {
    /* the full name and path to the inifile */
    private $inifile = "";

    /* a config item */
    private $config = array();


    /**
     * initiate the object and read config file
     */
    public function __construct($inifile=""){
        session_start();
        
        /*
         * let's try to prevent any Cross Site Request Forgery attempts 
         */
        if ( ! array_key_exists('CSRF_TOKEN',$_SESSION)) {
            $_SESSION['CSRF_TOKEN'] = uniqid();
        }

        if ($inifile) {
            $this->inifile = $inifile;
        } else {
            $this->inifile = (dirname(__FILE__) . '/../inifiles/site.ini'); 

        }

        try {
            $this->config = parse_ini_file($this->inifile, true);
        } catch (exception $e) {
            print "<h1>" . $e->getMessage() . "</h1>";   
        }

    }




    public function info() {
        print "<h1>Config:</h1><pre>";
        print_r($this->config);
        print "</pre>";
        print "<h1>Session:</h1><pre>";
        print_r($_SESSION);
        print "</pre>";
    }






    function printHeader($title = "TT-Timer"){
        require_once(dirname(__FILE__) . '/header.inc.php');
    }




    function printFooter($title = "TT-Timer"){
        require_once(dirname(__FILE__) . '/footer.inc.php');
    }



    /**
     * Returns a given configuration setting as retrieved from the config file (default = site,ini)
     * The settings are stored in the site object "$config" array in the format
     * Array
     *    (
     *        [database] => Array
     *            (
     *                [username] => dbuser
     *                [password] => dbpassword
     *                [database] => dbname
     *            )
     *    )
     * 
     * where:
     *     [database] is the section     and
     *     [username] is the key
     * 
     * 
     * @param $section the section to return
     * @param $key the key to return.  If no key is given, the entire sectio is returned as an array
     * @since 1.0.0
     * @author paul furnival
     */
    function getConfig($section, $key=""){
        // let's check the requested section exists
        if ( key_exists( $section,$this->config) ) {
            // are we looking for a particular key?
            if ($key === "") {
                // if not, return the secion as an array
                return $this->config[$section];        
            } else {
                // we are looking for key so check it exists
                if ( key_exists( $key,$this->config[$section] ) ) {
                    return $this->config[$section][$key];
                } else {
                    // if the key doesn't exist, return null
                    return null;
                }
            }
        } else {
            return null;
        }
    }




}


$site = new Site();


?>