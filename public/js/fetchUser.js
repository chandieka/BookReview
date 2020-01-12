let apiUrl = 'http://127.0.0.1:8000/api/user';
let userLinks;

// fetch the api
async function Getuser(){

    const response = await fetch(apiUrl);
    const user = await response.json();

    console.log(user.meta.current_page);
    Viewuser(user);
    SetPaginator(user);
}

// Send the data to the view
function Viewuser(user){
    // get the container
    let content = document.querySelector('#content');

    for (let i = 0; i < user.data.length;i++){
        // create element
        let wrapper = document.createElement('tr');
        let id = document.createElement('td');
        let name = document.createElement('td');
        let email = document.createElement('td');

        // add the data
        id.innerHTML = user.data[i].id;
        name.innerHTML = user.data[i].name;
        email.innerHTML = user.data[i].email;

        // append the element
        wrapper.append(id);
        wrapper.append(name);
        wrapper.append(email);

        // add it to the view
        content.append(wrapper);
    }
}

function SetPaginator(user){
    let paginator = document.querySelector('#current');
    paginator.innerHTML = user.meta.current_page;
    userLinks = user.links;
}

function GoBefore(){
    let content = document.querySelector('#content');
    apiUrl = userLinks.prev;

    if (apiUrl !== null){
        content.innerHTML = '';
        Getuser();
    }
}

function GoAfter(){
    let content = document.querySelector('#content');
    apiUrl = userLinks.next;

    if (apiUrl !== null) {
        content.innerHTML = '';
        Getuser();
    }
}

// call the api
Getuser()
.then(
    response => {
        console.log('Success!');
}).catch(
    error => {
        console.error(error);
});


