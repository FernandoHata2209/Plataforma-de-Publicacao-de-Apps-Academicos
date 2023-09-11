<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/style.css', 'resources/js/script.js'])
    <title>Perfil Usuario - PPAA</title>
</head>

<body>
    <div class="header-menu">
        <div class="header-form-login-user">
            <a id="back-to-menu" href="{{ route('menu.menu') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                </svg>
            </a>
        </div>
        <div class="container-header-menu">
            <svg id="logo" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="255px" height="254px"
                viewBox="0 0 255 254" enable-background="new 0 0 255 254" xml:space="preserve">
                <image id="image0" width="255" height="254" x="0" y="0"
                    xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAP8AAAD+CAMAAADCiiNdAAAABGdBTUEAALGPC/xhBQAAACBjSFJN
                AAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAC4lBMVEX///8aIiwaIiwaIiwa
                IiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwa
                IiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwa
                IiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwa
                IiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwa
                IiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwa
                IiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwa
                IiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwa
                IiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwa
                IiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwa
                IiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwa
                IiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwa
                IiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwa
                IiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiwaIiz///9nzeMIAAAA9HRSTlMAACRl
                msDm9fvtzqd7OwQmhd3zpUYDPLhoBiPgUgJ6+LUYFrroQiXe/GAu63PpYxHb/UcBr+wca8IZ8mKk
                ECr+f6AM+Wm/CltEm82cvDDSwRd91EuhEtDlZwk+jiEv33In9JDXatUFTFVJMjpe43g32JW777MO
                IvbZZlF34mxNqsTars85OFCEttPxGjWPD3mfxsookcXh7l2p9/orSsOCqLIHPz2GC1e0XB6Io28V
                FMvkdjQgnjMNdTZALOfcsDGtjbEpk5SBomRBnROmuU9aH9bJmayJvlQdbi1whwhDt3zqSJZhvZKD
                TserbfCYdFaMyIBZQIxdeAAAAAFiS0dEAIgFHUgAAAAHdElNRQfjCBUTBhkn4j2PAAAKX0lEQVR4
                2u3d+38U5RUH4BwgkkAIEgy3kAZDkBAQjCuUgCQQUhAUShGFAEpBiARKI4UQpBeRSyw3QVTAS0GC
                1RpFCigXlRaE2loqRWxtbcW21Futrb3MH9AkpGGz2d055z1nbnzO99fNzHueN7vZzMyZdxISNBqN
                RqPRaDQajUaj0Wg0Go1Go9FoNBqNRqPRaDQajUaj0Wg0Go1Go9EELoBIq9ZtEq9oa/k8Scnt2qd0
                SI2one3veGUnr2WUpHW+Kl3Q36Wr1yB6OnXrLuTvEUB9fTJ6Svgzv5TlNcQ4va5m+7N7e43gJKcP
                039NX68JvOT2Y/nz+nsNYGcAw9/jWq+rF8hAY/+g67yuXSL51xv6Qzd4XbpMBg8x83/Z68KlMjRk
                4i8Y5nXdYhlu4r/R66rlMngE3V9Y5HXVghlJ94/yumbJDC6m+geN9rpm0Qyk+ku8rlg2iVT/V7yu
                WDZFV9P8Yy6vt79ljaX5b/K6XumMo/kHeF2vdMbT/Dd7Xa900mj+W7yuVzzZJH87r8sVTw+S/7I4
                8m+WCSR/htfleuyf6HW54ikk+b/qdbnimUTyX0YH/xczOkTyf83reqUzmfb9f6vX9UpnCs1/2+3e
                ZeLUfHn/NJrf25ROnzFY2D8zSP66FI8Uvewc//DHh36AO+4U9M8Knh+GyLXctL0tgH74+mwp/5yE
                IPrFTsLOLgimP/MuGX9KQjD9MFeEP68snv3ufozML19Q7KA/W4JftDDu9e9vcPe/qOs3K9L51qi5
                R8C/2Kb/4VsCYyxp0yHkhH8pv7SplTb+ZVUCE2BZy+/tzvdGRuAq7Aqw63/5tojfsr7z3VQ2OCLf
                W3zfyvvTOEWtAlt/6mqhCbBWr3HiQwClM9dWlzzQ5vvr1pMrGrbB3p+wUeyAs2iTAx+CsDyYt2Lz
                locIb4gSQPgTNkn5LWvrTEcnoCGZD499ZB2qmkczUf7ibXITsL2D8xNQn4Idjz1uV8sTTwLKDz+Q
                81tVd7szAXWfhoE745eyC5B+eEpwAvJ7slSkbNwdp5DlNWj/pO2CE5C1x70JgKdj/yVoKsPeDwMF
                /db6J12cgLIfxmjVG9f0Iwh/KFFyAuY94+IEwK1RvxBzBlH80FH0hOMoN/1QEe0fo2cvvY7xC1/z
                qXZ1Ata0/Cr8UdjLKH/ZZEn/Nlc/AfBc5Piza6l+WCja8vu8q354IWL4veEv4vywWNL/+Iuu+vct
                aTb6j03u/6zcH+A3wIHwsXPvaPYa0g8rJP1pla76i8PfABFzj/XDKskJaO3uG+CRSyN3GmPo30A/
                wxA7O931H7w08k0RL6H9sn3vL7k7AU1/vaZEvoL3Zz4q6O/mrv/lxmH77zP3Q+ETcv7H3PVPaxx2
                R4tXCH7YJefv767/0MVRe7d8heKvkbjm0pghrvoPN4xZtYznhz1y/j6u+qHhbvUjUV4g+WGcmL9E
                AFVcePSV+iyc0JRXX2pK7Yj6NP6zO69uyNXRrsHQ/CNypPwP8OihCQd6vYYZp6jvjT3r3EMtK/9g
                tB3R/PCslH8OR1+7i9QAdKwafmJZM6LuiuiXuOzakFHm+p8eJ1+UOvG6tS16NwLVXyvUeWTsP/m6
                yXBVVnn03VH9sNdTf+WpXLPxnoqxQ7I/fauI/2dG/OorDIfbPknKD3mGv4HmecNA/+DPjYcbHmuf
                dD88L+H/BZ1/1LztNTFmC46Bv/SYgP9NMn+u+eFXVseYezXwi9wCTD0F2v2XjMFSYu/XxA9T2Pxt
                RP7pnYzBJpcJ+0+zF7/6FY3f437GWEXxWo+M/LCD6+9H4k/I4YwV96vWzA9v8fj5pI//Wtap1/1x
                T7Yb+pmdkb2BkD68sc7E3bmhH46wavq1e/xV8fdu6k/l3Ad/LaEVkMlfv8EZPxxkdEamADoVrBZX
                +xPtxn6YYVxT8gg0v5D5TdvY5eiE/xnjlQBmoflnmZedRxfajWDuh3LDot5Gf/pf5B5p7LIdguGH
                9mZFdcHyx5xj8u+psR2D48826ox8B8sP/YbJt6bbD8Lxw3CDml5D//H7LZc/DjEIyx96l17U77D8
                1lx+DmamWX6DzsjdWP6bSVz/fMwwPD+kEGsa9nsk/yz7EHspahymvwx3s0VT3kPyS8dz+Wm1qIGY
                flhD6ow8Z/fv2P/zAmWvnJnm+uEUoaakPyD5f2TztyLvO2X7KZ2R7yP5XdiXGJLykEOx/XAGXdR1
                53E17eM3m6I7TPl+OI4t6gNcSZl/YvOPlbrox3ZGbkGW9Gc2HzvTMn7ohqrpL6dxFe3h33I6BTeS
                lD+0ElPUWFxBp/kf/v7ImZbyQyFiTeCuyIJuYPOt5/B8GT+8YVtTW2TH7718/lsEvpC/xnY5lgG4
                HZ3kP0atinSbtYwfptsUNR63/kGNwHoDR1AjCfvhnbg15S7A7UWgtaIdbaUJKX/8zsgTuJ0s5H/1
                5R4i8cX8MD9OUXeOQe2iWGBt4RmokRzwQ5zbzS/g9vBXPj+Dem+lnL825pWqzrgdXM/nY2faCT+8
                F6OmZNzF/sqpfH57Kl/SnxmjM/JD3OYCvfXJ2V76IS/qKduPcMtfXSXw7h+OGskxP7wfpaasVqhN
                JdaZeddgoTFR//ko1ys34zYVuME66xo6X9YPH7QoamIZakOJO4sIXRVO+WFLRE1FFajNzi/n89fh
                ZtpZf2Rn5Me4zT7h84vWmvCl/TC2WVGLDqM2epV9rc+yThnxxf3Q7JHQn6I2yfwbn7/IcEkBcf/M
                sH61z3Cb/J3Pt+lydNEf9oCozwtQGwwReJzmcUO+A/5LnZHTcBsIrCyBnGlX/HCo8erdTty/Y9UC
                737z5QQc8MOJhppGn0T98OFFfP5K8xV2nfBf7IwcifvhOXw+cqZd88OFuqLusu+9q88hgQVWTe6l
                c9QPnbFdjunsPhf0TLvpz07+B+4HZ/H51tMMvkN+OIPrcpS4mxrdT+qmH5ndfD6+n9R//p4C735U
                l6M//RKLyu1m1uCl/xSfn4btJ/Wh/6jAopLYflIf+lNv5/PR/aQ+9P+Tz0d3OfrQf5bf6YHuJ/Wj
                vxefj+0n9aP/Cz6f0OXoP/8FPh/bT+pLf/0hIi/YflKf+rOTmX5kP6lf/fAhj4/tJ/WtP/QRh18l
                tIKsd35oxXmsALKf1M9+2GzOR/aT+ttfZvwseWqXoz/9UGF6BHhCrARP/fCxGT8D10/qf7/hxR9y
                l6Nf/fCpCR/ZTxoEP3xG5xt0OfrXX/A52Y/sJw2Gv2lpdnSQ/aRB8YeG0vhGXY4+9sNJxM1zYUH2
                kwbHDyMpfGQ/aZD8NYSna+VuFB7cB35YgF/Z1X5BpwD68WtqJ4o/TdwXfuy9H8dETvn50J+OWtR9
                P+5WigD6oft99vwMB/h+8UP6v+z45zbwR/GvH+CL+EcCiwUudvnaD7VLY+v7Ch7y+9UPUB7j9vcl
                B9DruQTaD6HyXi37Qd/eW8zfczD8dSkoWRr2uMakf38idqo3GP66ZC47M/c/m+ZceeS/Cxx732P9
                Go1Go9FoNBqNRqPRaDQajUaj0Wg0Go1GE9D8D1bfIA/dC1K5AAAAJXRFWHRkYXRlOmNyZWF0ZQAy
                MDE5LTA4LTIxVDE5OjA2OjI1KzAzOjAwsssdMQAAACV0RVh0ZGF0ZTptb2RpZnkAMjAxOS0wOC0y
                MVQxOTowNjoyNSswMzowMMOWpY0AAAAASUVORK5CYII=" />
            </svg>
        </div>
        <div class="guest-header-menu">
        </div>
    </div>

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
                    <input type="text" name="nome" class="inp-perfil-user" disabled
                        placeholder="{{ Auth::user()->nome }} {{ Auth::user()->sobrenome }}">
                    <label for="">Email do Usuario</label>
                    <input type="text" name="email" class="inp-perfil-user" disabled
                        placeholder="{{ Auth::user()->email }}">
                    <label for="">Link Redes Sociais</label>
                    <input type="text" name="rede_social" class='inp-perfil-user' disabled
                        placeholder="link tal tal tal">
                </form>
            </div>
            <h3>Aplicativos Postados:</h3>
            <div class="container-show-apps">
                @if ($aplicativos->count() > 0)
                    @foreach ($aplicativos as $aplicativo)
                        <div class="main-perfil-projects">
                            <div class="header-perfil-project">
                                <h3 id="name-perfil-project">
                                    Titulo do Projeto: {{ $aplicativo->nome_Aplicativo }}
                                </h3>
                            </div>
                            <div class="section-perfil-project-infos">
                                <p id="description-perfil-project">Descricao do Projeto: {{ $aplicativo->descricao }}</p>
                                <p id="type-approve-project">Tema do Projeto: {{ $aplicativo->tipo }}</p>
                                <div id="section-img-approve">
                                    <img src="{{ asset('imagesProject/' . $aplicativo->imagem) }}" alt="Imagem do Projeto"
                                        id="img-project-approve">
                                </div>
                                <div id="settings-perfil-project">
                                    <a id="btn-settings-project" href="{{route('user.editarproject', ['id' => $aplicativo->id])}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                            fill="Black" class="bi bi-gear" viewBox="0 0 16 16">
                                            <path
                                                d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                                            <path
                                                d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>Nenhum aplicativo foi postado.</p>
                @endif
            </div>
        @endauth
    </div>

</body>

</html>