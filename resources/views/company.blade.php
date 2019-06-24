@extends ('layout')

@section('title', 'CodeBrightTest - О компании')

@section('content')

    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <article id="post-359"
                     class="post-359 post type-post status-publish format-image has-post-thumbnail sticky hentry category-technology tag-event tag-festival tag-music tag-woocommerce post_format-post-format-image">
                <header class="entry-header">
                    <div class="media-attachment">
                        <div class="post-thumbnail">
                            <img width="750" height="300" src="{{$company->image}}"
                                 class="attachment-full size-full wp-post-image" alt=""/>
                        </div>
                    </div>
                    <h1 class="entry-title">{{$company->name}}</h1>
                    <div class="entry-meta">
                    <span class="posted-on">
                                    <div class="label"><strong>Зарегестрирована на сайте:</strong></div>
                                    <time class="entry-date published"
                                          datetime="{{$company->created_at}}">{{$company->created_at->format('d.m.Y г. в H:i')}}</time>
                                </span>
                    </div>
                </header>
                <!-- .entry-header -->
                <div class="entry-content">
                    <strong>О компании:</strong>
                    <p class="highlight">{{$company->description}} </p>
                    <strong>Работники компании:</strong>
                    <table cellpadding="7" border="2" bgcolor="#DCDCDC">
                        <tr>
                            <th align="center">Фамилия Имя</th>
                            <th align="center">Должность</th>
                            <th align="center">Зарплата</th>
                            @if (\Auth::check () and \Auth::user()->companies->id == $company->id)
                                <th align="center">Управление персоналом</th>
                            @endif
                        </tr>
                        @foreach($company->employees as $employee)
                            <tr align="center">
                                <td>{{$employee->last_name}} {{$employee->first_name}}</td>
                                <td>{{$employee->positions->title}}</td>
                                <td>{{$employee->positions->salary}} $</td>

                                @if (\Auth::check () and \Auth::user()->companies->id == $company->id)
                                    <td align="left">
                                        <form action="/update_employee" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <strong>Изменить данные сотрудника:</strong> <br>
                                            <strong> Имя:</strong>
                                            <input type="text" name="first_name" placeholder="Не более 30 символов"
                                                   size="35"
                                                   value="{{old ('first_name', $employee->first_name )}}"/><br>
                                            @if ($errors->any('first_name'))
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->get('first_name') as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <hr>
                                            <strong> Фамилия:</strong>
                                            <input type="text" name="last_name" placeholder="Не более 30 символов"
                                                   size="30"
                                                   value="{{old ('last_name', $employee->last_name )}}"/><br>
                                            @if ($errors->any('last_name'))
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->get('last_name') as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <hr>
                                            <strong> Позиция:</strong>
                                            <input type="text" name="title" placeholder="Не более 30 символов" size="30"
                                                   value="{{old ('title', $employee->positions->title )}}"/><br>
                                            @if ($errors->any('title'))
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->get('title') as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <hr>
                                            <strong> Зарплата:</strong>
                                            <input type="text" name="salary" placeholder="Числовое значение" size="30"
                                                   value="{{old ('salary', $employee->positions->salary )}} "/><br>
                                            @if ($errors->any('salary'))
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->get('salary') as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <hr>
                                            <input type="hidden" name="id" value="{{$employee->id}}"/>
                                            <input type="submit" value="Сохранить"/>
                                        </form>

                                        <form method="POST" action="/employee-delete">
                                            @csrf
                                            @method ('DELETE')
                                            <input type="hidden" name="id" value="{{$employee->id}}"/>
                                            <input type="submit" value="Удалить сотрудника"/>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </table>

                    <form action="/save_employee" method="post" enctype="multipart/form-data">
                        @csrf
                        <strong>Добавить сотрудника:</strong> <br>
                        <p>Имя:</p>
                        <input type="text" name="first_name" placeholder="Не более 30 символов" size="30"
                               value=""/><br>

                        <p>Фамилия:</p>
                        <input type="text" name="last_name" placeholder="Не более 30 символов" size="30"
                               value=""/><br>

                        <p>Должность:</p>
                        <input type="text" name="title" placeholder="Не более 100 символов" size="100"
                               value=""/><br>

                        <p>Зарплата:</p>
                        <input type="text" name="salary" placeholder="Целое число" size="10"
                               value=""/><br>

                        <input type="hidden" name="id" value="{{$company->id}}"/>
                        <input type="submit" value="Сохранить"/>
                    </form>
                    <hr>

                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <strong>Описание компании:</strong> <br>
                        <input type="text" name="description" placeholder="Не более 1000 символов" size="100"
                               value="{{old ('description', $company->description )}}"/><br>
                        @if ($errors->any('description'))
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->get('description') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <hr>
                        <strong>Изображение:</strong> <i>300x750</i><strong> :</strong>
                        <input type="file" name="image"/><br>
                        <input type="hidden" name="id" value="{{old('id', $company->id)}}"/>
                        @if ($errors->any('image'))
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->get('image') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <input type="submit" value="Сохранить"/>
                    </form>
                    <br>
                    @if (\Auth::check () and \Auth::user()->companies->id == $company->id)
                        <form method="POST" action="/company-delete">
                            @csrf
                            @method ('DELETE')
                            <input type="hidden" name="id" value="{{$company->id}}"/>
                            <input type="submit" value="Удалить свою компанию"/>
                        </form>
                    @endif
                    <hr>
                    @if (\Auth::check ())
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Коментарии:</strong>
                                @foreach( $company->comments as $comment)
                                    <ol>
                                        <li>{{$comment->body}} <br>
                                            Создан: {{$comment->created_at->format('d.m.Y г. в H:i')}}</li>
                                    </ol>
                                @endforeach
                            </div>
                        </div>
                </div>
                <section id="comments" class="comments-area" aria-label="Post Comments">
                    <div id="respond" class="comment-respond">
                              <span id="reply-title" class="gamma comment-reply-title">Оставить комментарий
                              <small>
                              <a rel="nofollow" id="cancel-comment-reply-link" href="#" style="display:none;">Cancel reply</a>
                              </small>
                              </span>
                        <form action="/save_comment" method="post" id="commentform" class="comment-form" novalidate>
                            @csrf
                            <p class="comment-form-comment">
                                <textarea id="comment" name="body" cols="45" rows="8"
                                          maxlength="65525"></textarea>
                            </p>
                            <input type="hidden" name="company_id" value="{{old('id', $company->id)}}"/>
                            <p class="form-submit">
                                <input name="submit" type="submit" id="submit" class="submit"
                                       value="Сохранить комментарий"/>

                            </p>
                        </form>
                    </div>

                </section>
                @endif
            </article>
        </main>
    </div>
@endsection

@section ('advertising')
    <!-- Advertising Widget -->
    <div class="card my-4">
        <h5 class="card-header">Мы в соц. сетях:</h5>
        @inject('network', 'App\socialNetwork')
        <div>
            {{ $network->showSocialNetwork() }}
        </div>
    </div>
@endsection