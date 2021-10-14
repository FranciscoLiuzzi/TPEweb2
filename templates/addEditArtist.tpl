{include file="templates/header.tpl"}
<div class="container">
    <h2>Agregar Artista</h2>
    <form action="createArtist" method="post">
        <div class="form-floating mb-3 mt-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="artist" name="artist">
            <label for="floatingInput">Artist</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingPassword" placeholder="genre" name="genre">
            <label for="floatingPassword">Genre</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="image" name="image">
            <label for="floatingInput">Image</label>
        </div>  
        <button type="submit" class="btn btn-outline-primary">Agregar</button>
    </form>
    <h2>Editar Artista</h2>
    <form action="editArtist" method="post">
        <select name="id_artist">
            {foreach from=$artists item=$artist}
                <option value={$artist->id_artist}>{$artist->artist}</option>
            {/foreach}
        </select>  
        <div class="form-floating mb-3 mt-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="artist" name="artist">
            <label for="floatingInput">Artist</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingPassword" placeholder="genre" name="genre">
            <label for="floatingPassword">Genre</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="image" name="artist_img">
            <label for="floatingInput">Image</label>
        </div>  
        <button type="submit" class="btn btn-outline-primary">Agregar</button>
    </form>
</div>
{include file="templates/footer.tpl"}