function getStats(id) {
    var body = tinymce.get(id).getBody(), text = tinymce.trim(body.innerText || body.textContent);

    return {
        chars: text.length,
        words: text.split(/[\w\u2019\'-]+/).length
    };
}


function submitCheck(){
    if (getStats('description').words >+ 200){
        alert('The maximum words allowed is 200!')
        return false;
    }
    else if (getStats('description').words > 20){
        alert('You need to provide at least 20 words!')
        return false;
    }
    return true;
}
