<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail odezvy #{{ $feedback->id }}</title>
    <style>
        :root {
            --bg-a: #f4efe6;
            --bg-b: #d8e9f9;
            --surface: #fffffff0;
            --line: #d5ddea;
            --text: #1c2635;
            --muted: #5e6c7e;
            --ok: #0f766e;
            --accent: #0f4c81;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: "Segoe UI", "Trebuchet MS", sans-serif;
            color: var(--text);
            background: radial-gradient(circle at 0% 0%, #fff8e8 0%, transparent 36%),
                        radial-gradient(circle at 100% 0%, #e3f2ff 0%, transparent 42%),
                        linear-gradient(160deg, var(--bg-a), var(--bg-b));
            padding: 1.4rem;
        }

        .wrap {
            max-width: 920px;
            margin: 0 auto;
        }

        .card {
            background: var(--surface);
            border: 1px solid #fff;
            border-radius: 18px;
            box-shadow: 0 16px 34px rgba(20, 30, 48, 0.14);
            overflow: hidden;
        }

        .head {
            padding: 1.35rem 1.5rem;
            border-bottom: 1px solid var(--line);
            background: linear-gradient(120deg, #eef8ff 0%, #f6fafc 74%);
        }

        h1 {
            margin: 0;
            font-size: 1.55rem;
            letter-spacing: 0.02em;
        }

        .meta {
            margin: 0.45rem 0 0;
            color: var(--muted);
        }

        .section {
            padding: 1.2rem 1.5rem;
            border-top: 1px solid var(--line);
        }

        .section:first-of-type {
            border-top: 0;
        }

        .section h2 {
            margin: 0 0 0.8rem;
            font-size: 1.05rem;
            color: var(--accent);
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.55rem 1rem;
        }

        .row {
            display: grid;
            grid-template-columns: 1fr auto;
            gap: 0.8rem;
            padding: 0.5rem 0;
            border-bottom: 1px dashed #e2e9f0;
        }

        .row:last-child {
            border-bottom: 0;
        }

        .label {
            color: var(--muted);
        }

        .stars {
            color: #c2410c;
            letter-spacing: 0.09em;
            font-weight: 700;
            white-space: nowrap;
        }

        .yes {
            color: var(--ok);
            font-weight: 700;
        }

        .no {
            color: #b42318;
            font-weight: 700;
        }

        .note {
            margin: 0;
            white-space: pre-wrap;
            line-height: 1.45;
        }

        .actions {
            padding: 1.15rem 1.5rem 1.4rem;
            border-top: 1px solid var(--line);
            display: flex;
            gap: 0.6rem;
            flex-wrap: wrap;
        }

        .btn {
            text-decoration: none;
            padding: 0.66rem 1.1rem;
            border-radius: 999px;
            font-weight: 700;
        }

        .btn-primary {
            color: #fff;
            background: linear-gradient(120deg, #0f766e, #0f4c81);
        }

        .btn-secondary {
            color: #0f4c81;
            background: #e9f2fb;
        }

        @media (max-width: 700px) {
            .grid {
                grid-template-columns: 1fr;
            }

            .row {
                grid-template-columns: 1fr;
                gap: 0.35rem;
            }
        }
    </style>
</head>
<body>
    @php
        $experienceLabels = [
            'beginner' => 'Zacatecnik',
            'basic' => 'Mirne pokrocily',
            'advanced' => 'Pokrocily',
            'practitioner' => 'Praktik',
            'professional' => 'Profesional',
        ];

        $boolLabel = fn (bool $value) => $value ? 'Ano' : 'Ne';
        $boolClass = fn (bool $value) => $value ? 'yes' : 'no';
        $stars = fn (int $rating) => str_repeat('★', max(0, min(5, $rating))) . str_repeat('☆', 5 - max(0, min(5, $rating)));
    @endphp

    <main class="wrap">
        <article class="card">
            <header class="head">
                <h1>Vase odeslana zpetna vazba #{{ $feedback->id }}</h1>
                <p class="meta">Odeslano: {{ $feedback->created_at?->format('d.m.Y H:i') }}</p>
            </header>

            <section class="section">
                <h2>Uroven respondenta</h2>
                <div class="row">
                    <span class="label">Uroven webovych technologii</span>
                    <strong>{{ $experienceLabels[$feedback->experience_level] ?? $feedback->experience_level }}</strong>
                </div>
            </section>

            <section class="section">
                <h2>Oblasti orientace</h2>
                <div class="grid">
                    <div class="row"><span class="label">HTML</span><span class="{{ $boolClass((bool) $feedback->knows_html) }}">{{ $boolLabel((bool) $feedback->knows_html) }}</span></div>
                    <div class="row"><span class="label">CSS</span><span class="{{ $boolClass((bool) $feedback->knows_css) }}">{{ $boolLabel((bool) $feedback->knows_css) }}</span></div>
                    <div class="row"><span class="label">JavaScript</span><span class="{{ $boolClass((bool) $feedback->knows_javascript) }}">{{ $boolLabel((bool) $feedback->knows_javascript) }}</span></div>
                    <div class="row"><span class="label">Server-side technologie</span><span class="{{ $boolClass((bool) $feedback->knows_server_side) }}">{{ $boolLabel((bool) $feedback->knows_server_side) }}</span></div>
                    <div class="row"><span class="label">Databaze</span><span class="{{ $boolClass((bool) $feedback->knows_database) }}">{{ $boolLabel((bool) $feedback->knows_database) }}</span></div>
                </div>
            </section>

            <section class="section">
                <h2>Hodnoceni 0-5</h2>
                <div class="row"><span class="label">Prednasky byly pro me prinosne</span><span class="stars">{{ $stars((int) $feedback->lectures_value_rating) }}</span></div>
                <div class="row"><span class="label">Obsah byl zajimavy</span><span class="stars">{{ $stars((int) $feedback->content_interest_rating) }}</span></div>
                <div class="row"><span class="label">Vyklad byl srozumitelny</span><span class="stars">{{ $stars((int) $feedback->clarity_rating) }}</span></div>
                <div class="row"><span class="label">Tempo vyuky mi vyhovovalo</span><span class="stars">{{ $stars((int) $feedback->pace_rating) }}</span></div>
                <div class="row"><span class="label">Prakticke ukazky mi pomohly pochopit latku</span><span class="stars">{{ $stars((int) $feedback->practical_examples_rating) }}</span></div>
                <div class="row"><span class="label">Vyuclujici dokazal tema dobre vysvetlit</span><span class="stars">{{ $stars((int) $feedback->teacher_explanation_rating) }}</span></div>
                <div class="row"><span class="label">Narocnost byla primerena</span><span class="stars">{{ $stars((int) $feedback->difficulty_rating) }}</span></div>
                <div class="row"><span class="label">Predmet bych doporucil/a dalsim studentum</span><span class="stars">{{ $stars((int) $feedback->recommendation_rating) }}</span></div>
            </section>

            <section class="section">
                <h2>Volna poznamka</h2>
                <p class="note">{{ $feedback->note ?: 'Bez poznamky.' }}</p>
            </section>

            <div class="actions">
                <a class="btn btn-primary" href="/create-feedback">Vyplnit dalsi formular</a>
                <a class="btn btn-secondary" href="/feedbacks">Prehled odezev</a>
            </div>
        </article>
    </main>
</body>
</html>
