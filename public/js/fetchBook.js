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
        let email = document.createElement('td');

        // add the data
        id.innerHTML = books.data[i].id;
        name.innerHTML = books.data[i].name;
        email.innerHTML = books.data[i].email;

        // append the element
        wrapper.append(id);