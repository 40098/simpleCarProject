<div class="editForm">
    <div class="alert-danger" id="errors"></div>
    <form action="{{ route('car.update', $car->id) }}" id="editForm">
    @method('PUT')
    @csrf
    <div class="form-group">
        <label for="brand">Brand</label>
        <select name="brand" class=" form-select">
            @forelse ($car->getBrands() as $brandReference => $brandNicename)
                <option value="{{$brandReference}}" @if($car->brand== $brandReference) selected @endif>{{$brandNicename}}</option>
            @empty
                <option value="" selected>No brands found</option>
            @endforelse
        </select>
    </div>
    <div class="form-group">
        <label for="type">Type</label>
        <input type="text" name="type" class="form-control" value="{{$car->type}}">
    </div>
    <div class="form-group">
        <label for="comment">Comment</label>
        <textarea name="comment" id="comment" rows="10">{!!$car->comment!!}</textarea>
    </div>
</form>
  <script>
    tinymce.init({
      selector: 'textarea',
      plugins: '',
      toolbar: 'undo redo | formatselect | ' +
        'bold italic backcolor | alignleft aligncenter ' +
        'alignright alignjustify | bullist numlist outdent indent | ' +
        'removeformat | help',
      toolbar_mode: 'floating',
   });
  </script>
</div>
