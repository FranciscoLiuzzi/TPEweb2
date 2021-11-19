{include file="templates/header.tpl"}
<div class="container">
    
    <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Recomendacion Semanal</h1>
        <p class="lead text-muted">Esta semana la recomendacion es la discografia completa de Kanye West</p>
        
      </div>
    </div>
  </section>
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            {foreach from=$recomendacion item=$album}
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="{$album->album_img}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{$album->album_name} - {$album->artist}</h5>
                            <p class="card-text">publicado el anio {$album->anio} con una calificacion de {$album->score}</p>
                            <a href='album/{$album->id_album}'> Ver en detalle</a>
                        </div>
                    </div>
                </div>
            {/foreach}
        </div>
    </div>
</div>
{include file="templates/footer.tpl"}
