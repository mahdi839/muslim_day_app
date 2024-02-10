@extends('back_end.dashboard')
@section('backend_header_footer')
    <div class="container mt-5">
        <h2 class="text-center" style="font-family: Poppins;">Update Dua Category</h2>

        @if (session('success_update'))
            <div class="alert alert-success">{{ session('success_update') }}</div>
        @endif
        <form action="{{ route('dua_category.update', $dua_category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3 mt-3">
                <label for="email">Bengali Title</label>
                <input type="text" class="form-control" id="email" placeholder="Enter Bengali Title" name="title_bn">
                @error('title_bn')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update </button>
        </form>
    </div>
@endsection
