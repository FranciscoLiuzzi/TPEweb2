{include file="templates/header.tpl"}
<div class="container">
    <h2>Insertar Album</h2>
    <form action="createAlbum" method="post">
        <div class="form-floating mb-3 mt-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="album" name="album">
            <label for="floatingInput">Album</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingPassword" placeholder="image" name="image">
            <label for="floatingPassword">Image</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="floatingInput" placeholder="anio" name="anio">
            <label for="floatingInput">Anio</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control" id="floatingPassword" placeholder="score" name="score">
            <label for="floatingPassword">Score</label>
        </div>
        <select name="artist">
            {foreach from=$artists item=$artist}
                <option value={$artist->id_artist}>{$artist->artist}</option>
            {/foreach}
        </select>  
        <button type="submit" class="btn btn-outline-primary">Agregar</button>
    </form>
    <h2>Editar Album</h2>
    <form action="editAlbum" method="post">
        <select name="id_album">
            {foreach from=$albums item=$album}
                <option value={$album->id_album}>{$album->album_name}</option>
            {/foreach}
        </select> 
        <div class="form-floating mb-3 mt-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="album" name="album">
            <label for="floatingInput">Album</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingPassword" placeholder="image" name="image">
            <label for="floatingPassword">Image</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="floatingInput" placeholder="anio" name="anio">
            <label for="floatingInput">Anio</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control" id="floatingPassword" placeholder="score" name="score">
            <label for="floatingPassword">Score</label>
        </div>
        <select name="artist">
            {foreach from=$artists item=$artist}
                <option value={$artist->id_artist}>{$artist->artist}</option>
            {/foreach}
        </select>  
        <button type="submit" class="btn btn-outline-primary">Agregar</button>
    </form>
</div>
{include file="templates/footer.tpl"}