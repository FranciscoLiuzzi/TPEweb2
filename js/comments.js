"use strict";
let id_album = document.querySelector("#info_album").dataset.id;
let role = document.querySelector("#info_album").dataset.role;
const URL_API = "/proyectos/tpe/api/comment/" + id_album;

let app = new Vue({
    el: "#commentSection",
    data: {
        role: role,
        comments: [],
    },
    methods:{
        deleteComment: async function (id){
            try{
                let response = await fetch(`/proyectos/tpe/api/comment/${id}`,{
                    method:"DELETE",
                });
                if (response.ok){
                    console.log("Borrado");
                    getComments();
                }
            }catch(error){
                alert(error)
            }
        }
    }
});

let btn = document.querySelector("#sendComment");
btn.addEventListener("click", postComment);

async function getComments(){
    try{
        let response = await fetch(URL_API);
        if(response.ok){
            let comments = await response.json();
            app.comments = comments;
            
            console.log(comments);
        }
    } catch(e){
        console.log(e);
    }
}

getComments();

async function postComment(){
    event.preventDefault();
    let id_user = document.querySelector("#info_album").dataset.user;
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
            getComments();
        }else{
            alert("aia");
        }
    }catch(error){
        alert(error)
    }
}
console.log(URL_API);