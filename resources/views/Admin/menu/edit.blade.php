@extends('admin.layouts.app')

@section('content')

<h2>Edit Menu</h2>

<form action="{{ route('menus.update',$menu->id) }}"
      method="POST">

@csrf
@method('PUT')

<div class="mb-3">

<label>Title</label>

<input type="text"
       name="title"
       class="form-control"
       value="{{ $menu->title }}">

</div>

<div class="mb-3">

<label>URL</label>

<input type="text"
       name="url"
       class="form-control"
       value="{{ $menu->url }}">

</div>

<div class="mb-3">

<label>Position</label>

<input type="number"
       name="position"
       class="form-control"
       value="{{ $menu->position }}">

</div>

<div class="mb-3">

<label>Target</label>

<select name="target"
        class="form-control">

<option value="_self"
{{ $menu->target == '_self' ? 'selected' : '' }}>
Same Tab
</option>

<option value="_blank"
{{ $menu->target == '_blank' ? 'selected' : '' }}>
New Tab
</option>

</select>

</div>

<div class="mb-3">

<label>Status</label>

<select name="status"
        class="form-control">

<option value="1"
{{ $menu->status == 1 ? 'selected' : '' }}>
Active
</option>

<option value="0"
{{ $menu->status == 0 ? 'selected' : '' }}>
Inactive
</option>

</select>

</div>

<button class="btn btn-primary">

Update Menu

</button>

</form>

@endsection