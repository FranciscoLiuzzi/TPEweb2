"use strict";

let id_album = document.querySelector("#formComment").dataset.id;
let id_user = document.querySelector("#formComment").dataset.user;
const URL_API = "/proyectos/tpe/api/comment/" + id_album;

let btn = document.querySelector("#sendComment");
btn.addEventListener("click", postComment);

async function postComment(){
    event.preventDefault();
    let formData = new FormData(formComment);
    let comment = formData.get("comment");
    let score = formData.get("score");
    
    let data = {
        id_user: id_user,
        id_album: id_album,
        comment: comment,
        score: score,
    }

    console.log(data);

    try{
        let response = await fetch(URL_API,{
            method: "POST",
            headers: {"Content-type": "application/json"},
            body: JSON.stringify(data),
        });
        if (response.ok){
            alert("pene");
        }else{
            alert("aia");
        }
    }catch(error){
        alert(error)
    }
}
console.log(id_album);
console.log(id_user);
console.log(URL_API);