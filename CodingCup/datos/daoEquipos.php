<?php
//importa la clase conexión y el modelo para usarlos
require_once 'Conexion.php'; 
require_once '../modelos/usuario.php'; 

class DAOEquipo
{
    
	private $conexion; 
    
    /**
     * Permite obtener la conexión a la BD
     */
    private function conectar(){
        try{
			$this->conexion = conexion::conectar(); 
		}
		catch(Exception $e)
		{
			die($e->getMessage()); /*Si la conexion no se establece se cortara el flujo enviando un mensaje con el error*/
		}
    }
  
	
     /**
    * Metodo que obtiene todos los usuarios de la base de datos y los
    * retorna como una lista de objetos  
    */
	public function obtenerTodos()
	{
		try
		{
            $this->conectar();
            
			$lista = array();
            /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
			$sentenciaSQL = $this->conexion->prepare("SELECT id,nombreEquipo,estudiante1,estudiante2,estudiante3 FROM equipos");
			
            //Se ejecuta la sentencia sql, retorna un cursor con todos los elementos
			$sentenciaSQL->execute();
            
            //$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
            $resultado = $sentenciaSQL->fetchAll(PDO::FETCH_OBJ);
            /*Podemos obtener un cursor (resultado con todos los renglones como 
            un arreglo de arreglos asociativos o un arreglo de objetos*/
            /*Se recorre el cursor para obtener los datos*/
			foreach($resultado as $fila)
			{
				$obj = new equipos();
                $obj->id = $fila->id;
	            $obj->nombreEquipo = $fila->nombreEquipo;
	            $obj->estudiante1 = $fila->estudiante1;
                $obj->estudiante2 = $fila->estudiante2;
	            $obj->estudiante3 = $fila->estudiante3;
	     
				//Agrega el objeto al arreglo, no necesitamos indicar un índice, usa el próximo válido
                $lista[] = $obj;
			}
            
			return $lista;
		}
		catch(PDOException $e){
			return null;
		}finally{
            Conexion::desconectar();
        }
	}

       
    /**
     * Elimina el usuario con el id indicado como parámetro
     */
	public function eliminar($id)
	{
		try 
		{
			$this->conectar();
            
            $sentenciaSQL = $this->conexion->prepare("DELETE FROM equipos WHERE id = ?");			          
			$resultado=$sentenciaSQL->execute(array($id));
			return $resultado;
		} catch (PDOException $e) 
		{
			//Si quieres acceder expecíficamente al numero de error
			//se puede consultar la propiedad errorInfo
			return false;	
		}finally{
            Conexion::desconectar();
        }

		
        
	}

   /**
     * Función para editar al usuario de acuerdo al objeto recibido como parámetro
     */
	public function editar(Usuario $obj)
	{
		try 
		{
			$sql = "UPDATE equipos
                    SET
                    nombreEquipo = ?,
                    estudiante1 = ?,
                    estudiante2 = ?,
                    estudiante3 = ?,
                    WHERE id = ?;";

            $this->conectar();
            
            $sentenciaSQL = $this->conexion->prepare($sql);
			$sentenciaSQL->execute(
				array($obj->nombreEquipo,
                      $obj->estudiante1,
                      $obj->estudiante2,
					  $obj->estudiante3,
					  $obj->id)
					);
            return true;
		} catch (PDOException $e){
			//Si quieres acceder expecíficamente al numero de error
			//se puede consultar la propiedad errorInfo
			return false;
		}finally{
            Conexion::desconectar();
        }
	}
	
	/**
     * Agrega un nuevo usuario de acuerdo al objeto recibido como parámetro
     */
    public function agregar(Usuario $obj)
	{
        $clave=0;
		try 
		{
            $sql = "INSERT INTO equipos
                ( nombreEquipo = ?,
                    estudiante1 = ?,
                    estudiante2 = ?,
                    estudiante3 = ?,
                password)
                VALUES
                (:nombreEquipo,
                :estudiante1,
                :estudiante2,
                :estudiante3);";
                
            $this->conectar();
            $this->conexion->prepare($sql)
                 ->execute(array(
                ':nombreEquipo'=>$obj->nombreEquipo,
                 ':estudiante1'=>$obj->estudiante1,
                 ':estudiante2'=>$obj->estudiante2,
                 ':estudiante2'=>$obj->estudiante2));
                 
            $clave=$this->conexion->lastInsertId();
            return $clave;
		} catch (Exception $e){
			return $clave;
		}finally{
            
            /*En caso de que se necesite manejar transacciones, 
			no deberá desconectarse mientras la transacción deba 
			persistir*/
            
            Conexion::desconectar();
        }
	}
}