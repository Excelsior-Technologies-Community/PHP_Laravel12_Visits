<!DOCTYPE html>
<html>
<head>
    <title>Post Detail</title>

    <style>
        body {
            font-family: Arial;
            background: #f4f6fb;
            padding: 40px;
        }

        .card {
            background: white;
            padding: 30px;
            max-width: 700px;
            margin: auto;
            border-radius: 10px;
        }

        h1 {
            color: #2563eb;
        }

        .badge {
            padding: 5px 10px;
            border-radius: 20px;
            margin-right: 10px;
        }

        .total { background: #93c5fd; }
        .unique { background: #86efac; }

        a {
            display: inline-block;
            margin-top: 20px;
            color: #2563eb;
        }
    </style>
</head>
<body>

<div class="card">

    <h1>{{ $post->title }}</h1>

    <p>{{ $post->body }}</p>

    <p>
        <span class="badge total">Total Visits: {{ $post->total_visits }}</span>
        <span class="badge unique">Unique Visits: {{ $post->unique_visits }}</span>
    </p>

    <a href="/">← Back</a>

</div>

</body>
</html>