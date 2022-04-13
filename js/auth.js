
//получение аватарки с поля
let avatar = false;

$('#avatar').change(function (e){
    avatar = e.target.files[0];
});

//регистрация
$('#reg-btn').click(function (e){
    e.preventDefault();
    $(`input`).removeClass('error');

    let msgReg = document.getElementById('msgReg');
    let login = document.getElementById('loginReg').value,
        password = document.getElementById('passwordReg').value,
        passwordConfirm = document.getElementById('passwordConfirm').value,
        email = document.getElementById('email').value,
        lastName = document.getElementById('lastname').value,
        name = document.getElementById('name').value,
        patronymic = document.getElementById('patronymic').value;


    let formData = new FormData();
    formData.append('login' , login);
    formData.append('password' , password);
    formData.append('passwordConfirm' , passwordConfirm);
    formData.append('email' , email);
    formData.append('lastName' , lastName);
    formData.append('name' , name);
    formData.append('patronymic' , patronymic);
    formData.append('avatar' , avatar);


    $.ajax({
        url: '/auth/register',
        type: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        success (data){
        if(data.status){
            document.location.href = 'home';
        }
        if(data.type === 1){
            data.fields.forEach(function (field){
                $(`input[id = "${field}"]`).addClass('error');
                msgReg.textContent = data.massage;
            });
        }
        if(data.type === 2){
                $(`input[id = "passwordConfirm"]`).addClass('error');
                $(`input[id = "passwordReg"]`).addClass('error');
                msgReg.textContent = data.massage;
        }
            if(data.type === 3){
                $(`input[id = "loginReg"]`).addClass('error');
                msgReg.textContent = data.massage;
            }
        }
    });
});


//Вход
$('#btn-entrance').click(function (e){
   e.preventDefault();
   $(`input`).removeClass('error');
   let msg = document.getElementById('msg-login');
   let login = document.getElementById('loginEnt').value;
   let password = document.getElementById('passwordEnt').value;
   $.ajax({
       url: '/auth/login',
       type: 'POST',
       dataType: 'json',
       data: {login:login,password:password},
       success(data) {
            if(data.status){
                document.location.href = '/home';
            }
           if(data.type === 1){
           $('#loginEnt').addClass('error');
            msg.textContent = data.massage;
           }
           if(data.type === 2){
               $('#passwordEnt').addClass('error');
               msg.textContent = data.massage;
           }
       }
   });
});