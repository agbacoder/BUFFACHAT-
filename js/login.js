let loginForm = document.querySelector(".login form");
let continueButton = loginForm.querySelector(".button input");
let errorTxt = loginForm.querySelector(".error-text");

loginForm.onsubmit = (e)=>{
    e.preventDefault();
}

continueButton.onclick = ()=>{
    let xha = new XMLHttpRequest();
    xha.open("POST", "php/login_operation.php", true);
    xha.onload = ()=>{
      if(xha.readyState === XMLHttpRequest.DONE){
          if(xha.status === 200){
              let data = xha.response;
              if(data === "success"){
                location.href = "users.php";
              }else{
                errorTxt.style.display = "block";
                errorTxt.textContent = data;
              }
          } else {
            console.log('wrong connection');
          }
      }
    }
    let loginData = new FormData(loginForm);
    xha.send(loginData);
}