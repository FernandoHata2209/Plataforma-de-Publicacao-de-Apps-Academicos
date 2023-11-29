<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/style.css', 'resources/js/script.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Perfil Usuario - PPAA</title>
</head>

<body>
    <section style="background-color: #eee;">
        <div class="container py-5">
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <a href="{{ route('menu.menu') }}" class="btn btn-secondary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                    <path d="M6.5 12.5a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1h-7zM11 8a.5.5 0 0 0-.5-.5H1a.5.5 0 0 0 0 1h9.5a.5.5 0 0 0 .5-.5zM1 2a.5.5 0 0 0 .5.5H13a.5.5 0 0 0 0-1H1.5A.5.5 0 0 0 1 2z" />
                                </svg>
                                Voltar ao Menu
                            </a>
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3">{{ $usuarios->nome }}</h5>
                            <p class="text-muted mb-1">{{ $usuarios->curso }}</p>
                            <p class="text-muted mb-1">{{ $usuarios->cargo }}</p>
                            <p class="text-muted mb-4">Londrina / Parana</p>
                            @auth
                            @if (auth()->user()->id === $usuarios->id)
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editPerfilModal">
                                Editar Perfil
                            </button>
                            @endif
                            @endauth

                        </div>
                    </div>

                    @auth
                    @if (auth()->user()->id === $usuarios->id)
                    <div class="modal fade" id="editPerfilModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="loginModalLabel">Editar Perfil</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('perfil.atualizar', ['id' => $usuarios->id]) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Novo E-mail</label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{ $usuarios->email }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="password" class="form-label">Nova Senha</label>
                                            <input type="password" class="form-control" id="password" name="senha">
                                        </div>

                                        <div class="mb-3">
                                            <label for="password_confirmation" class="form-label">Confirme a Nova Senha</label>
                                            <input type="password" class="form-control" id="password_confirmation" name="senha_confirmation">
                                        </div>

                                        <div class="mb-3">
                                            <label for="profile_picture" class="form-label">Nova Foto de Perfil</label>
                                            <input type="file" class="form-control" id="profile_picture" name="imagem">
                                        </div>

                                        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endauth


                    <div class="card mb-4 mb-lg-0">
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush rounded-3">
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fas fa-globe fa-lg text-warning"></i>
                                    <p class="mb-0">https://mdbootstrap.com</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                                    <p class="mb-0">mdbootstrap</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                                    <p class="mb-0">@mdbootstrap</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                                    <p class="mb-0">mdbootstrap</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                                    <p class="mb-0">mdbootstrap</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Nome Completo</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $usuarios->nome }} {{ $usuarios->sobrenome }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $usuarios->email }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Telefone</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">(097) 234-5678</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Address</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">Bay Area, San Francisco, CA</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-4">
                            <div class="card mb-4 mb-md-0">
                                <div class="card-body">
                                    <div class="container-project-publish">
                                        @if (!$aplicativos->isEmpty())
                                        @foreach ($aplicativos as $aplicativo)
                                        @if ($aplicativo->status == 'Aprovado')
                                        <div class="content-publish">
                                            <div class="project-info">
                                                <div id="header-publish">
                                                    <p id="type-project-publish">
                                                        {{ $aplicativo->tipo }}
                                                    </p>
                                                    <p id="creator-publish">
                                                        {{ $aplicativo->criadorRelacao->nome }}
                                                        {{ $aplicativo->criadorRelacao->sobrenome }}
                                                    </p>
                                                    <p>{{ $aplicativo->created_at }}</p>
                                                </div>
                                                <div id="title-project-publish">
                                                    <h4 id="title-project">
                                                        {{ $aplicativo->nome_Aplicativo }}
                                                    </h4>
                                                </div>
                                                <div id="description-project-publish">
                                                    <p>{{ $aplicativo->descricao }}</p>
                                                </div>
                                                <div id="more-infos-project">
                                                    <a href="{{ $aplicativo->link_Projeto }}" target="_blank">
                                                        <button id="btn-link-project">Link do Projeto</button>
                                                    </a>
                                                    <a id="more-info-publish">
                                                        Mais informações
                                                    </a>

                                                    <div class="content-like-comment-project">
                                                        <form action="{{ route('aplicativos.curtir', ['id' => $aplicativo->id]) }}" method="post" id="form-like-project">
                                                            <div id="count-like-project">
                                                                <p id="text-like-project">
                                                                    {{ $aplicativo->qtd_Curtidas }}
                                                                </p>
                                                            </div>
                                                            @csrf
                                                            <button id="btn-like-project">
                                                                <svg xmlns="http://www.w3.org/2000/svg" id="like-project" width="32" height="32" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                                                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                                                </svg>
                                                            </button>
                                                        </form>
                                                        @if (auth()->check() && $aplicativo->criadorRelacao->id === auth()->user()->id)
                                                        <div id="perfil-edit-project"><button id="btn-edit-project" data-bs-toggle="modal" data-bs-target="#editPublishModal{{ $aplicativo->id }}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="Black" class="bi bi-gear" viewBox="0 0 16 16">
                                                                    <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                                                                    <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                        @endif
                                                        <div class="modal fade" id="editPublishModal{{ $aplicativo->id }}" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="loginModalLabel">Publicar</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="{{ route('perfil.projeto.atualizar', ['id' => $aplicativo->id]) }}" id="form-publish" method="POST" enctype="multipart/form-data">
                                                                            @csrf
                                                                            <div class="mb-3">
                                                                                <label for="loginEmail" class="form-label">Nome
                                                                                    Projeto</label>
                                                                                <input type="text" class="form-control" name="nome_Aplicativo" placeholder="{{ $aplicativo->nome_Aplicativo }}" value="{{ $aplicativo->nome_Aplicativo }}">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label class="form-label" for="textAreaExample">Descrição</label>
                                                                                <textarea class="form-control" id="textAreaExample1" rows="4" name="descricao">
                                                                                {{ $aplicativo->descricao }}
                                                                                </textarea>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="cargo">Selecione
                                                                                    o tema:</label>
                                                                                <select class="form-control" id="cargo" name="tipo" required>
                                                                                    <option value="" selected hidden>
                                                                                        {{ $aplicativo->tipo }}
                                                                                    </option>
                                                                                    <option value="Matematica">
                                                                                        Matemática</option>
                                                                                    <option value="Jogos">
                                                                                        Jogos</option>
                                                                                    <option value="Programacao">
                                                                                        Programação</option>
                                                                                    <option value="Redes">
                                                                                        Redes</option>
                                                                                    <option value="Outros">
                                                                                        Outros</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="loginEmail" class="form-label">Imagem /
                                                                                    Video do Projeto</label>
                                                                                <input type="file" class="form-control" name="media" id="image-project-publish">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="loginPassword" class="form-label">Link do
                                                                                    Projeto</label>
                                                                                <input type="text" class="form-control" name="link_Projeto" id="link-project-publish" placeholder="{{ $aplicativo->link_Projeto }}" value="{{ $aplicativo->link_Projeto }}">
                                                                            </div>
                                                                            <button type="submit" class="btn btn-primary">Publicar</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button id="btn-comment-project" data-bs-toggle="modal" data-bs-target="#commentModal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-chat" viewBox="0 0 16 16" id="comment-project">
                                                                <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z" />
                                                            </svg>
                                                        </button>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="project-image">
                                                @if (pathinfo($aplicativo->arquivo, PATHINFO_EXTENSION) == 'mp4')
                                                <!-- Se o arquivo é um vídeo -->
                                                <video width="320" height="240" controls>
                                                    <source src="{{ asset('mediaProject/' . $aplicativo->media) }}" type="video/mp4">
                                                    Seu navegador não suporta o elemento de vídeo.
                                                </video>
                                                @else
                                                <img src="{{ asset('mediaProject/' . $aplicativo->media) }}" alt="">
                                                @endif

                                            </div>
                                        </div>
                                        @endif

                                        @endforeach
                                        @else
                                        <div class="none-publish">
                                            <h3 id="title-none-publish">Nenhum aplicativo postado por este usuário.
                                            </h3>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>