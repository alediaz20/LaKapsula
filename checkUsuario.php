<?php 
    /*
        Controla los datos del fomulario usuario, dependiendo si se edita o si se crea un nuevo usuario se aplican otros controles extras.
        Create: 2021-11-10
        Author: Gonza
    */
    require_once(DIR_model."usuarios".DS."class.usuarios_backend.inc.php");
    require_once(DIR_model."personas".DS."class.personas.inc.php");

    $this_file = substr(__FILE__, strlen(DIR_BASE))." ";
    $post = cleanarray($_POST);

    $response = array("error"=>false,"create"=>false);

    // Variables array 
    $msgerr = array();
    $emails= array();
    $phones = array();
    $direct = array();

    // Control de persona
    $people = false;
    $rol = null;

    // Almacenamientos
    $data_persona= array();
    $data_usuario= array();

    // Control de la accion a realizar (*)
    $action = $post['action']?? null;
    if (!SecureInt($action)){
        if ($action != "new"){
            cLogging::Write($this_file."El formulario carece del identificador 'action'");
            emitJson("Falta información importaate para la ejecución del fomulario.");
            return;
        }
    }
    
    // Control de nombre (*)
    $name = $post['inpName']?? null;
    if (empty($name)){ $msgerr['inpName']="Es necesario un Nombre";}
    else
    {cCheckInput::NomApe($name,"inpName","Es necesario un Nombre");}

    // Control de apellido (*)
    $lastname = $post['inpLastName']?? null;
    if (empty($lastname)){ $msgerr['inpLastName']="Es necesario un Apellido";}
    else
    {cCheckInput::NomApe($lastname,"inpLastName","Es necesario un Apellido");}

    // Control de nombre de usuario (*)
    $userName = substr($post['inpUserName'],0,32);
    $usuario = new cUsuarios;
    if (empty($userName)){ 
        $msgerr['inpUserName']="Es necesario un Nombre de Usuario";
    }else{
        if ($result_user = $usuario->GetByUsername($userName)){
            if ($result_user->id != $action){ $msgerr['inpUserName']="Nombre de Usuario ocupado";}
        }
    }

    // Control de Password (*)
    $password = $post['inpPassword']?? null;
    if (empty($password)){ $msgerr['inpPassword']="Es necesario una contraseña";}
    else
    {cCheckInput::Password($password,"inpPassword","Es necesario una contraseña válida");}

    // Control del cargo (*)
    $cargo = $post['inpCargo']?? null;
    if (!array_key_exists($cargo,VALID_TYPE_PERMISOS)){ $msgerr['inpCargo']="El cargo no es válido";}

    // Controles sobre el DNI
    if (!empty($post['inpDni'])){
        require_once(DIR_model."personas".DS."class.personas.inc.php");
        $persona = new cPersonas();

        $dni = secureInt($post['inpDni']?? null);
        if (empty($dni))
        {
            $msgerr['inpDni']="D.N.I no válido";
        }
        else if ($persona->GetByNumDoc($dni))
        {
            $people = true;
            if ($usuario->GetByPersonaId($persona->id)){
                $msgerr['inpDni']="D.N.I ya se encuentra en uso";
            }
        }
        $data_persona["nro_doc"] = $dni;
    }

    // Control sobre la edad
    if (!empty($post['DateNacimiento'])){
        $edad = cFechas::CalcularEdad($post['DateNacimiento']);
        if ($edad < 18){
            $msgerr['DateNacimiento'] = "Es necesario tener como mínimo 18 años.";
        }else if ($edad > 80){
            $msgerr['DateNacimiento'] = "Es necesario tener como máximo 60 años.";
        }

        $data_persona["fecha_nac"] = $post['DateNacimiento'];
    }

    // Control sobre la region de vivienda.
    if (!empty($post['hidden_prov'])){
        require_once(DIR_model."geo".DS."class.geo.inc.php");
        $geo = new cGeo();

        $prov = SecureInt($post['hidden_prov']);
        
        $city = SecureInt($post['hidden_city']?? null);
        if (empty($city)){$msgerr['inpCity']="Es necesario una ciudad";}
        else
        {if (!$geo->getCiudadByProvincia($city,$prov)){$msgerr['inpCity']="La ciudad no concuerda con la provincia";}}
        
        $cod = SecureInt($post['inpCod']?? null);
        if (empty($cod)){$msgerr['inpCod']="Es necesario una ciudad";}
        else
        {if (!$geo->getCiudadCp($city,$cod)){$msgerr['inpCod']="El código no concuerda con la ciudad";}}

        $data_persona["region"] = json_encode(array("ciudad"=>$city,"codigo"=>$cod,"provincia"=>$prov));
    }

    // 
    if (!empty($post['inpRoles'])){
        $rol = SecureInt($post['inpRoles']);
    }

    // Control sobre los emails
    if (CanUseArray(json_decode($post['emails']))){
        $emails = armarData(json_decode($post['emails']),"EMAIL");
    }

    // Control sobre los telefonos
    if (CanUseArray(json_decode($post['phones']))){
        $phones = armarData(json_decode($post['phones']),"TEL");
    }

    // Control sobre los telefonos
    if (CanUseArray(json_decode($post['addresses']))){
        $direct = armarData(json_decode($post['addresses']),"DIREC");
    }

    // Emito el mensjae de error
    $msgerr = array_merge(cCheckInput::$msgerr,$msgerr);
    if (CanUseArray($msgerr)) {
        EmitJSON($msgerr);
        return;
    }

    // Carga de datos
    $data_persona['negocio_id'] = $objeto_usuario->negocio_id;
    $data_persona['tipo_doc'] = "DNI";
    $data_persona['sys_usuario_id'] = $objeto_usuario->id;
    $data_persona['nombre'] = $name;
    $data_persona['apellido'] = $lastname;

    // Carga de Usuario
    $data_usuario['username']= $userName;
    $data_usuario['password']= $password;
    $data_usuario['nivel']= $cargo;
    $data_usuario['rol_id']= $rol;

    // Carga de contacto
    $contacto = array(
        "email"=> $emails,
        "phone"=> $phones,
        "direccion"=> $direct
    );
    
    $all_array= array(
        "persona"=> $data_persona,
        "user"=> $data_usuario,
        "contacto"=> $contacto
    );

    if (!$usuario->CreateUsuario($all_array,$people)){
        cLogging::Write($this_file."No fue posible crear al usuario");
        $response["error"]="No fue posible dar de alta el usuario.";
        ResponseOk($response);
        return;
    }
    
    $response["create"]="La persona fue creada efectivamente.";
    ResponseOk($response);


    /**
     * 
     * 
     * 
     * 
     */
    function armarData($array,$type){
        $result = array();
        foreach ($array AS $value){
            $default = null;
            if (!empty($value->default)){$default = true;}
                $result[] = array(
                    'value' => $value->value,
                    'default' => $default
                );
        }
        return $result;
    }
?>