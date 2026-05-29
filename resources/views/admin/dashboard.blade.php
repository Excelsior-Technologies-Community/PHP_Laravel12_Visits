<h1>Admin Dashboard</h1>
<p>Total Posts: {{ $totalPosts }}</p>
<p>Total Visits: {{ $totalVisits }}</p>

<h3>Popular Posts</h3>
<ul>
    @foreach($popularPosts as $post)
        <li>{{ $post->title }} - {{ $post->visits_count }} visits</li>
    @endforeach
</ul>