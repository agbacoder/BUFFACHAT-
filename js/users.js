const searchBar = document.querySelector(".search input"),
searchIcon = document.querySelector(".search button"),
usersList = document.querySelector(".users .users-list");

function searcher() {
    searchIcon.classList.toggle('active');
    searchBar.classList.toggle("active");
    searchBar.focus();
    searchBar.value = "";
   
   
}

searchIcon.addEventListener ('click', searcher);

 searchBar.onkeyup = ()=> {
    let searchval = searchBar.value;
     if (searchval != ""){
        searchBar.classList.add("active");
     }
     else {
        searchBar.classList.remove("active");
     }
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/search.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              usersList.innerHTML = data;
                
             
          }
      }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + searchval);
    
 }

 setInterval (()=> {
    let xhr = new XMLHttpRequest();
    xhr.open("GET","php/users_operation.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              if (!searchBar.classList.contains("active")){
                usersList.innerHTML = data;
              }
             
          }
      }
    }
    xhr.send();
}, 500);   




