{include file="templates/header.tpl"}
<div class="container">
    
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            {foreach from=$albums item=$album}
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="{$album->album_img}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{$album->album_name} - {$album->artist}</h5>
                            <p class="card-text">publicado el anio {$album->anio} con una calificacion de {$album->score}</p>
                            <a href='{BASE_URL}album/{$album->id_album}'> Ver en detalle</a>{if $admin}<a href='deleteAlbum/{$album->id_album}'> Eliminar</a>{/if}
                            
                        </div>
                    </div>
                </div>
            {/foreach}
    </div>
</div>
{include file="templates/footer.tpl"}