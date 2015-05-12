<?php
/**
*
*/
class RemoteConnect
{

  public function connectToServer($serverName = null)
  {
    if($serverName == null)
    {
      throw new Exception("¡Este no es un nombre de servidor!");
    }
    $fp = fsockopen($serverName, 80, $errno, $errstr, 30);
    return ($fp) ? true : false;
  }
  public function returnSampleObject()
  {
    return $this;
  }
}

/**
*
*/
class Mensaje
{
    public function Mostrar($msg = null)
    {
        if($msg == null)
        {
            throw new Exception("Error Processing Request", 1);
        }

        return $msg;
    }
}
?>