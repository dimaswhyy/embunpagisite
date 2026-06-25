@foreach ($dataPages as $item)
  <option value="{{ $item->id }}" @if($selected == $item->id)selected="selected"@endif>
    {{ $prefix }}{{ $item->translation[0]->title }}
  </option>
  @if ($item->children->isNotEmpty())
    @include('admin.pages-option-list', [
      'dataPages' => $item->children, 
      'selected' => $selected,
      'prefix' => $prefix . $item->translation[0]->title . ' > '
    ])
  @endif
@endforeach