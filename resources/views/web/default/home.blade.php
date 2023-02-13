@extends("web.{$configuracoes->template}.master.master")

@section('content')


@endsection

@section('css')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mt-4">
                <img src="{{$configuracoes->getLogomarca()}}" alt="{{$configuracoes->nomedosite}}">
                <p style="font-size: 14px;" class="p-3">
                    <a href="mailto:{{$configuracoes->email}}">{{$configuracoes->email}}</a>
                    <br>
                    <i class="fa-brands fa-whatsapp fa-fw"></i>
                    <a target="_blank" href="{{\App\Helpers\WhatsApp::getNumZap($configuracoes->whatsapp ,'Atendimento '.$configuracoes->nomedosite)}}" title="WhatsApp">{{$configuracoes->whatsapp}}</a>
                </p>
                <p style="font-size: 22px;">
                    <a href="{{$configuracoes->facebook}}"><i class="fa-brands fa-facebook fa-fw"></i></a>
                    <a href="{{$configuracoes->instagram}}"><i class="fa-brands fa-square-instagram fa-fw"></i></a>                    
                </p>
            </div>
        </div>
    </div>
@endsection

@section('js')
  
@endsection