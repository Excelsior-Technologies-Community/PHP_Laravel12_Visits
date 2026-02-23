<!DOCTYPE html>
<html>
<head>
    <title>Posts</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        /* General Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            color: #333;
            margin: 0;
            padding: 0;
        }

        /* Header */
        h1 {
            text-align: center;
            margin-top: 40px;
            color: #fff;
            background: linear-gradient(90deg, #1e3a8a, #2563eb); /* Dark to lighter blue */
            padding: 25px 0;
            border-radius: 10px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.1);
            font-size: 2.2em;
        }

        /* Posts list */
        ul {
            list-style: none;
            padding: 0;
            max-width: 900px;
            margin: 30px auto;
        }

        /* Post card */
        li {
            background-color: #ffffff;
            border-left: 6px solid #2563eb; /* professional blue */
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.08);
            padding: 25px 20px;
            margin-bottom: 25px;
            transition: transform 0.25s, box-shadow 0.25s;
        }

        li:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }

        h2 {
            margin-top: 0;
            color: #1f2937;
            font-size: 1.6em;
        }

        p {
            line-height: 1.7;
            color: #4b5563;
            font-size: 1em;
        }

        /* Visits badges */
        .visits {
            display: inline-flex;
            align-items: center;
            margin-top: 15px;
            padding: 6px 12px;
            border-radius: 25px;
            font-weight: bold;
            font-size: 0.95em;
        }

        .total-visits {
            background-color: #60a5fa; /* Light blue */
            color: #1e3a8a;
            margin-right: 10px;
        }

        .unique-visits {
            background-color: #34d399; /* Mint green */
            color: #065f46;
        }

        .visits i {
            margin-right: 6px;
        }

        /* Responsive */
        @media (max-width: 600px) {
            li {
                padding: 20px;
            }

            h1 {
                font-size: 1.8em;
            }

            h2 {
                font-size: 1.3em;
            }
        }
    </style>
</head>
<body>
    <h1>Posts Dashboard</h1>
    @if($posts->count())
        <ul>
            @foreach($posts as $post)
                <li>
                    <h2>{{ $post->title }}</h2>
                    <p>{{ $post->body }}</p>
                    <span class="visits total-visits"><i class="fas fa-eye"></i> Total Visits: {{ $post->totalVisits }}</span>
                    <span class="visits unique-visits"><i class="fas fa-user-check"></i> Unique Visits: {{ $post->uniqueVisits }}</span>
                </li>
            @endforeach
        </ul>
    @else
        <p style="text-align: center; color: #6b7280; margin-top: 20px;">No posts found.</p>
    @endif
</body>
</html>