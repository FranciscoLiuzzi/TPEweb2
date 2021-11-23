{include file="templates/header.tpl"}
<div class="container bg-warning.bg-gradient">
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
            <img src="{$album->album_img}" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">{$album->album_name} - {$album->artist}</h5>
                <p class="card-text">publicado el anio {$album->anio} con una calificacion de {$album->score}</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>{if $admin}<a href='../deleteAlbum/{$album->id_album}'> Eliminar</a>{/if}
            </div>
            </div>
        </div>
    </div> 
    <div class="panel">
        <form class="panel-body" data-user={$user->id} data-id={$album->id_album} id="formComment">
            <textarea class="form-control" rows="2" placeholder="Haz un comentario" name="comment"></textarea>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="score">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <div class="mar-top clearfix">
                <button class="btn btn-sm btn-primary pull-right" id="sendComment"><i class="fa fa-pencil fa-fw"></i>Compartir!</button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript" src="../js/comments.js"></script>

{include file="templates/footer.tpl"}