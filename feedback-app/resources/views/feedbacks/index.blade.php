<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seznam odezev</title>
    <style>
        :root {
            --bg-top: #f7efe2;
            --bg-bottom: #d7e6f2;
            --surface: #ffffffdd;
            --line: #d8dee6;
            --text: #1f2937;
            --muted: #6b7280;
            --accent: #c2410c;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: "Segoe UI", "Trebuchet MS", sans-serif;
            color: var(--text);
            background: radial-gradient(circle at 10% 10%, #fff8ed 0%, transparent 35%),
                        radial-gradient(circle at 90% 0%, #e7f2ff 0%, transparent 40%),
                        linear-gradient(165deg, var(--bg-top), var(--bg-bottom));
            padding: 2rem 1rem;
        }

        .wrap {
            max-width: 920px;
            margin: 0 auto;
        }

        .card {
            background: var(--surface);
            border: 1px solid #ffffff;
            border-radius: 18px;
            box-shadow: 0 14px 30px rgba(31, 41, 55, 0.12);
            overflow: hidden;
            backdrop-filter: blur(4px);
        }

        .header {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid var(--line);
        }

        .title {
            margin: 0;
            font-size: 1.55rem;
            letter-spacing: 0.02em;
        }

        .subtitle {
            margin: 0.4rem 0 0;
            color: var(--muted);
            font-size: 0.95rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead th {
            text-align: left;
            font-size: 0.8rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--muted);
            background: #fbfcfe;
            padding: 0.85rem 1.5rem;
        }

        tbody td {
            padding: 1rem 1.5rem;
            border-top: 1px solid var(--line);
            vertical-align: middle;
        }

        tbody tr:hover {
            background: #fff9f4;
        }

        .stars {
            color: var(--accent);
            font-size: 1.05rem;
            letter-spacing: 0.12em;
            font-weight: 700;
            white-space: nowrap;
        }

        .empty {
            color: #c7cdd6;
        }

        .empty-state {
            padding: 1.2rem 1.5rem 1.4rem;
            color: var(--muted);
        }

        @media (max-width: 640px) {
            .title {
                font-size: 1.3rem;
            }

            thead th,
            tbody td {
                padding: 0.8rem 0.9rem;
            }

            .stars {
                letter-spacing: 0.08em;
            }
        }
    </style>
</head>
<body>
    <main class="wrap">
        <section class="card">
            <header class="header">
                <h1 class="title">Seznam odezev</h1>
                <p class="subtitle">Kategorie lecture_value_rating je zobrazena hviezdickami.</p>
            </header>

            @if($feedbacks->isEmpty())
                <p class="empty-state">Zatim nejsou dostupne zadne odevzdane odezvy.</p>
            @else
                <table>
                    <thead>
                        <tr>
                            <th>Datum pridani</th>
                            <th>Lecture value rating</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($feedbacks as $feedback)
                            @php
                                $rating = max(0, min(5, (int) $feedback->lectures_value_rating));
                            @endphp
                            <tr>
                                <td>{{ $feedback->created_at?->format('d.m.Y H:i') }}</td>
                                <td class="stars">
                                    <span>{!! str_repeat('&#9733;', $rating) !!}</span><span class="empty">{!! str_repeat('&#9734;', 5 - $rating) !!}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </section>
    </main>
</body>
</html>
