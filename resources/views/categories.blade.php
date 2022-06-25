<div class="container">
	<nav class="navbar navbar-default" role="navigation">
		 <ul class="nav navbar-nav navbar-left">
			@foreach($categories as $item)
			@if($item->children->count() > 0)
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					{{$item->title}}
					<b class="caret"></b></a>
					<ul class="dropdown-menu">
						@foreach($item->children as $submenu)
						<li><a href="#">{{$submenu->title}}</a></li>
						@endforeach
					</ul>
				</li>
				@else
				<li><a href="">{{$item->title}}</a></li>
				@endif
				@endforeach
			</ul>
		</nav>
</div>