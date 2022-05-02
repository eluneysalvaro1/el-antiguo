let d = document, 
    form = d.getElementById('cambiarUsuarioFormulario'), 
    submitButton = d.getElementById('submitButton'),
    inputPassNuevo = d.getElementById('usPassNuevo'),
    inputPass = d.getElementById('usPass'),
    inputEmail = d.getElementById('usMail'),
    invalido = d.getElementById('invalido')


form.addEventListener('submit', e => {
    e.preventDefault()
    invalido.innerHTML = ''
    let b1 = false, 
        b2 = false,
        b3 = false,
        e1 = '',
        e2 = '',
        e3 = ''
    

    
        if (cadenaVacia(inputPassNuevo)) {
            if (longitudCadena(inputPassNuevo)) {
                if (caracteresRaros(inputPassNuevo)) {
                    b1 = true
                }else{
                    e1 = ' -Password nueva con caracteres raros- '
                    b1 = false
                }
            }else{
                e1 = ' -Longitud de contraseña nueva corta- '
                b1 = false
            }
        }else{
            e1 = ' -Password nueva vacia- '
            b1 = false
        }

    if (cadenaVacia(inputPass)) {
        if (longitudCadena(inputPass)) {
            if (caracteresRaros(inputPass)) {
                b2 = true
            }else{
                e2 = ' -Password con caracteres raros- '
                b2 = false
            }
        }else{
            e2 = ' -Longitud de contraseña corta- '
            b2 = false
        }
    }else{
        e2 = ' -Password vacia- '
        b2 = false
    }

    if (cadenaVacia(inputEmail)) {
        if (longitudCadena(inputEmail)) {
            if (validarEmail(inputEmail)) {
                b3 = true
            }else{
                e3 = '-Email invalido'
                b3 = false
            }
        }else{
            e3 = '-Longitud email corta'
            b3 = false
        }
    }else{
        e3 = '-Campo email vacio'
        b3 = false
    }
    if (b1 && b2 && b3) {
        form.submit()
    }else{

        insertar = `<small style='color:red' >${e1}${e2}${e3}</small>`
        invalido.innerHTML = insertar
        console.log(insertar)
    }

} )


function validarEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email.value);
}

function cadenaVacia(input){
    let bandera = false 
    if (input.value !== '') {
        bandera = true
    }
    return bandera 
}

function longitudCadena(input){
    let bandera = false 
    if (input.value.length > 5) {
        bandera = true
    }
    return bandera
}

function tipoTexto(input){
    let bandera = false 
    if (isText(input.value)) {
        bandera = true
    }
    return bandera 
}

function tipoNumero(input){
    let bandera = false 
    if (!isNaN(input.value)) {
        bandera = true
    }
    return bandera 
}

function caracteresRaros(input){
    const re = /[^a-zA-Z0-9 ]/
    return !re.test(input.value)
}