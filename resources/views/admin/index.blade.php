@extends('admin/adminlayout')
@section('title') Admin Index Page @endsection
@section('content')

<!-- News Add Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">News Add</h4>
      </div>
      <div class="modal-body">
        
        <form action="" method="post">
        	<input type="hidden" name="_token" value="{{csrf_token()}}">
        	<div class="form-group">
			  <label for="title">News Title:</label>
			  <input type="text" class="form-control" id="title" name="title">
			</div>

			<div class="form-group">
			  <label for="full">Full News:</label>
			  <textarea class="form-control" rows="5" id="full" name="full"></textarea>
			</div>

			<div class="form-group">
				<input type="submit" value="Save">
			</div>
        </form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>







<div class="container">
<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add News</button>

  <table class="table">
    <thead>
      <tr>
        <th>News Title</th>
        <th>Created Date</th>
        <th>Updated Date</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
		
	  @foreach($siyahi as $post)


      <tr>
        <td>{{$post->title}}</td>
        <td>{{$post->created_at}}</td>
        <td>{{$post->updated_at}}</td>
        <td><button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#{{$post->id}}">Edit News</button></td>
        <td>
        	<a href="/blog/public/admin/sil/{{ $post->id }}"  class="btn btn-info btn-md" onclick="return confirm('Are You Sure?')">Delete News</a>
        </td>
      </tr>



<!-- News Edit Modal -->
<div id="{{$post->id}}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">News Edit</h4>
      </div>
      <div class="modal-body">
        
        <form action="/blog/public/admin/edit/{{$post->id}}" method="post">
        	<input type="hidden" name="_token" value="{{csrf_token()}}">
        	<input type="hidden" name="id" value="{{$post->id}}">
        	<div class="form-group">
			  <label for="title">News Title:</label>
			  <input type="text" class="form-control" id="title" value="{{$post->title}}" name="title">
			</div>

			<div class="form-group">
			  <label for="full">Full News:</label>
			  <textarea class="form-control" rows="5" id="full" name="full">{{$post->full}}</textarea>
			</div>

			<div class="form-group">
				<input type="submit" value="Save">
			</div>
        </form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



      @endforeach
      
    </tbody>
  </table>
  {!! $siyahi->render() !!}
</div>



@endsection
