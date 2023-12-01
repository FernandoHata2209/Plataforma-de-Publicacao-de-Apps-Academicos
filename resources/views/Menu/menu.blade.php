<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menu - Plataforma de Publicação de Apps Acadêmicos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @vite(['resources/css/style.css', 'resources/js/script.js'])
</head>

<body>
    <div class="container-header-menu">
        <div class="container-menu">
            @auth
            <div id="header-settings-menu">
                <form action="{{ route('auth.logout') }}" method="POST" id="form-logout">
                    @csrf
                    <button id="btn-logout" class="door-button" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-door-closed door-icon" viewBox="0 0 16 16">
                            <path d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2zm1 13h8V2H4v13z" />
                            <path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0z" />
                        </svg>
                    </button>
                </form>
            </div>
            @endauth
            @guest
            <div class="section-infos">

            </div>
            @endguest
            <div id="logo">
                <a href="{{ route('menu.menu') }}">
                    <svg version="1.1" id="svg2" xml:space="preserve" width="440" height="98.666664" viewBox="0 0 440 98.666664" sodipodi:docname="logo-unifil.eps" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg">
                        <defs id="defs6" />
                        <sodipodi:namedview id="namedview4" pagecolor="#ffffff" bordercolor="#666666" borderopacity="1.0" inkscape:pageshadow="2" inkscape:pageopacity="0.0" inkscape:pagecheckerboard="0" />
                        <g id="g8" inkscape:groupmode="layer" inkscape:label="ink_ext_XXXXXX" transform="matrix(1.3333333,0,0,-1.3333333,0,98.666667)">
                            <g id="g10" transform="scale(0.1)">
                                <path d="m 330.41,357.852 1.762,2.828 1.84,3.379 1.777,3.402 1.652,3.508 1.571,3.492 1.418,3.648 1.34,3.68 1.121,3.789 1.097,3.742 0.934,3.879 0.707,3.852 0.66,3.91 0.531,4.039 0.321,3.988 0.25,4.114 0.089,4.988 -0.531,10.371 -1.66,11.09 -2.809,10.738 -3.789,10.301 -4.679,9.789 -5.66,9.223 -6.411,8.546 -7.121,7.922 -7.961,7.149 -8.609,6.429 -9.148,5.59 -9.793,4.703 -10.27,3.809 -10.809,2.77 -11.05,1.71 -9.93,0.52 H 32.7813 L 235.789,208.531 330.41,357.852" style="fill:#737779;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path12" />
                                <path d="m 104.539,575.359 0.281,-3.148 0.43,-3.051 0.48,-3.148 0.622,-3.082 0.726,-2.989 0.231,-1.05 h 421.242 l 0.07,-0.071 c 21.801,-0.621 39.32,-18.601 39.32,-40.531 v -2.148 l 0.598,-0.379 c 81.602,-8.043 156.481,-7.032 155.82,-98.434 h -0.121 c -5.66,6.961 -15.859,11.594 -27.359,11.594 h -1.117 L 588.441,429.52 C 522.551,429.84 449.75,337.891 387.359,238.23 l -40.531,-64.671 39.352,-62.118 2.531,-3.832 3.238,-4.32 3.563,-4.289 3.949,-4.0391 4.039,-3.7812 4.328,-3.5899 4.633,-3.2812 4.769,-2.9492 4.981,-2.668 5.16,-2.3906 5.449,-2.0625 5.45,-1.6875 5.691,-1.3203 5.859,-1 5.871,-0.6016 5.93,-0.1289 5.981,0.1289 5.91,0.6016 5.797,1 5.679,1.3203 5.453,1.6875 5.457,2.0625 5.204,2.3906 5,2.668 4.738,2.9492 4.59,3.2812 4.34,3.5899 4.109,3.8516 3.883,3.9687 3.558,4.289 3.121,4.09 2.579,3.883 268.402,423.386 1.359,2.313 1.528,2.641 1.441,2.789 1.281,2.687 1.25,2.852 1.098,2.879 1.051,2.972 0.941,2.918 0.859,2.961 0.692,3.129 0.656,3.039 0.481,3.192 0.339,3.171 0.301,3.129 0.231,3.192 0.019,3.968 -0.39,8.329 -1.348,8.793 -2.16,8.527 -3.082,8.199 -3.719,7.801 -4.43,7.262 -5.211,6.847 -5.648,6.293 -6.281,5.707 -6.801,5.09 -7.301,4.453 -7.789,3.758 -8.168,3.039 -8.582,2.172 -8.777,1.32 -7.942,0.43 H 192.078 l -8.047,-0.43 -8.761,-1.32 -8.61,-2.172 -8.211,-3.039 -7.687,-3.758 -7.352,-4.453 -6.851,-5.066 -6.27,-5.731 -5.66,-6.293 -5.141,-6.808 -4.429,-7.301 -3.758,-7.801 -2.973,-8.199 -2.258,-8.527 -1.34,-8.793 -0.39,-8.387 0.039,-3.91 0.16,-3.153" style="fill:#f08223;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path14" />
                                <path d="m 2924.42,70.7813 77.61,435.4377 H 2833.91 L 2756.32,70.7813 Z m -500.62,0 40.26,224.2577 209.7,-1.758 25.1,132.16 -210.98,1.758 20.13,104.77 h 263.76 l 26.06,136.332 H 2336.24 L 2226.26,70.7813 Z m -786.19,0 41.17,229.0977 c 5.32,28.73 14.26,49.93 26.93,63.672 12.69,13.648 29.57,20.558 50.71,20.558 16.4,0 29.3,-4.519 38.84,-13.531 9.56,-8.93 14.12,-20.68 13.64,-35.098 -0.13,-2.371 -0.34,-5.14 -0.61,-8.351 -0.46,-3.039 -1.3,-7.629 -2.65,-13.719 L 1763.33,70.7813 h 170.91 l 43.4,247.7187 c 1.96,10.52 3.47,20.68 4.63,30.172 1.08,9.629 1.9,18.418 2.15,26.308 1.39,42.149 -10.48,75.559 -35.97,100.411 -25.24,24.668 -60.33,37.089 -105.06,37.089 -28.73,0 -55.46,-5.5 -80.15,-16.691 -24.49,-11.219 -48.2,-28.609 -70.61,-52.027 l 9.68,56.547 H 1546.47 L 1466.84,70.7813 Z M 2240.32,506.23 H 2072.14 L 1994.59,70.7891 h 168.24 z M 3097.73,668.309 2996.61,70.7891 h 170.24 L 3267.22,668.309 Z M 1143.8,71.6914 c 173.5,0.6992 272.59,78.3396 303.06,242.7886 l 65.49,353.829 h -189.78 l -66.98,-346.438 c -7.78,-40.191 -19.39,-67.641 -35.03,-82.43 -30.07,-28.48 -101.75,-32.632 -131.67,-1.64 -13.35,13.711 -19.56,33.609 -18.6,59.738 0.16,4.731 0.36,9.289 0.98,13.723 0.57,4.449 1.44,8.847 2.42,13.457 l 66.09,343.59 H 948.469 L 887.539,359 c -2.711,-13.941 -4.5,-25.949 -5.68,-36.148 -1.14,-10.114 -1.898,-19.372 -2.218,-27.723 C 874.262,136.949 934.828,70.7695 1143.8,71.6914 Z M 2269.44,668.309 H 2101.36 L 2079.34,547.91 h 169.76 z m 761.76,0 H 2863.06 L 2841.04,547.91 h 169.85 l 20.31,120.399" style="fill:#737779;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path16" />
                            </g>
                        </g>
                    </svg>
                </a>
            </div>
            <div id="section-search-project">
                <button id="btn-search" data-bs-toggle="modal" data-bs-target="#searchModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-3">
                        <circle cx="10.5" cy="10.5" r="7.5"></circle>
                        <line x1="21" y1="21" x2="15.8" y2="15.8"></line>
                    </svg>
                </button>
                <div id="section-login-user">
                    @guest
                    <button id="login-account" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                    <button id="register-account" data-bs-toggle="modal" data-bs-target="#registerModal">Registrar-se</button>
                    @endguest
                    @auth
                    <a href="{{ route('user.perfil', ['id' => Auth::user()->id]) }}" id="user-perfil">
                        <button>Perfil</button>
                    </a>
                    <button id="publish-project" data-bs-toggle="modal" data-bs-target="#publishModal">Publicar</button>
                    @if (auth()->user()->cargo === 'Equipe do NPI')
                    <!-- Botão que só será exibido para a equipe do NPI -->
                    <button id="publish-project" data-bs-toggle="modal" data-bs-target="#aprovarModal">Aprovar</button>
                    @endif
                    @endauth
                </div>
            </div>
        </div>

        @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
        @endif

        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif

        {{-- Search Modal --}}

        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginModalLabel">Buscar Apps:</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('menu.pesquisa') }}" method="GET">
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control" name="q">
                            </div>
                            <div class="mb-3">
                                <label for="filtro_tipo">Filtrar por Temas:</label>
                                <select class="form-control" name="tipo">
                                    <option value="">Todos</option>
                                    <option value="Outros">Tecnologia</option>
                                    <option value="Matematica">Matemática</option>
                                    <option value="Jogos">Jogos</option>
                                    <option value="Programacao">Programação</option>
                                    <option value="Redes">Redes</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="filtro_curso">Filtrar por Curso:</label>
                                <select class="form-control" name="curso">
                                    <option value="">Todos</option>
                                    <option value="Ciencia da Computação">Ciência da Computação</option>
                                    <option value="Engenharia de Software">Engenharia de Software</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Buscar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        {{-- Login Modal --}}
        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginModalLabel">Login</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('auth.user') }}" method="POST">
                            @csrf
                            <div id="error-message" class="text-danger"></div>
                            <div class="mb-3">
                                <label for="loginEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="loginEmail" required name="email">
                            </div>
                            <div class="mb-3">
                                <label for="loginPassword" class="form-label">Senha</label>
                                <input type="password" class="form-control" id="loginPassword" required name="senha">
                            </div>
                            <div class="mb-3">
                                <button class="forgot-password" data-bs-toggle="modal" data-bs-target="#changePasswordModal">Esqueceu a senha?</button>
                            </div>
                            <button type="submit" class="btn btn-primary">Entrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Change Password --}}

        <div class="modal top fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
            <div class="modal-dialog" style="width: 500px;">
                <div class="modal-content text-center">
                    <div class="modal-header h5 text-black justify-content-center">
                        Alterar Senha
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-5">
                        <p class="py-2 ">
                            Digite seu email e sua nova senha!
                        </p>
                        <div class="form-outline">
                            <form action="{{ route('password.reset') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="loginEmail" class="form-label">Email</label>
                                    <input class="form-control" type="email" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="loginEmail" class="form-label">Nova senha</label>
                                    <input class="form-control" type="password" name="senha" required>
                                </div>
                                <div class="mb-3">
                                    <label for="loginEmail" class="form-label">Repita a nova Senha</label>
                                    <input class="form-control" type="password" name="senha_confirmation" required>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Redefinir Senha</button>
                                </div>
                            </form>
                        </div>
                        <div class="d-flex justify-content-between mt-4">
                            <button class="forgot-password" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                            <button class="forgot-password" data-bs-toggle="modal" data-bs-target="#registerModal">Registrar-se</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Register Modal --}}
        <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginModalLabel">Registrar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('login.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="loginEmail" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="loginEmail" required name="nome">
                            </div>
                            <div class="mb-3">
                                <label for="loginPassword" class="form-label">Sobrenome</label>
                                <input type="text" class="form-control" id="loginPassword" required name="sobrenome">
                            </div>
                            <div class="mb-3">
                                <label for="cargo">Selecione o cargo:</label>
                                <select class="form-control" id="cargo" name="cargo">
                                    <option value="" selected hidden>Cargo</option>
                                    <option value="Equipe do NPI">Equipe NPI</option>
                                    <option value="Aluno">Aluno</option>
                                    <option value="Professor">Professor</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="cargo">Selecione o Curso:</label>
                                <select class="form-control" id="cargo" name="curso">
                                    <option value="" selected hidden>Curso</option>
                                    <option value="Ciencia da Computação">Ciência da Computação</option>
                                    <option value="Engenharia de Software">Engenharia de Software</option>
                                    <option value="Nenhum">Nenhum</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="loginEmail" class="form-label">Email</label>
                                <input type="nome" class="form-control" id="loginEmail" required name="email">
                            </div>
                            <div class="mb-3">
                                <label for="loginPassword" class="form-label">Senha</label>
                                <input type="password" class="form-control" id="loginPassword" required name="senha">
                            </div>
                            <div class="mb-3">
                                <label for="loginPassword" class="form-label">Confirme a senha</label>
                                <input type="password" class="form-control" id="loginPassword" required name="senha_confirmation">
                            </div>
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif


        {{-- Publish Modal --}}
        <div class="modal fade" id="publishModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginModalLabel">Publicar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('publicar.store') }}" id="form-publish" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="loginEmail" class="form-label">Nome Projeto</label>
                                <input type="text" class="form-control" required name="nome_Aplicativo">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="textAreaExample">Descrição</label>
                                <textarea class="form-control" id="textAreaExample1" rows="4" name="descricao"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="cargo">Selecione o tipo de postagem:</label>
                                <select class="form-control" id="cargo" name="tipo">
                                    <option value="" selected hidden>Tipo da Postagem</option>
                                    <option value="Matematica">Matemática</option>
                                    <option value="Jogos">Jogos</option>
                                    <option value="Programacao">Programação</option>
                                    <option value="Redes">Redes</option>
                                    <option value="Outros">Outros</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="loginEmail" class="form-label">Imagem</label>
                                <input type="file" class="form-control" name="media" id="image-project-publish">
                            </div>
                            <div class="mb-3">
                                <label for="media" class="form-label">Upload de Arquivo</label>
                                <input type="file" class="form-control" id="media" name="arquivo" accept=".pdf, .doc, .docx, .zip">
                            </div>
                            <div class="mb-3">
                                <label for="loginPassword" class="form-label">Link do Projeto</label>
                                <input type="text" class="form-control" name="link_Projeto" id="link-project-publish" placeholder="Link">
                            </div>
                            <button type="submit" class="btn btn-primary">Publicar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Aprove Modal --}}

        <div class="modal fade" id="aprovarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Aprovação de Projetos</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-main-approve">
                            @if ($aplicativos->where('status', 'Em verificação')->isEmpty())
                            <div class="none-publish">
                                <h3 id="title-none-publish">Nenhum aplicativo postado no momento.</h3>
                            </div>
                            @else
                            @foreach ($aplicativos as $aplicativo)
                            @if ($aplicativo->status == 'Em verificação')
                            <div class="content-publish-approve">
                                <div class="project-info">
                                    <div id="header-publish">
                                        <p id="type-project-publish">
                                            {{ $aplicativo->tipo }}
                                        </p>
                                        <p id="creator-publish">
                                            {{ $aplicativo->criadorRelacao->nome }}
                                            {{ $aplicativo->criadorRelacao->sobrenome }}
                                        </p>
                                        @if($aplicativo->arquivo == null)
                                        @else
                                        <a href="{{ route('download.arquivo', ['id' => $aplicativo->id]) }}" download="">Download do Arquivo</a>
                                        @endif

                                        <p class="text-muted">{{ $aplicativo->criadorRelacao->curso }}</p>
                                        <p>{{ $aplicativo->created_at }}</p>
                                        <label for="">Link do Projeto: </label>
                                        <a href="{{ $aplicativo->link_Projeto }}" target="_blank">{{ $aplicativo->link_Projeto }}</a>
                                    </div>
                                    <div id="title-project-publish">
                                        <h4 id="title-project">
                                            {{ $aplicativo->nome_Aplicativo }}
                                        </h4>
                                    </div>
                                    <div id="description-project-publish">
                                        <p>{{ $aplicativo->descricao }}</p>
                                    </div>
                                    <div id="confirmation-btn-approve">
                                        <form action="{{ route('menu.aprovar', ['id' => $aplicativo->id]) }}" method="POST">
                                            @csrf
                                            <button type="submit" id="approve-project">Aprovar</button>
                                        </form>
                                        <form action="{{ route('menu.rejeitar', ['id' => $aplicativo->id]) }}" method="POST">
                                            @csrf
                                            <button type="submit" id="reject-project">Cancelar</button>
                                        </form>
                                        <div id="aprove-edit-project">
                                            <button id="edit-project" data-bs-toggle="modal" data-bs-target="#editAproveModal{{ $aplicativo->id }}">Editar</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="project-image">
                                    @if (pathinfo($aplicativo->arquivo, PATHINFO_EXTENSION) == 'mp4')
                                    <!-- Se o arquivo é um vídeo -->
                                    <video width="320" height="240" controls>
                                        <source src="{{ asset('imagesProject/' . $aplicativo->media) }}" type="video/mp4">
                                        Seu navegador não suporta o elemento de vídeo.
                                    </video>
                                    @else
                                    @if (pathinfo($aplicativo->arquivo, PATHINFO_EXTENSION) == 'pdf')
                                    <!-- Se o arquivo é um PDF -->
                                    <embed src="{{ asset('imagesProject/' . $aplicativo->media) }}" type="application/pdf" width="100%" height="600px" />
                                    @else
                                    <!-- Se o arquivo não é um vídeo nem um PDF, assumindo que seja uma imagem -->
                                    <img src="{{ asset('imagesProject/' . $aplicativo->media) }}" alt="">
                                    @endif
                                    @endif
                                </div>
                            </div>
                            @endif
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Edit Aprove --}}
        @foreach ($aplicativos as $aplicativo)
        <div class="modal fade" id="editAproveModal{{ $aplicativo->id }}" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginModalLabel">Publicar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('aprovacao.atualizar', ['id' => $aplicativo->id]) }}" id="form-publish" method="POST" enctype="multipart/form-data">
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
                                    o tipo de postagem:</label>
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
        @endforeach

        <div class="container-menu-project">
            <div class="section-type-project">
                <a href="{{ route('menu.menu') }}" id="type-project">Menu</a>
                <a href="{{ route('menu.filtrartipo', 'Programacao') }}" id="type-project">Programação</a>
                <a href="{{ route('menu.filtrartipo', 'Jogos') }}" id="type-project">Jogos</a>
                <a href="{{ route('menu.filtrartipo', 'Redes') }}" id="type-project">Redes</a>
                <a href="{{ route('menu.filtrartipo', 'Matematica') }}" id="type-project">Matemática</a>
                <a href="{{ route('menu.filtrartipo', 'Outros') }}" id="type-project">Outros</a>
            </div>
        </div>


        @if (!$aplicativos->isEmpty() && $aplicativos->where('qtd_Curtidas', '>=', 2)->count() > 0)
        @php
        $aplicativoDestaque = $aplicativos->sortByDesc('qtd_Curtidas')->first();
        @endphp
        <div class="container-project-publish-principal">
            <div id="infos-project-principal">
                <h1 id="title-principal">Projeto em Destaque</h1>
                <h6 id="title-project-principal">{{ $aplicativoDestaque->nome_Aplicativo }}</h6>
                <p id="description-project-principal">{{ $aplicativoDestaque->descricao }}</p>
                <div id="more-infos-project">
                    <a href="{{ route('menu.detalhes', ['id' => $aplicativoDestaque->id]) }}" id="more-info">
                        Mais informações
                    </a>
                </div>
            </div>
        </div>
        @endif

        <div class="container-project-publish">
            @if ($aplicativos->where('status', 'Aprovado')->isEmpty())
            <div class="none-publish">
                <h3 id="title-none-publish">Nenhum aplicativo postado no momento.</h3>
            </div>
            @else
            @foreach ($aplicativos as $aplicativo)
            @if ($aplicativo->status == 'Aprovado')
            <div class="content-publish">
                <div class="project-info">
                    <div id="header-publish">
                        <p id="type-project-publish">
                            {{ $aplicativo->tipo }}
                        </p>
                        <a href="{{ route('user.perfil', $aplicativo->criadorRelacao->id) }}" id="username-perfil">
                            <p id="creator-publish">
                                {{ $aplicativo->criadorRelacao->nome }}
                                {{ $aplicativo->criadorRelacao->sobrenome }}
                            </p>
                        </a>
                        <p class="text-muted">{{ $aplicativo->criadorRelacao->curso }}</p>
                        <p><small class="text-muted">{{ $aplicativo->created_at->diffForHumans() }}</small>
                        </p>
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
                        <div id="btn-infos-project">
                            @if($aplicativo->arquivo == null)
                            @else
                            <a href="{{ route('download.arquivo', ['id' => $aplicativo->id]) }}" id="dowload">
                                <button class="btn-dowload"><i class="fa fa-download"></i></button>
                            </a>
                            @endif
                            <a href="{{ $aplicativo->link_Projeto }}" target="_blank">
                                <button id="btn-link-project">Link do Projeto</button>
                            </a>
                            <a id="more-info-publish" href="{{ route('menu.detalhes', ['id' => $aplicativo->id]) }}">
                                Mais informações
                            </a>
                        </div>
                        <div class="content-like-comment-project">
                            <form action="{{ route('aplicativos.curtir', ['id' => $aplicativo->id]) }}" method="post" id="form-like-project">
                                @if ($aplicativo->qtd_Curtidas === null)
                                @else
                                <div id="count-like-project">
                                    <p id="text-like-project">{{ $aplicativo->qtd_Curtidas }}</p>
                                </div>
                                @endif
                                @csrf
                                <button id="btn-like-project">
                                    <svg xmlns="http://www.w3.org/2000/svg" id="like-project" width="32" height="32" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                        <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                    </svg>
                                </button>
                            </form>
                            <button id="btn-comment-project-{{ $aplicativo->id }}" data-bs-toggle="modal" data-bs-target="#commentModal-{{ $aplicativo->id }}" style="border: none; background: white;">
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
                        <source src="{{ asset('imagesProject/' . $aplicativo->media) }}" type="video/mp4">
                        Seu navegador não suporta o elemento de vídeo.
                    </video>
                    @else
                    @if (pathinfo($aplicativo->arquivo, PATHINFO_EXTENSION) == 'pdf')
                    <!-- Se o arquivo é um PDF -->
                    <embed src="{{ asset('imagesProject/' . $aplicativo->media) }}" type="application/pdf" width="100%" height="600px" />
                    @else
                    <!-- Se o arquivo não é um vídeo nem um PDF, assumindo que seja uma imagem -->
                    <img src="{{ asset('imagesProject/' . $aplicativo->media) }}" alt="">
                    @endif
                    @endif

                </div>
            </div>
            @endif
            @endforeach
            @endif
            @foreach ($aplicativos as $aplicativo)
            <div class="modal fade" id="commentModal-{{ $aplicativo->id }}" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="loginModalLabel">Comentarios</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @if ($aplicativo->comentarios->count() > 0)
                            @foreach ($aplicativo->comentarios as $comentario)
                            <div class="media mt-3">
                                <div class="media-body flex-row">
                                    @if ($comentario->usuario->imagem)
                                    <img src="{{ asset('imagesProject/' . $comentario->usuario->imagem) }}" alt="avatar" class="rounded-circle img-fluid" style="width: 100px;">
                                    @else
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar" class="rounded-circle img-fluid" style="width: 100px;">
                                    @endif
                                    <h5 class="mt-0">{{ $comentario->usuario->nome }}
                                        {{ $comentario->usuario->sobrenome }}
                                    </h5>
                                    <p>{{ $comentario->comentario }}</p>
                                    <small class="text-muted">{{ $comentario->created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                            <hr>
                            @endforeach
                            @else
                            <p>Nenhum comentário disponível.</p>
                            @endif
                        </div>
                        <div class="modal-body">
                            @if ($aplicativo)
                            <form action="{{ route('menu.detalhes.comentar', ['id' => $aplicativo->id]) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <textarea class="form-control" id="textAreaExample1" rows="4" name="comentarios"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Comentar</button>
                            </form>
                            @else
                            <p>Nenhum aplicativo disponível para comentar no momento.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>