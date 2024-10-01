<div class="box-attributes mt-2" id="check-attribute-{{ $response->id }}">
    <div class="position-relative">

        <a class="btn btn-outline-primary w-100 text-start" data-bs-toggle="collapse" href="#collapse-{{ $response->id }}"
            role="button" aria-expanded="false" aria-controls="collapse-{{ $response->id }}">
            {{ $response->name }}
        </a>

        <button class="btn btn-sm btn-danger position-absolute top-50 end-0 translate-middle-y me-2">
            <i class="mdi mdi-close"></i>
        </button>
    </div>

    <div class="collapse mt-2" id="collapse-{{ $response->id }}">
        <div class="card card-body mb-0">
            <select name="variation_id_{{ $response->id }}" id="variation_id_{{ $response->id }}"
                class="form-select select2" multiple>
                @foreach ($response->variations as $value)
                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
