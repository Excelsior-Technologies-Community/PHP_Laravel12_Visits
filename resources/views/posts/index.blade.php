<!DOCTYPE html>
<html>
<head>
    <title>Posts</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 40px;
            color: #fff;
            background: linear-gradient(90deg, #1e3a8a, #2563eb);
            padding: 25px 0;
            border-radius: 10px;
            font-size: 2.2em;
        }

        input {
            display: block;
            margin: 20px auto;
            padding: 10px;
            width: 50%;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        ul {
            list-style: none;
            padding: 0;
            max-width: 900px;
            margin: 30px auto;
        }

        li {
            background-color: #ffffff;
            border-left: 6px solid #2563eb;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.08);
            padding: 25px 20px;
            margin-bottom: 25px;
            transition: 0.3s;
        }

        li:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }

        h2 {
            margin: 0;
            font-size: 1.6em;
        }

        h2 a {
            text-decoration: none;
            color: #1f2937;
        }

        h2 a:hover {
            color: #2563eb;
        }

        p {
            color: #4b5563;
            line-height: 1.7;
        }

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
            background-color: #60a5fa;
            color: #1e3a8a;
            margin-right: 10px;
        }

        .unique-visits {
            background-color: #34d399;
            color: #065f46;
        }
    </style>
</head>

<body>

<h1>Posts Dashboard</h1>

<!-- 🔥 SEARCH BOX -->
<input type="text" id="search" placeholder="Search posts...">

<ul id="postList">
    @foreach($posts as $post)
        <li>
            <!-- CLICKABLE POST -->
            <h2>
                <a href="/post/{{ $post->id }}">
                    {{ $post->title }}
                </a>
            </h2>

            <p>{{ $post->body }}</p>

            <!-- VISITS (correct DB fields) -->
            <span class="visits total-visits">
                <i class="fas fa-eye"></i>
                Total Visits: {{ $post->total_visits }}
            </span>

            <span class="visits unique-visits">
                <i class="fas fa-user-check"></i>
                Unique Visits: {{ $post->unique_visits }}
            </span>
        </li>
    @endforeach
</ul>

<!-- 🔥 AJAX SEARCH -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$('#search').on('keyup', function () {
    let query = $(this).val();

    $.ajax({
        url: "/search-posts",
        type: "GET",
        data: { query: query },
        success: function (data) {

            let html = '';

            data.forEach(post => {
                html += `
                <li>
                    <h2>
                        <a href="/post/${post.id}">
                            ${post.title}
                        </a>
                    </h2>
                    <p>${post.body}</p>
                </li>`;
            });

            $('#postList').html(html);
        }
    });
});
</script>

</body>
</html>