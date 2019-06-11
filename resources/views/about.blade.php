@extends ('layout')

@section('title', 'CodeBrightTest - О нас')
@section('content')
    <h1 class="my-4">О нас <br> <hr>

        @if (isset($page))
            <small>{!! $page->text !!}</small>
        @else
            <p>Мы работаем над нашим описанием</p>
        @endif

    </h1>
    @endsection

{{--@section ('search')--}}
{{--    <!-- Search Widget -->--}}
{{--    <div class="card my-4">--}}
{{--        <h5 class="card-header">Поиск</h5>--}}
{{--        <div class="card-body">--}}
{{--            <div class="input-group">--}}
{{--                <input type="text" class="form-control" placeholder="Найти">--}}
{{--                <span class="input-group-btn">--}}
{{--                  <button class="btn btn-secondary" type="button">Искать</button>--}}
{{--                </span>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}

@section ('advertising')
    <!-- Advertising Widget -->
    <div class="card my-4">
        <h5 class="card-header">Мы в соц. сетях</h5>

        @inject('network', 'App\socialNetwork')

        <div>

           {{ $network->showSocialNetwork() }}

        </div>

    </div>
@endsection