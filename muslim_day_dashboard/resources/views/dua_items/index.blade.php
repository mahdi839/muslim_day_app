@extends('dashboard.dashboard')
@section('backend_header_footer')
    <div class="container mt-3">
        <h2 class="text-center mt-5 mb-5" style="font-family:Poppins;color:#3E64D3">Dua Content Lists</h2>
        @if (session('success'))
            <div class="alert alert-danger">
                {{ session('success') }}
            </div>
        @endif
        <table class="table  table-hover table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Dua Category Id</th>
                    <th>Bengali Title</th>
                    <th>Bengali Subtitle</th>
                    <th>Arabic Dua</th>
                    <th>Bengali Sanad</th>
                    <th>Bengali Matan</th>
                    <th>Translation In Bangla</th>
                    <th>Reference In Bengali</th>
                    <th>Raw Html</th>
                    <th>Explanation in Bengali</th>
                    <th>When</th>
                    <th>Actions</th>
                </tr>
            </thead>
            @forelse ($dua_contents as $contents_item)
                <tbody>
                    <tr>
                        <td>{{ $contents_item->id }}</td>

                        <td>{{ $contents_item->dua_category_id }}</td>
                        <td>{{ $contents_item->dua_item_title_bn }}</td>
                        <td>{{ $contents_item->subtitle_bn }}</td>
                        <td>{{ $contents_item->arabic_dua }}</td>
                        <td>{{ $contents_item->sanad_bn }}</td>
                        <td>{{ $contents_item->matan_bn }}</td>
                        <td>{{ $contents_item->translation_bn }}</td>
                        <td>{{ $contents_item->reference_bn }}</td>
                        <td>{{ $contents_item->dua_item_row_html }}</td>
                        <td>{{ $contents_item->explanation }}</td>
                        <td>{{ $contents_item->created_at }}</td>
                        <td class="d-flex justify-content-center">
                            <a class="btn" href="{{ route('dua_items.edit', $contents_item->id) }}"><i
                                    class="fa-solid fa-pen-to-square pr-5" style="color: #3E64D3;font-size:1.5rem;"></i></a>


                            <form method="POST" action="{{ route('dua_items.destroy', $contents_item->id) }}">
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
                        <td colspan="12" class="text-center text-danger"> No Category To Show</td>
                    </tr>
            @endforelse
            </tbody>

        </table>

        <button class="btn btn-success" onclick="window.location='{{ route('export-dua-items') }}'">
            <i class="fa-solid fa-file-export"></i> Export
        </button>

    </div>
@endsection
