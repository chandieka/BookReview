document.getElementById('register').addEventListener('click', PostNewUser);

let apiUrl = 'http://127.0.0.1:8000/api/user';

async function PostNewUser() {
    let name = document.getElementById('name').value;
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    let rePassword = document.getElementById('rePassword').value;

    if (name !== '' && email !== '' && password !== '' && rePassword !== ''){
        if (password === rePassword){

            let newUser = {
                name : name,
                email : email,
                password : password,
            }

            const response = await fetch(apiUrl, {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type' : 'application/json',
                },
                body: JSON.stringify(newUser),
            })
            const data = await response.json();
        }
        else {
            // notify the user
        }
    }
    else {
        // notify the user
    }
}

function post() {
    PostNewUser()
    .then(
        response => {
            console.log(response);
    }).catch(
        error => {
            console.error(error);
    })
}
