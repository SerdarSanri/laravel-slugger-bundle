Slugger Bundle for Laravel Framework

Usage:

Slugger::make($model, $title_field, $column_field)->slugify($separator, Closure $check = null, Closure $step = null);

Note: The only Eloquenty feature of $model used by the slugger is that the method $model->table() returns the Table
	  assosciated with $model

$title_field and $slug_field are optional, defaults are:

	$title_field = 'name'; //field used for slugging
	$slug_field = 'slug'; //field used to save the slug


The slugger would continue slugging till its $check fails(returns non true value)
In Each Iteration, $the next slug would be calculated using $step

Default Values of $check and $step are:

	$check = function ($self, $slug) {
			$match = $self->q()->where($self->slug_field(), '=', $slug)->first();
			return $match === null or (int) $match->id === (int) $self->model()->id;
		};


	$step = function ($self, $suffix, $separator) {
			return Str::slug($self->model()->{$self->title_field()}.' '.$suffix, $separator);
		};


They can be overriden for each $slugger->slugify() call