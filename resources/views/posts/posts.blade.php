<!DOCTYPE html>
<html>
<head>
	<title>Posts Details</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<h1>Posts Details</h1>

		<div class="modal-body">
			Your Posts Here
		</div>

		<a href='/admin/posts/edit' class="btn btn-primary btn-xs">Edit</a>
		<a href='/admin/posts/add' class="btn btn-success btn-xs">Add Post</a>

		<form method="POST" action="/menu/delete">
			{{csrf_field()}}
			{{method_field('DELETE')}}
			
			<!-- Trigger the modal with a button -->
			<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal">Delete</button>

			<!-- Modal -->
			<div id="myModal" class="modal fade" role="dialog">
				<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>
						<div class="modal-body">
							<p>Are you sure you want to delete this post?</p>
							<button type="submit" class="btn btn-danger">Proceed</button>
							<button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
						</div>
					</div>

				</div>
			</div>
		</form>
	</div>
</body>
</html>