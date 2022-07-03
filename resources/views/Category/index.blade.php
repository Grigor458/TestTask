@extends('layouts.app')

@section('content')

    <div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                data-whatever="@getbootstrap">Create Category
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
                        <form action="{{route('category.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Category Name:</label>
                                <input type="text" class="form-control" id="recipient-name" name="title">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save Category</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>




    <div class="container">
        <div class="row">
            <ul class="list-group">
                @foreach ($categories as $category)
                    <li class="list-group-item">   {{ $category->title }}</li>
                @endforeach
            </ul>
        </div>

    </div>

    {{ $categories->links() }}
    <script>
        $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('New message to ' + recipient)
            modal.find('.modal-body input').val(recipient)
        })
    </script>
@endsection()
