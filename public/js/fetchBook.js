let apiUrl = 'http://127.0.0.1:8000/api/user';
let booksLinks;
// fetch the api
async function GetBooks(){
    const response = await fetch(apiUrl);
    const books = await response.json();

    console.log(books.meta.current_page);
    ViewBooks(books);
    SetPaginator(books);
}

// Send the data to the view
function ViewBooks(books){
    // get the container
    let content = document.querySelector('#content');

    for (let i = 0; i < books.data.length;i++){
        // create element
        let wrapper = document.createElement('tr');
        let id = document.createElement('td');
        let name = document.createElement('td');
        let email = document.createElement('td');

        // add the data
        id.innerHTML = books.data[i].id;
        name.innerHTML = books.data[i].name;
        email.innerHTML = books.data[i].email;

        // append the element
        wrapper.append(id);
        wrapper.append(name);
        wrapper.append(email);

        // add it to the view
        content.append(wrapper);
    }
}

function SetPaginator(books){
    let paginator = document.querySelector('#current');
    paginator.innerHTML = books.meta.current_page;
    booksLinks = books.links;
}

function GoBefore(){
    let content = document.querySelector('#content');
    apiUrl = booksLinks.prev;

    if (apiUrl !== null){
        content.innerHTML = '';
        GetBooks();
    }
}

function GoAfter(){
    let content = document.querySelector('#content');
    apiUrl = booksLinks.next;

    if (apiUrl !== null) {
        content.innerHTML = '';
        GetBooks();
    }
}

// call the api
GetBooks()
.then(
    response => console.log('Success!')
).catch(
    error => {
        console.error(error)
});


