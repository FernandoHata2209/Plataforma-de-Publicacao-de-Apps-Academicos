<div class="container-user-perfil-infos">
    @auth
    <div id="edit-perfil-container">
        <a href="" id="edit-perfil-user">Editar Perfil</a>
    </div>
    <div class="perfil-img-user">
        <form action="uploadImg">
            <img src="{{ Vite::asset('resources/img/fotoLogin.webp') }}" alt="" id="user-img-perfil">
            <input type="file" name="image" id="inp-upload-img-user">
        </form>
    </div>
    <div class="perfil-infos-user">
        <form action="" id="form-user-perfil">
            <label for="">Nome do Usuario</label>
            <input type="text" name="nome" class="inp-perfil-user" disabled placeholder="{{ $usuario->nome }}">
            <label for="">Email do Usuario</label>
            <input type="text" name="email" class="inp-perfil-user" disabled placeholder="{{ $usuario->email }}">
            <label for="">Link Redes Sociais</label>
            <input type="text" name="rede_social" class='inp-perfil-user' disabled placeholder="link tal tal tal">
        </form>
    </div>
    <div class="container-show-project">
        <h3>{{}}</h3>
    </div>
    @endauth
</div>
