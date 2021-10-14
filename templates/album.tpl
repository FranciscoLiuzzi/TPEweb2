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
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>{if $logged}<a href='deleteAlbum/{$album->id_album}'> Eliminar</a>{/if}
            </div>
            </div>
        </div>
    </div>
</div>

{include file="templates/footer.tpl"}