@extends('dashboard.dashboard')
@section('backend_header_footer')
    <div class="container-fluid mt-3">
        <h2 class="text-center mt-5 mb-5" style="font-family:Poppins;color:#3E64D3">Deleted Dua Contents</h2>
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
            @forelse ($delete_items as $delete_item)
                <tbody>
                    <tr>
                        <td>{{ $delete_item->id }}</td>

                        <td>{{ $delete_item->dua_category_id }}</td>
                        <td>{{ $delete_item->dua_item_title_bn }}</td>
                        <td>{{ $delete_item->subtitle_bn }}</td>
                        <td>{{ $delete_item->arabic_dua }}</td>
                        <td>{{ $delete_item->sanad_bn }}</td>
                        <td>{{ $delete_item->matan_bn }}</td>
                        <td>{{ $delete_item->translation_bn }}</td>
                        <td>{{ $delete_item->reference_bn }}</td>
                        <td>{{ $delete_item->dua_item_row_html }}</td>
                        <td>{{ $delete_item->explanation }}</td>
                        <td>{{ $delete_item->created_at }}</td>
                        <td>

                            <a href="{{ route('dua_items.restore', $delete_item->id) }}"
                                class="btn btn-sm btn-success p-2">Resotre</a>

                            <a href="{{ route('dua_items.permanent_delete', $delete_item->id) }}"
                                class="btn btn-sm btn-danger mt-2">Permanent Delete</a>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="12" class="text-center text-danger"> No Category To Show</td>
                    </tr>
            @endforelse
            </tbody>

        </table>

    </div>
@endsection
