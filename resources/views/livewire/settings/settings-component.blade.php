<div>
    <h3>Settings</h3>

    <hr>

    <form action="{{ route('settings.update') }}" method="POST">
    @csrf
        @foreach ($settings as $key => $value)
            <div class="col-4 pb-2">
                <?php
                    $uckey = str_replace('_', ' ', $key);
                    $uckey = ucwords(strtolower($uckey));
                ?>
                <label for="{{ $key }}">{{ $uckey }}</label>
                <input type="text" name="{{ $key }}" id="{{ $key }}" value="{{ $value }}" 
                    class="form-control" />
            </div>  
        @endforeach

        <div class="col-4 pt-2">
            <button type="submit" class="btn btn-primary float-end">Save</button>
        </div>
    </form>

</div>


