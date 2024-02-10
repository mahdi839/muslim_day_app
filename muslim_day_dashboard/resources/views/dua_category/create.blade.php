@extends('back_end.dashboard')
@section('backend_header_footer')
    <div class="container mt-5">
        <h2 class="text-center" style="font-family: Poppins;">Add Dua Category</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form action="{{ route('dua_category.store') }}" method="POST">
            @csrf
            <div class="mb-3 mt-3">
                <label for="email">Bengali Title</label>
                <input type="text" class="form-control" id="email" placeholder="Enter Bengali Title" name="title_bn">
                @error('title_bn')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit </button>
        </form>
    </div>
@endsection
