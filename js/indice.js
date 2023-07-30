let toggleIcon = document.querySelector(".form .field i");
let pswrdField = document.querySelector(".form .field #pass[type='password']");
function fret () { 
  
    if (pswrdField.type ==="password") {
        toggleIcon.classList.add('active');
        pswrdField.type = "text";

    } else {
       
        toggleIcon.classList.remove('active');
        pswrdField.type = "password";
    }
}
toggleIcon.addEventListener('click', fret);
