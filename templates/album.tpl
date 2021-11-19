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
    </div> GRACIAS BROOOOOOOO
    <div class="panel">
    <form class="panel-body" data-id = {$album->id_album}>
        <textarea class="form-control" rows="2" placeholder="What are you thinking?"></textarea>
        
        <div class="mar-top clearfix">
            <button class="btn btn-sm btn-primary pull-right" type="submit"><i class="fa fa-pencil fa-fw"></i> Share</button>
        </div>
    </form>
</div>
</div>
{foreach from=$user item=$info}
    <p>{$info}</p>
{/foreach}
{include file="templates/footer.tpl"}