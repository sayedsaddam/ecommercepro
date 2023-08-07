<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> All Slides
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <div>All Slides</div>
                                    <div>
                                        <a href="{{ route('admin.home.slide.add') }}" class="btn btn-success">Add new Slide</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if(Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                @endif
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Top Title</th>
                                            <th>Title</th>
                                            <th>Sub Title</th>
                                            <th>Offer</th>
                                            <th>Link</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 0; //($slides->currentPage() - 1) * $slides->perPage();
                                        @endphp
                                        @foreach ($slides as $slide)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <th><img src="{{ asset('assets/imgs/slider') }}/{{ $slide->image }}" width="80" alt="{{ $slide->title }}"></th>
                                                <td>{{ $slide->top_title }}</td>
                                                <td>{{ $slide->title }}</td>
                                                <td>{{ $slide->sub_title }}</td>
                                                <td>{{ $slide->offer }}</td>
                                                <td>{{ $slide->link }}</td>
                                                <th>{{ $slide->status == 1 ? 'Active' : 'Inactive' }}</th>
                                                <td>
                                                    <a href="{{ route('admin.home.slide.edit', ['slide_id' => $slide->id]) }}" class="text-info">Edit</a> |
                                                    <a href="#" class="text-danger" onclick="deleteConfirmation({{ $slide->id }})">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{-- <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                                    {{ $categories->links('pagination::bootstrap-5') }}
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

<div class="modal" id="deleteConfirmation">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body pb-30 pt-30">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h4 class="pb-3">Are you sure to delete this record?</h4>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#deleteConfirmation">Cancel</button>
                        <button type="button" class="btn btn-danger" onclick="deleteSlide()">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        function deleteConfirmation(id){
            @this.set('slide_id', id);
            $('#deleteConfirmation').modal('show');
        }
        function deleteSlide(){
            @this.call('deleteSlide');
            $('#deleteConfirmation').modal('hide');
        }
    </script>
@endpush
