function changeColor(id) {
    // Get the checkbox
    let checkBox = document.getElementById(id);
    // Get the output text
    let label = document.getElementById(id + "lbl");
  
    // If the checkbox is checked, display the output text
    if (checkBox.checked == true){
        label.classList.add('checked');
    } else {
        label.classList.remove('checked');
    }
  } 