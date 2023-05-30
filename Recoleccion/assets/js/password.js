function mostrarPassword(){
    var passwordInput = document.getElementById("passwordusuario");
    if(passwordInput.type === "password"){
        passwordInput.type = "text";
    }else{
        passwordInput.type = "password";
    }
}

function valiarPassword(){
    let password = document.querySelector('#passwordusuario').value;
    let message = document.querySelector('#messagepassword');
    let decimal = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
    if(password.test(decimal)){
        message.textContent = 'Password seguro!';
    }
    else{
        message.textContent = 'Password invalido. Debe contener: una mayúscula, minúscula, número y caracter especial.\n Y como mínimo 8 caracteres.';
    }
}