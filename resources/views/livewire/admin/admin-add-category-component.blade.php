<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> Add New Category
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                            @endif
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <div>Add new Category</div>
                                    <div><a href="{{ route('admin.categories') }}" class="btn btn-success">All Categories</a></div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form wire:submit.prevent="storeCategory">
                                    <div class="mb-3 mt-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter category name..." wire:model="name" wire:keyup="generateSlug" />
                                        @error('name')<p class="text-danger">{{ $message }}</p>@enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="slug" class="form-label">Slug</label>
                                        <input type="text" name="slug" class="form-control" placeholder="Enter category slug..." wire:model="slug" />
                                        @error('slug')<p class="text-danger">{{ $message }}</p>@enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file" name="image" class="form-control" wire:model="image" />
                                        @error('image')<p class="text-danger">{{ $message }}</p>@enderror
                                        @if ($image)
                                            <img src="{{ $image->temporaryUrl() }}" width="120">
                                        @endif
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="is_popular" class="form-label">Is Popular</label>
                                        <select name="is_popular" class="form-control" wire:model="is_popular">
                                            <option value="">Choose One</option>
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                        @error('is_popular')<p class="text-danger">{{ $message }}</p>@enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary float-end">Add Category</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
