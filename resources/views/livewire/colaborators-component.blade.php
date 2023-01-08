<div>
    <div class="col-2">
        <select wire:model="colaborator_id" class="form-select">
            <option class="dropdown-item" value="">Select colaborator</option>
            @foreach ($colaborators as $key => $colaborator)
                <option class="dropdown-item" value="{{ $key + 1 }}">{{ $colaborator->name }}
                    {{ $colaborator->surname }}</option>
            @endforeach
        </select>
    </div>
</div>
