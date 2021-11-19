{include file="templates/header.tpl"}
<div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            {foreach from=$artists item=$artist}
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="{$artist->artist_img}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{$artist->artist}</h5>
                            <p class="card-text">Genero: {$artist->genre}</p>
                            <a href='artist/{$artist->id_artist}'> Ver en detalle</a>{if $admin}<a href='deleteArtist/{$artist->id_artist}'> Eliminar</a>{/if}
                        </div>
                    </div>
                </div>
            {/foreach}
        </div>
</div>
{include file="templates/footer.tpl"}