function confirmDelete(url) {
    var certainty = confirm("Are you sure you want to delete your account?");
    if (certainty == true) {
      var xhr = new XMLHttpRequest();
      xhr.open('GET', url, true);
      xhr.send();
      xhr.onreadystatechange = function(e) {
        if (xhr.status == 200) { //check for success
          window.location.href="/";
        }
      }
    }
    else {
      window.location.href="/myProfile";
    }
  }
  