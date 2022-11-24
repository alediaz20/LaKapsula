<?php
/*
	Clase para tratamiento de contraseñas.
	Created: 2021-09-08
	Author: Gaston

*/
	//Password_Type La robustez de la contraseña a generar/checkear, los valores posibles son FUERTE,MEDIA,DEBIL
	const PASSWD_TYPES = ["FUERTE","MEDIA","DEBIL"];
    class cPasswords{
        const normalPassword = ["[A-Z]+","[a-z]+","[0-9]+","[º\\ª!|\"@·#\$~%€&¬\/\(\)=\?'`´¡¿^\[\]\+\*ñÑ¨{}<>;,:\.\-_]"];
        const simplifiedPassword = ["[A-Za-z]+","[0-9]+","[º\\ª!|\"@·#\$~%€&¬\/\(\)=\?'`´¡¿^\[\]\+\*ñÑ¨{}<>;,:\.\-_]*"];
		const alfaChars = "abcdefghijklmnopqrstuvwxyz";
		const numberChars = "0123456789";
		const symbols = "º\\ª!|\"@·#\$~%€&¬\/\(\)=\?'`´¡¿^\[\]\+\*ñÑ¨{}<>;,:\.\-_";
		private static string $reserve_file = DIR_includes."reservoreo.txt";//El archivo que se utilizara para obtener las palabras a modo de reservoreo
		public static string $password_type = "FUERTE";//Que tipo de contraseñas se generaran con el metodo GenPass

		/**
		* Summary. Generar una contraseña que valide con CheckStrongPassword.
		* @param bool $symbols Incluir símbolos.
		* @return string
		*/
		public static function GenPass(int $length = 8, bool $symbols = true):string {
			$pool = self::alfaChars. strtoupper(self::alfaChars) . self::numberChars . (($symbols)?self::symbols:null);
			self::$password_type = ($symbols == true)? "FUERTE":"MEDIA";
			do {
				$result = substr(str_shuffle($pool), 0, $length+1);
			} while(!self::CheckPasswordType($result));
			return $result;
		}

		/**
		 * Summary. Genera una contraseña utilizando un reservoreo de palabras de un archivo
		 * @param int $minLen Indicá el tamaño mínimo de la contraseña a generar
		 * @param int $maxLen Indicá el tamaño máximo de la contraseña a generar
		 * @param null|string $robustez Indicá la robustez de la contraseña a generar
		 * @return string
		 */
		public static function GenCustomPassword(?int $minLen = 8,?int $maxLen = 32, ?string $robustez = "MEDIA"){
			$type = strtoupper($robustez);
			$type = (in_array($type,PASSWD_TYPES))? $type:"MEDIA";
			self::$password_type = $type;
			$symbols = ($type == 'FUERTE');
			//Comrpobamos los tamaños que nos pasaron...
			if($minLen < 2){ $minLen = 2; }
			if(is_null(SecureInt($maxLen)) || $maxLen < $minLen){
				$maxLen = 32;//Valor por omisión
			}
			if($maxLen < $minLen){ $maxLen = $minLen+1; }
			if($maxLen > 128){
				$maxLen = 128;//Valor máximo
			}

			//Casos en los que derivamos a GenPass
			if(!ExisteArchivo(self::$reserve_file)){
				return self::GenPass($minLen,$symbols);
			}

			if(!$fileData = file_get_contents(self::$reserve_file) OR empty($fileData)){
				return self::GenPass($minLen,$symbols);
			}
			
			$words = explode(' ',$fileData);
			$words = array_map('trim',$words);
			if(!CanUseArray($words)){
				return self::GenPass($minLen,$symbols);
			}

			$maxTries = 200;//Máxima cantidad de intentos antes de darle el control a GenPass
			$max = count($words);
			$pool = self::numberChars . (($symbols)?self::symbols:null);
			$password = "";
			$tries = 0;
			$passwordSize = random_int($minLen,$maxLen);
			do{
				$password = "";
				$len = strlen($password);
				$size = random_int(1,5);//Cuantos simbolos de Pool se tomaran para realizar la contraseña
				do{
					$frag = substr(str_shuffle($pool), 0, $size);
					$ind = random_int(0,$max-1);
					$word = $words[$ind];
					if($robustez != 'DEBIL'){
						$rand = random_int(1,ceil((strlen($word)/2)));//Cantidad de letras que serán mayúsculas
						for($i = 0; $i < $rand; $i++){
							$index = random_int(0,strlen($word)-1);//Letra que fue elegida...
							$word[$index] = strtoupper($word[$index]);
						}
					}
					$password .= $word.$frag;
					$len = strlen($password);
					if($len > $passwordSize){
						$password = substr($password,0,$passwordSize);
						$len = strlen($password);
					}
				}while($len < $passwordSize);
				$tries++;
				if($tries == $maxTries){ return self::GenPass($minLen,$symbols); }
				if($len != $passwordSize){ continue; }
			}while(!self::CheckPasswordType($password));
			return $password;
		}

		/**
		 * Summary Comprueba la robustez de una contraseña utilizando la propiedad $password_type como referencia
		 * @param string $password La contraseña a comprobar
		 * @return bool
		 */
		public static function CheckPasswordType($password):bool{
			$type = strtoupper(self::$password_type);
			$type = (in_array($type,PASSWD_TYPES))? $type:"MEDIA";
			$checkArr = ["[".self::alfaChars."]+","[".self::numberChars."]+"];//Normal en contraseñas debiles
			if($type != 'DEBIL'){//Significa que la contraseña es MEDIA o FUERTE
				$checkArr[] = "[".strtoupper(self::alfaChars)."]+";//Mayúsculas
				//Si es MEDIA o DEBIL
				if(strlen($password) < 8){ return false; }
				if(strlen($password) > 128){ return false; }
			}

			if($type == 'FUERTE'){
				$checkArr[] = "[".self::symbols."]";//Simbolos
			}

			$result = true;
			foreach($checkArr as $value){
				if(!$result = preg_match("/".$value."/",$password)){ break;}
			}
			return ($result);
		}

        /**
         * Summary. Comprueba que una contraseña sea válida, de 8 a 128 caracteres con al menos, 1 letra minúscula, 1 mayúscula, 1 número y 1 caracter
         * @param string $password La contraseña a comprobar
         * @return bool $result True en caso de que pase la prueba o false en caso contrario
         */
        public static function CheckStrongPassword($password):?bool {
			if(empty($password)) { return false; }
			 //Entre 8 y 128 caracteres
            if (strlen($password) < 8) { return false; }
			if (strlen($password) > 128) { return false; }
			
            $result = true;
			foreach(self::normalPassword as $value){
				if (!preg_match("/".$value."/",$password)) { $result = false; break; }
			}
			return $result;
        }

        /**
         * Summary. Comprueba que una contraseña sea válida, de 8 a 128 caracteres con al menos, 1 letra (sin importar caps) y al menos un número (caracteres especiales opcionales)
         * @param string $password La contraseña a comprobar
         * @return bool $result True en caso de que pase la prueba o false en caso contrario
         */
        public static function CheckSimplifiedPassword($password):?bool {
			if(empty($password)) { return false; }
			 //Entre 8 y 128 caracteres
            if (strlen($password) < 8) { return false; }
			if (strlen($password) > 128) { return false; }
			
            $result = true;
			foreach(self::simplifiedPassword as $value){
				if (!preg_match("/".$value."/",$password)) { $result = false; break; }
			}
			return $result;
        }
    }