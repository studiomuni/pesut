<html>
	<head>
		<title>Laravel</title>
		
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

		<style>
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				color: black;
				display: table;
				font-weight: 100;
				font-family: 'Lato';
			}

			.container {
				text-align: center;
				display: table-cell;
				vertical-align: middle;
			}

			.content {
				text-align: center;
				display: inline-block;
			}

			.title {
				font-size: 96px;
				margin-bottom: 40px;
			}

			.quote {
				font-size: 24px;
			}

			label{
				margin-right:20px;
			}

			form{
				background:#f5f5f5;
				padding:20px;
				border-radius:10px;
			}

			input[type="submit"]{
				background:#0098cb;
				border:0px;
				border-radius:5px;
				color:#fff;
				padding:10px;
				margin:20px auto;
			}

		</style>
	</head>
	<body>
		<div class="container">
			<div class="content">
				
				<h1>File Upload</h1>
				<form action="{{ URL::to('upload') }}" method="post" enctype="multipart/form-data">
				<div class="row clearfix">
					<div class="col-sm-6">
						<div class="form-group">
							<label> <span style="color:red">*</span>  Nama File: </label>
							<input type="text" class="form-control" name="nama" id="nama">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Description : </label>
							<input type="text" class="form-control" name="description" id="description">
						</div>
					</div>       
				</div>

				<div class="row clearfix">
					<div class="col-sm-6">
						<div class="form-group">
							<label> <span style="color:red">*</span>  Input File: </label>
							<input type="file" name="file" id="file">
						</div>
					</div>   
				</div>
			
				<div class="col-sm-12 m-t-30">
					<input type="submit" value="Upload" name="submit">
            	</div>
	
					<input type="hidden" value="{{ csrf_token() }}" name="_token">
				</form>
				<a href="/galeri"><button>Kembali</button></a>
			</div>
		</div>
	</body>
</html>