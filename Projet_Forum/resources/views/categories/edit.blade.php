

    <form action="{{ route('categories.update', $category->id) }}" method="post">
        @csrf
        @method('PUT')

        <div class="col-6">
            <label for="name" class="form-label">Category name</label>
            <input type="text" name="nom"  class="form-control" value="{{ $category->nom }}">
          </div>

        <div class="col-6">
            <label for="" class="form-label">Category image</label>
            <input type="file" name="image"  class="form-control">
          </div>

    
          <div class="modal-footer">
            <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Edit category</button>
        </div>
    </form>

    