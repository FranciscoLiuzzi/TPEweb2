{literal}
    <div class="panel panel-info" id="commentSection">
        <div class="panel-heading">
            Comment panel
        </div>
        <div class="panel-body">
            <hr>
            <ul class="media-list" >
                <li v-for="comment in comments" class="media">
                    <div class="media-body">
                        <strong class="text-success">  {{comment.user}} | Score: {{comment.score}} <i class="fas fa-star"></i><button type="button" class="btn btn-danger" v-on:click="deleteComment(comment.id)" :value="comment.id" v-if='role == "admin"'>Borrar</button></strong>
                        <p>
                            {{comment.comment}} 
                        </p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
{/literal}