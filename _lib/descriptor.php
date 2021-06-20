<?php
class descriptor
{
	// Variable arreglo del descriptor
	var $tags;

	// Constructor de la clase Descriptor
	function descriptor($ruta)
	{
	   $this->cargaArchivo($ruta);
	}

	// Funcion que carga los valores de los tags
	function cargaArchivo($ruta)
	{
	   $identificador = fopen($ruta, 'r');
	   while ($linea= fgets($identificador,1024))
	   {
		  $palabras=  explode("=", $linea);
		  $this->agregarItem(trim($palabras[0]), trim($palabras[1]));
	   }
	}

	// Función que agrega un nuevo item al arreglo de tags.
	function agregarItem($campo, $valor)
	{
	   $this->tags[$campo] = $valor;
	}

	// Funcion que retorna un arreglo con los valores de las variables locales.
	function getTags($tags=array())
	{
	   return $this->tags;
	}

	// Funcion que retorna el template utilizado.
	function getTemplate()
	{
  		return $this->tags['template'];
	}

	// Funcion que retorna el template de menu.
	function getMenu()
	{
  		return $this->tags['menu'];
	}

    // Funcion que retorna el template de menu.
	function getDownload()
	{
	   return $this->tags['download'];
	}
        
    function getExtension() {
        return $this->tags['extension'];
    }

}
?>