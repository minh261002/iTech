<div class="box-attributes mt-2" id="check-attribute-{{ $attribute->id }}">
    <div class="position-relative">
        <a class="btn btn-outline-primary w-100 text-start" data-bs-toggle="collapse" href="#collapse-{{ $attribute->id }}"
            role="button" aria-expanded="false" aria-controls="collapse-{{ $attribute->id }}">
            {{ $attribute->name }}
        </a>
        <button type="button"
            class="btn btn-sm btn-danger position-absolute top-50 end-0 translate-middle-y me-2 remove-attribute">
            <i data-feather="trash"></i>
        </button>
    </div>


    <div class="collapse mt-2" id="collapse-{{ $attribute->id }}">
        <div class="card card-body mb-0">
            <input type="hidden" class="input-product-attribute-id" name="product_attribute[attribute_id][]"
                value="{{ $attribute->id }}" />
            <select id="variation_id_{{ $attribute->id }}"
                name="product_attribute[attribute_variation_id][{{ $attribute->id }}][]" class="form-select select2"
                multiple>
                @foreach ($attribute->variations as $value)
                    <option value="{{ $value->id }}"
                        {{ isset($attributeVariations) && in_array($value->id, $attributeVariations) ? 'selected' : '' }}>
                        {{ $value->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
</div>
