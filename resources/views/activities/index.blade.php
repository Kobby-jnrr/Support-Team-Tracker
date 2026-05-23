<h1>Activities</h1>

<a href="/activities/create">
    Create New Activity
</a>

<hr>

@foreach($activities as $activity)

    <h3>{{ $activity->title }}</h3>

    <p>{{ $activity->description }}</p>

    <hr>

@endforeach