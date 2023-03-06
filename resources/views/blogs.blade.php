<?php $i = 0 ?>
@foreach($blogs->data as $blog)
<li><a href="{{ url('description/'.$i++) }}">{{ $blog->title }}</a></li>

@endforeach