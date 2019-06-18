
<form action="" method="post" enctype="multipart/form-data">
    @csrf
    <strong>Описание компании:</strong> <br>
    <input type="text" name="description" placeholder="Не более 1000 символов"
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
    <input type="hidden" name="id" value="{{old('id', $company->image)}}"/>
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
