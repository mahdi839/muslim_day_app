@extends('dashboard.dashboard')
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
                                <!-- Button trigger modal -->
                                <button type="button" class="btn" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">
                                    <i class="fa-solid fa-trash" style="color: #d33e3e;font-size:1.5rem;"></i>

                                </button>

                                <!--Delete Modal -->
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h6 class="text-danger ">Do You Want To Delete?</h6>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
