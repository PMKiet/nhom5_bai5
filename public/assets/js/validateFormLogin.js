let usernameInput = document.querySelector('#username');
let passwordInput = document.querySelector('#password');
let msgError = document.querySelector('.msg-error');

function showError(element) {
    element.style.borderColor = 'red';
    msgError.classList.remove('hidden');
    element.focus();
}

function hiddenError(element) {
    element.style.borderColor = '';
    msgError.classList.add('hidden');
}

// ===================================================================================================================
usernameInput.addEventListener('input',() => {
    if(usernameInput.value.trim()) {
        hiddenError(usernameInput)
    }
})

passwordInput.addEventListener('input',() => {
    if(passwordInput.value.trim()) {
        hiddenError(passwordInput)
    }
})
// ===================================================================================================================

document.querySelector('.btn').addEventListener('click', function(e) {
    e.preventDefault();
    

    if(!passwordInput.value.trim() || !usernameInput.value.trim()) {
        showError(passwordInput);
        showError(usernameInput);
        msgError.innerText = "Tài khoản và mật khẩu không được để trống";
    } else if(!usernameInput.value.trim()) {
        showError(usernameInput);
        msgError.innerText = "Tài khoản và mật khẩu không được để trống";
    }else if(!passwordInput.value.trim()) {
        showError(passwordInput);
        msgError.innerText = "Tài khoản và mật khẩu không được để trống";

    }

    if(usernameInput.value.trim() && passwordInput.value.trim()) {
        if(usernameInput.value.trim().length  > 50 && passwordInput.value.trim().length  > 50 ) { 
            showError(usernameInput);
            showError(passwordInput);
            msgError.innerText = "Tài khoản và mật khẩu tối đa 50 ký tự";
        } else if(usernameInput.value.trim().length  > 50) {
            showError(usernameInput);
            msgError.innerText = "Tài khoản và mật khẩu tối đa 50 ký tự";
        } else if(passwordInput.value.trim().length  > 50) {
            showError(passwordInput);
            msgError.innerText = "Tài khoản và mật khẩu tối đa 50 ký tự";
        } else { 
            document.querySelector('.form').submit();
        }
    }

});