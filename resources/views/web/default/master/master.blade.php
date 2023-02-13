<!DOCTYPE html>
<html lang="pt-br">
<head>	
    <meta charset="utf-8"/>    
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="language" content="pt-br" /> 
    <meta name="author" content="{{env('DESENVOLVEDOR')}}"/>
    <meta name="designer" content="Renato Montanari">
    <meta name="publisher" content="Renato Montanari">
    <meta name="url" content="{{$configuracoes->dominio}}" />
    <meta name="keywords" content="{{$configuracoes->metatags}}">
    <meta name="distribution" content="web">
    <meta name="rating" content="general">
    <meta name="date" content="Dec 26">

    {!! $head ?? '' !!}

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- FAVICON -->
    <link rel="icon" type="image/png" href="{{$configuracoes->getfaveicon()}}" />
    <link rel="shortcut icon" href="{{$configuracoes->getfaveicon()}}" type="image/x-icon"/>
    <link rel="apple-touch-icon" href="{{$configuracoes->getfaveicon()}}"/>
    <link rel="apple-touch-icon" sizes="72x72" href="{{$configuracoes->getfaveicon()}}"/>
    <link rel="apple-touch-icon" sizes="114x114" href="{{$configuracoes->getfaveicon()}}"/>

    <!-- MAIN STYLE -->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    @hasSection('css')
        @yield('css')
    @endif
 </head>
 <body>

    <!-- INÍCIO DO CONTEÚDO DO SITE -->
    @yield('content')
    <!-- FIM DO CONTEÚDO DO SITE --> 

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    @hasSection('js')
        @yield('js')
    @endif    

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{$configuracoes->tagmanager_id}}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
    
        gtag('config', '{{$configuracoes->tagmanager_id}}');
    </script>

</body>
</html>