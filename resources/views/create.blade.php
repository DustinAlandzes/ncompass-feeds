{{ Form::model($feed, array('route' => array('feed.store'))) }}
{{ Form::text('url') }}
{{ Form::select('type', array('rss', 'atom', 'json', 'facebook')) }}
{{ Form::close() }}