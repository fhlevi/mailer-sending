@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form action="{{ route('daftar_hadir.store') }}" method="POST"> 
				{{ csrf_field() }}
				<div class="form-group">
					<div class="col-md-12">
						<label>Name <span>*</span></label>
						<input type="text" name="name" class="form-control" />
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
						<label>Company <span>*</span></label>
						<input type="text" name="company" class="form-control" />
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
						<label>Phone Number <span>*</span></label>
						<input type="text" name="phone" class="form-control" />
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
						<label>Email <span>*</span></label>
						<input type="email" name="email" class="form-control" />
					</div>
				</div>
				<div class="col-md-12" style="padding: 10px;">
					<button class="btn btn-primary">Submit</button>	
				</div>
			</form>
		</div>
	</div>
</div>
@endsection