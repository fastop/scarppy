<?php
namespace Foobar;
 /** ****************************************************
 *  @file Urls.class.php 
 * 
 *  @brief Archivo principal para el manejo de las classe
 * 
 *  @author DRV
 *  @date Agosto 2022
 *
 *  @version 1.0 
 ****************************************************** */ 


class Urls {

          
         /** CONSTRUCTOR */
        function __construct() { //Inicializamos en el constructor...
        }

 
        /**
         *  Funciones (metodoss) para procesar lo de cada pagina
         */

        function escapadah_com(string $url){
            echo $url;
        }

        function soynomada_news(string $url){
            echo $url;
        }

        function mibolsillo_com(string $url){
            echo $url;
        }

        function excelsior_com_mx(string $url){
            echo $url;
        }

        function infobae_com(string $url){
            echo $url;
        }

        function latinus_us(string $url){
            echo $url;
        }

        function elfinanciero_com_mx(string $url){
            echo $url;
        }

        function eluniversal_com_mx(string $url){
            echo $url;
        }

        function dgcs_unam_mx(string $url){
            echo $url;
        }

        function cnnespanol_cnn_com(string $url){
            echo $url;
        }

        function vanguardia_com_mx(string $url){
            echo $url;
        }





        /**
         * 
         */

         /** 
          *   @brief Metodo para splitear url segun dominio
          *     
          *   @param url    URL completo del sitio (string)
          *   @return spell   Dominio (string)
          */
         function xplodeURL(string $url){

            $spell = parse_url($url, PHP_URL_HOST);

            if(is_null($spell))
                $spell = parse_url("https://".$url, PHP_URL_HOST);            
            

            return $spell;
         }


 


}