<?php

/**
 * A site wide configuration class
 *
 * @since 1.0.0
 * @author Paul Furnival
 */

class config {

    /**
     * The fullname (including path) of the inifile that contais the confuguration settings.
     * read using PHPs https://www.php.net/manual/en/function.parse-ini-file.php    
     * @since 1.0.0
     */
    private $iniFilei = "";

    /**
     * An array holding all the config items
     * @since 1.0.0
     */
    private $configs = array();


    construcor($inifile) {
        try {
            parse_ini_file($inifile,TRUE);
        } catch(Exception $e) {
            die( $e->getMessage() );
        }
    }

}


?>
