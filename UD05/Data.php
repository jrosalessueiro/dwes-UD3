<?php
/*Modifique la clase Data en un fichero Data.php que se muestra a continuación para que no se pueda acceder a la propiedad del calendario desde fuera de la clase.
 Debes agregar los siguientes métodos estáticos y modificar el getData() existente:

getCalendar(): que devolverá el valor de esta propiedad.

getHora(): que devuelve la hora en el siguiente formato HH:MM:SS.

getDataHora(): que llamará a los métodos getData() y getHora() para mostrar tanto la fecha como la hora.

*/

class Data
{
    private static $calendario = "Calendario gregoriano";
    private static $ano;
    private static $mes;
    private static $dia;
    private static $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
    private static $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

    public static function getData(){
        
        self::$ano = date('Y'); //Nos da el año actual 
        self::$mes = date('m');
        self::$dia = date('d');
        return self::$dia . '/' . self::$mes . '/' . self::$ano;
    }

    public static function getCalendar(){
        return self::$calendario;
    }

    public static function getHora(){
        date_default_timezone_set('Europe/Madrid');
        $hoy= date('H:m:s');
        return $hoy;
    }

    public static function getDataHora(){
        self::getData(); // Llama a getData() para actualizar las propiedades
        
        echo 'Usamos el calendario: '.self::getCalendar().'.<br>';
        echo 'Hoy es '.self::$dias[date('w')].', '. self::$dia .' de '. self::$meses[date('n')-1] . ' del ' . self::$ano . ' y son las '. self::getHora() .'.<br>';
        
        
    }

}
