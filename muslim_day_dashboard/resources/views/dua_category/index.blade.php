@extends('back_end.dashboard')
@section('backend_header_footer')
    <div class="container mt-3">
        <h2 class="text-center mt-5 mb-5" style="font-family:Poppins;color:#3E64D3">Dua Category Lists</h2>

        <table class="table  table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Bengali Title</th>
                    <th>Actions</th>
                </tr>
            </thead>
            @forelse ($dua_category as $item)
                <tbody>
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->title_bn }}</td>
                        <td class="d-flex justify-content-center">
                            <a class="btn" href="{{ route('dua_category.edit', $item->id) }}"><i
                                    class="fa-solid fa-pen-to-square pr-5" style="color: #3E64D3;font-size:1.5rem;"></i></a>
                            <form method="POST" action="{{ route('dua_category.destroy', $item->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn"> <i class="fa-solid fa-trash"
                                        style="color: #d33e3e;font-size:1.5rem;"></i></a></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center text-danger"> No Category To Show</td>
                    </tr>
            @endforelse
            </tbody>

        </table>
    </div>
@endsection
