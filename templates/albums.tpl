{include file="templates/header.tpl"}
<div class="container">
    <nav aria-label="Page navigation example">
    <div class="justify-content-md-center">
        <ul class="pagination">
            {for $foo=1 to $pags}
                <li class="page-item"><a class="page-link" href="{BASE_URL}albums/{$foo}">{$foo}</a></li>
            {/for}
        </ul>
    </div>
    </nav>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        {foreach from=$albums item=$album}
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="{BASE_URL}{$album->album_img}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{$album->album_name} - {$album->artist}</h5>
                        <p class="card-text">publicado el anio {$album->anio} con una calificacion de {$album->score}</p>
                        <a href='{BASE_URL}album/{$album->id_album}'> Ver en detalle</a> {if $admin}<a href='{BASE_URL}deleteAlbum/{$album->id_album}'> Eliminar</a>{/if}
                    </div>
                </div>
            </div>
        {/foreach}
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            {for $foo=1 to $pags}
                <li class="page-item"><a class="page-link" href="{BASE_URL}albums/{$foo}">{$foo}</a></li>
            {/for}
            <span aria-hidden="true">&raquo;</span>
        </ul>
    </nav>
</div>
{include file="templates/footer.tpl"}