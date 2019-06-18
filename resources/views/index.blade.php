@extends ('layout')

@section('title', 'CodeBrightTest - Глваная')
@section('content')
    <div class="col-md-8">
        <h1 class="my-4" style="color:#C71585">Добро пожаловать<br>
            <small> Компании и их сотрудники</small>
        </h1>
        @foreach( $companies as $company)
            <div class="card mb-4">
                <img class="card-img-top" src="{{$company->image}}" alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-title" style="color:#008000">
                        <a href="{{route('single_company', $company->id)}}">{{$company->name}}</a></h2>
                    <p class="card-text">{{$company->description}}</p>
                    <a href="{{route('single_company', $company->key)}}" class="btn btn-primary">Перейти к компании
                        &rarr;</a>
                </div>
                <div class="card-footer text-muted">
                    <strong>Зарегестрирована на сайте:</strong> {{$company->created_at->format('d.m.Y г. в H:i')}} <br>
                    <strong>Работники компании:</strong>

                    <table cellpadding="7" border="2" bgcolor="#DCDCDC">
                        {{--                               <caption>Сотрудники компании</caption>--}}
                        <tr>
                            <th align="center">Фамилия Имя</th>
                            <th align="center">Должность</th>
                            <th align="center">Зарплата</th>

                        </tr>@foreach($company->employees as $employee)

                            <tr align="center">
                                <td>{{$employee->last_name}} {{$employee->first_name}}</td>
                                <td>{{$employee->positions->title}}</td>
                                <td>{{$employee->positions->salary}} $</td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        @endforeach
        <ul class="pagination justify-content-center mb-4">
            @if ($companies->currentPage()!=1)
                <li class="page-item"><a class="page-link" href="?page=1"> Первая страница </a></li>
                <li class="page-item"><a class="page-link" href="{{$companies->previousPageUrl()}}"> < </a></li>
            @endif
            @if ($companies->count ()>0)
                @for ($count=1; $count<=$companies->lastPage(); $count++)
                    <li class="page-item @if ($count==$companies->currentPage()) active @endif">
                        <a class="page-link" href="?page={{$count}}"> {{$count}} </a></li>
                @endfor
            @else
                <h1><font size="15" color="aqua" face="Arial"> Мы работаем над тем, чтобы здесь что-то появилось
                        ;) </font></h1>
            @endif
            @if ($companies->currentPage() != $companies->lastPage())
                <li class="page-item"><a class="page-link" href="{{$companies->nextPageUrl()}}"> > </a></li>
                <li class="page-item"><a class="page-link" href="?page={{$companies->lastPage()}}"> Последняя
                        страница </a></li>
            @endif
        </ul>
    </div>
@endsection

@section ('advertising')
    <!-- Advertising Widget -->
    <div class="card my-4">
        <h5 class="card-header">Рекламный блок</h5>
        <div class="card-body">
            <strong style="color:#ff0000"> Покупайте наших слонов </strong>
        </div>
    </div>
@endsection