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
                            <img width="300" height="750" src="{{$company->image}}"
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
                        </tr>@foreach($company->employees as $employee)
                            <tr align="center">
                                <td>{{$employee->last_name}} {{$employee->first_name}}</td>
                                <td>{{$employee->positions->title}}</td>
                                <td>{{$employee->positions->salary}} $</td>
                            </tr>
                        @endforeach
                    </table>
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
                        <hr>
                        <input type="submit" value="Сохранить"/>
                    </form>

                    @if (\Auth::check () and \Auth::user()->companies->id == $company->id)
                        <form method="POST" action="/company-delete">
                            @csrf
                            @method ('DELETE')
                            <input type="hidden" name="id" value="{{$company->id}}"/>
                            <input type="submit" value="Удалить свою компанию"/>
                        </form>
                    @endif

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
                            <p class="comment-form-author">
                                <label for="author">Имя <span class="required"></span></label>
                                <input id="author" name="name" type="text" value="" size="30" maxlength="245"
                                       aria-required='true' required='required'/>
                            </p>
                            {{--                            <p class="comment-form-email">--}}
                            {{--                                <label for="email">Email <span class="required"></span></label>--}}
                            {{--                                <input id="email" name="email" type="email" value="" size="30" maxlength="100"--}}
                            {{--                                       aria-describedby="email-notes" aria-required='true' required='required'/>--}}
                            {{--                            </p>--}}
                            <p class="form-submit">
                                <input name="submit" type="submit" id="submit" class="submit"
                                       value="Сохранить комментарий"/>
                                <input type="hidden" name="company_id" value="{{old('id', $company->id)}}"/>
                                {{--                                <input type='hidden' name='comment_post_ID' value='359' id='comment_post_ID'/>--}}
                                {{--                                <input type='hidden' name='comment_parent' id='comment_parent' value='0'/>--}}
                            </p>
                        </form>
                    </div>

                </section>
                @endif
            </article>
            <!-- #post-## -->
        </main>
        <!-- #main -->
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