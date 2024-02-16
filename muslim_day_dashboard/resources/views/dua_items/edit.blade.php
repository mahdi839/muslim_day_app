@extends('dashboard.dashboard')
@section('backend_header_footer')
    <div class="container mt-5">
        <h2 class="text-center" style="font-family: Poppins;">Update Dua Content</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form action="{{ route('dua_items.update', $updated_dua_item->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3 mt-3">
                <label for="mySelect">Select A Category:</label><br>
                <select id="mySelect" name="select_category" class="px-3 py-2 ">
                    @foreach ($dua_category as $single_dua_Item)
                        <option value="{{ $single_dua_Item->id }}">{{ $single_dua_Item->title_bn }}</option>
                    @endforeach


                </select>


            </div>
            <div class="mb-3 mt-3">
                <label for="email">Bengali Title</label>
                <input type="text" class="form-control" id="inputField1" name="dua_item_title_bn"
                    value="{{ old('dua_item_title_bn', $updated_dua_item->dua_item_title_bn) }}">
                @error('dua_item_title_bn')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label for="email">Bengali Subtitle</label>
                <input type="text" class="form-control" id="inputField2" name="subtitle_bn"
                    value="{{ old('subtitle_bn', $updated_dua_item->subtitle_bn) }}">
                @error('subtitle_bn')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label for="email">Arabic Dua</label>
                <input type="text" class="form-control" id="inputField2" name="arabic_dua"
                    value="{{ old('arabic_dua', $updated_dua_item->arabic_dua) }}">
                @error('arabic_dua')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label for="email">Bengali Sanad</label>
                <input type="text" class="form-control" id="inputField3" name="sanad_bn"
                    value="{{ old('sanad_bn', $updated_dua_item->sanad_bn) }}">
                @error('sanad_bn')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label for="email">Bengali Matan</label>
                <input type="text" class="form-control" id="inputField4" name="matan_bn"
                    value="{{ old('matan_bn', $updated_dua_item->matan_bn) }}">
                @error('matan_bn')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label for="email"> Translation In Bangla</label>
                <input type="text" class="form-control" id="inputField5" name="translation_bn"
                    value="{{ old('translation_bn', $updated_dua_item->translation_bn) }}">
                @error('translation_bn')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label for="email">Reference In Bengali</label>
                <input type="text" class="form-control" id="inputField6" name="reference_bn"
                    value="{{ old('reference_bn', $updated_dua_item->reference_bn) }}">
                @error('reference_bn')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3 mt-3">
                <label for="email">Raw Html</label>
                <textarea id="textareaField" name="dua_item_row_html" id="" class="form-control summernote " cols="30"
                    rows="10">
                  {{ old('dua_item_title_bn', $updated_dua_item->dua_item_row_html) }}
                </textarea>
                <br>


                @error('dua_item_row_html')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label for="email">Explanation in Bengali</label>
                <input type="text" class="form-control" id="inputField7" name="explanation"
                    value="{{ old('explanation', $updated_dua_item->explanation) }}">
                @error('explanation')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mb-5"><i class="fa-solid fa-plus"></i> Update </button>
        </form>
    </div>
@endsection
