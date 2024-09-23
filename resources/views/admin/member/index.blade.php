@extends('admin.layouts.master')

@section('title', 'Quản lý thành viên')

@section('content')
    <div class="card my-2">
        <div class="card-body d-flex align-items-center justify-content-between">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Thành viên</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h2 class="card-title mb-0">Danh sách thành viên</h2>

            <div class="card-tools">
                <a href="{{ route('admin.member.create') }}" class="btn btn-primary">
                    <i class="mdi mdi-plus"></i> Thêm mới
                </a>
            </div>
        </div>

        <div class="card-body">
            <table id="table" class="table table-striped table-bordered ">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Họ và tên</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($members as $member)
                        <tr>
                            <td>{{ $member->id }}</td>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->email }}</td>
                            <td>{{ $member->phone }}</td>
                            <td>{{ $member->address ?? 'Địa chỉ' }},
                                {{ $member->ward->full_name ?? 'Phường / Xã' }},
                                {{ $member->district->full_name ?? 'Quận / Huyện' }},
                                {{ $member->province->full_name ?? 'Tỉnh / Thành Phố' }},
                            </td>

                            <td>
                                <input type="checkbox" class="js-switch" {{ $member->status == 1 ? 'checked' : '' }}
                                    data-id={{ $member->id }}>
                            </td>
                            <td>
                                <a href="{{ route('admin.member.edit', $member->id) }}" class="btn btn-sm btn-primary">
                                    <i class="mdi mdi-pencil"></i>
                                </a>
                                <a href="{{ route('admin.member.delete', $member->id) }}"
                                    class="btn btn-sm btn-danger delete-item">
                                    <i class="mdi mdi-delete"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.js-switch').change(function() {
                let status = $(this).prop('checked') === true ? 1 : 2;
                let memberId = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('admin.member.update.status') }}',
                    data: {
                        status: status,
                        member_id: memberId
                    },
                    success: function(data) {
                        if (data.status == 'success') {
                            FuiToast.success('Cập nhật trạng thái thành công');
                        } else {
                            FuiToast.error('Cập nhật trạng thái thất bại');
                            $('.js-switch').prop('checked', !status);
                        }
                    }
                });
            });
        });
    </script>
@endpush
