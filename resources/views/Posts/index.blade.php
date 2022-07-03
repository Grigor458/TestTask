@extends('layouts.app')

@section('content')
    <div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                data-whatever="@getbootstrap">Create Post
        </button>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Post Name:</label>
                                <select name="categoryId" id="">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Post Name:</label>
                                <input type="text" class="form-control" id="recipient-name" name="title">
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01" name="image">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save Post</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div style="display: grid;grid-template-columns: repeat(4, 1fr);
  gap: 10px;">
        @foreach($posts as $post)


            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{asset('storage/images/' . $post->image) }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"> {{$post->title}}</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <div><p>Tags-{{$post->tags_count}}</p></div>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
