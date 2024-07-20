@extends('app')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Wallpaper's</h1>

            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Wallpaper's</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Wallpaper's
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-end mb-2">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-dark">Add wallpaper</button>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Wallpaper</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="post"  action="{{route('Add_Wallpaper')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="category_id" class="form-label">Category Name</label>
                                            <select class="form-select" name="category_id" id="category_id" aria-label="Default select example" required>
                                                <option >Select Parent Category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="category" class="form-label">Title</label>
                                            <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="wallpaper_image" class="form-label">wallpaper Image</label>
                                            <input class="form-control" name="wallpaper_image" type="file" id="Wallpaper Image" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div></form>
                            </div>
                        </div>
                    </div>

                    <!-- Modal2 -->
                    <div class="modal fade" id="updateModalLabel" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="updateModalLabel">Update Category</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="post" action="{{route('updateWallpaper')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="maincategory" class="form-label">Category Name</label>
                                            <select class="form-select" name="category_id" id="maincategory" aria-label="Default select example" required>
                                                <option >Select Parent Category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="title_edit" class="form-label">Title </label>
                                            <input type="text" name="title" class="form-control" id="title_edit" placeholder="Enter Title">
                                            <input  name="wallpaper_id" type="hidden" id="wallpaper_id">

                                        </div>
                                        <div class="mb-3">
                                            <label for="wallpaper_image" class="form-label">Wallpaper Image</label>
                                            <input class="form-control" name="wallpaper_image" type="file" id="wallpaper_edit">
                                            <img src="" id="wallpaperImage_edit" height="100" width="100">
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div></form>
                            </div>
                        </div>
                    </div>

                    <table id="datatablesSimple">
                        <thead>
                        <tr>

                            <th>Category Name</th>
                            <th>Title</th>
                            <th>Wallpaper</th>
                            <th>Actions</th>

                        </tr>
                        </thead>

                        <tbody>
                        @foreach($wallpapers as $wallpaper)
                            <tr>
                                <td>{{isset($wallpaper->category->name) ? $wallpaper->category->name:'NA'}} </td>
                                <td>{{$wallpaper->title}}</td>
                                <td>
                                    @if($wallpaper->wallpaper_image == null)
                                        <p class='text-center text-danger'>Image not Uploaded</p>
                                    @else
                                        <img src="{{asset($wallpaper->wallpaper_image)}}" height="100" width="100">
                                    @endif
                                </td>
                                <td><a class="btn btn-sm" onclick="editCategory({{$wallpaper->id}})"><i class="fas fa-edit"></i></a>
                                    <a href="{{url('wallpaper/delete/'.$wallpaper->id)}}"  class="btn delete btn-sm"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                        @endforeach

`
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>
@endsection
@section('script')
    <script>
        $("#wallpaper_edit").on('change' ,function (e){
            $("#wallpaperImage_edit").attr("src", URL.createObjectURL(e.target.files[0]));
        })
        function editCategory(id) {
            $.ajax({
                url:"{{ url('wallpaper/edit/') }}"+"/"+id,
                success:function (data) {
                    console.log(data)

                    $("#wallpaper_id").val(data.id);
                    $("#maincategory").val(data.category_id)
                    $("#title_edit").val(data.title);
                    $("#wallpaperImage_edit").attr("src", data.wallpaper_image);
                    $("#updateModalLabel").modal("show");

                }
            })
        }
    </script>

@endsection
