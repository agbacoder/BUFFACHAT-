
const form = document.querySelector(".chatapp .typing-area");
const inputField = document.getElementById("input-field");
const sendBotton = document.querySelector(".chatapp .typing-area button");
const chatBox = document.querySelector(".chatapp .chat-box");



form.onsubmit = (e)=>{
    e.preventDefault();
}


inputField.onkeyup = ()=>{
    if(inputField.value != ""){
        sendBotton.classList.add("active");
    }else{
        sendBotton.classList.remove("active");
    }
}

chatBox.onmousedown = ()=>{
    chatBox.classList.add("active");
}

chatBox.onmouseleave = ()=>{
    chatBox.classList.remove("active");
}


function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
  }

function sendButton () {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/chat_operation.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            inputField.value = "";
            scrollToBottom();
          } 
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}
sendBotton.addEventListener('click', sendButton);
   
    

setInterval (()=> {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/recieve_chat.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
                chatBox.innerHTML = data;
                if(!chatBox.classList.contains("active")){
                    scrollToBottom();
                  }
              }
             
          }
      
    }
    let formData = new FormData(form);
    xhr.send(formData);
}, 500);


  

