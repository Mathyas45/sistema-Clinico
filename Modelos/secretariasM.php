<?php
require_once "conexionBD.php";

class SecretariasM extends ConexionBD{
	//Ingreso secretarias
    static public function IngresarSecretariaM($tablaBD, $datosC){

        $pdo = ConexionBD::cBD()->prepare("SELECT usuario, clave, nombre, apellido, foto, rol, id FROM $tablaBD WHERE usuario = :usuario");

		$pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();
		$pdo = null;
    }
	//ver Perfil secretaria
	static public function VerPerfilSecretariaM($tablaBD, $id){

		$pdo = ConexionBD::cBD()->prepare("SELECT usuario, clave, nombre, apellido, foto, rol, id FROM $tablaBD WHERE id = :id");

		$pdo -> bindParam(":id", $id, PDO::PARAM_INT);

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();
		$pdo = null;
	}

	//Actualizar Perfil Secretaria
	Static public function ActualizarPerfilSecretariaM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET usuario = :usuario , clave = :clave, nombre= :nombre,
		apellido= :apellido, foto= :foto where id = :id");
		
		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
		$pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
		$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
		$pdo -> bindParam(":foto", $datosC["foto"], PDO::PARAM_STR);

		if($pdo -> execute()){

			return true; 

		}else{
			return false; 
		}

		$pdo ->close();
		$pdo = null;

	}
}