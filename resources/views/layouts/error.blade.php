@if(count($errors))
    <div class="form-group">
        <div class="alert alert-danger">
            <ui>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ui>
        </div>
    </div>
@endif