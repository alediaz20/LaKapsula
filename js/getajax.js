<?php
/*
	Aparentemente este archivo está obsoleto.
*/
?>
var cachedDataRequest = null;
var cachedFuncRequest = null;

function getAjax(objeto, funcion){
	var objAjax = new objetoAjax("POST");
	objAjax.Finished = function (a,b,c,d) { 
		if (a != 401) {
			if (typeof funcion == 'function') {
				funcion(a,b,c,d);
			}
			return;
		}
		Require_login(objeto, funcion);
	}
	var cadena = '&cifid=<?php echo @$objeto_contenido->cifid; ?>';
	
	if (objeto.modulo) {
		cadena = cadena+'&modulo='+objeto.modulo;
	};
	if (objeto.archivo) {
		cadena = cadena+'&archivo='+objeto.archivo;
	};
	if (objeto.accion) {
		cadena = cadena+'&accion='+objeto.accion;
	};
	if (objeto.content) {
		cadena = cadena+'&content='+objeto.content;
	};
	if (objeto.elid) {
		cadena = cadena+'&id='+objeto.elid;
	};
	if (objeto.extraparams) {
		if (typeof objeto.extraparams == 'object') {
			for (var x in objeto.extraparams) {
				cadena = cadena+'&'+x+'='+objeto.extraparams[x];
			}
		} else {
			cadena = cadena+'&'+objeto.extraparams;
		}
	};
	objAjax.Get("<?php echo URL_ajax; ?>", cadena);
} //function getAjax


function Require_login(DataRequest, FunctionRequest) {
	cachedDataRequest = DataRequest;
	cachedFuncRequest = FunctionRequest;
	var forceLogin = new objetoAjax('GET');
	forceLogin.Finished = function (a,b,c,d) {
		var body = document.getElementsByTagName('body')[0];
		body.style.position = 'relative';
		body.style.zIndex = '0';
		setTimeout( function () {
		var dummy = document.createElement('DIV');
		dummy.setAttribute('id','forcedLoginForm_vail');
		dummy.innerHTML = c;
		body.appendChild(dummy);
		dummy.querySelectorAll('script').forEach((t,i)=> {
			eval(t.innerText);
		});
		dummy.style.zIndex = 10000;
		},100);
	}
	forceLogin.Get("ajax/?archivo=login_form");
}


function CheckForcedLogin() {
	var result = true;
	var frm = document.getElementById('frmForcedLogin');
	var msg = document.getElementById('forcedLoginMsg');
	msg.classList.add('d-none');
	var ele = frm.username;
	if (ele.value.trim().length == 0) {
		result = $(ele).msgerr('Indica tu nombre de usuario');
	}
	
	ele = frm.password;
	if (ele.value.trim().length == 0) {
		result = $(ele).msgerr('Escribe la contraseña');
	}
	if (result) {
		getAjax({
			archivo: 'checkLogin'
		}, function (a,b,c,d) {
			if (a == 200) {
				result = parseJson(c);
				if (typeof result.ok != 'undefined') {
					dummy = document.getElementById('forcedLoginForm_vail');
					document.getElementsByTagName('body')[0].removeChild(dummy);
					getAjax(cachedDataRequest, cachedFuncRequest);
					cachedDataRequest = null;
					cachedFuncRequest = null;
				} else {
					msg.innerHTML = result.generr;
					msg.classList.remove('d-none');
				}
			}
		});
	}
}