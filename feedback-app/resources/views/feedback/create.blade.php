<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formular zpetne vazby</title>
    <style>
        :root {
            --bg-a: #f7f3e8;
            --bg-b: #d9e9f5;
            --surface: #fffffff0;
            --line: #d3d9e2;
            --text: #1d2735;
            --muted: #5f6d7e;
            --accent: #0b6e4f;
            --accent-2: #084c61;
            --danger: #b42318;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: "Segoe UI", "Gill Sans", sans-serif;
            color: var(--text);
            background: radial-gradient(circle at 0% 0%, #fff8ea 0%, transparent 34%),
                        radial-gradient(circle at 100% 0%, #e2f1ff 0%, transparent 40%),
                        linear-gradient(160deg, var(--bg-a), var(--bg-b));
            padding: 1.4rem;
        }

        .wrap {
            max-width: 980px;
            margin: 0 auto;
        }

        .panel {
            background: var(--surface);
            border: 1px solid #ffffff;
            border-radius: 20px;
            box-shadow: 0 16px 36px rgba(22, 32, 50, 0.14);
            overflow: hidden;
        }

        .hero {
            padding: 1.5rem 1.6rem 1.3rem;
            border-bottom: 1px solid var(--line);
            background: linear-gradient(120deg, #edf9f4 0%, #f8fcff 72%);
        }

        h1 {
            margin: 0;
            font-size: 1.7rem;
            letter-spacing: 0.02em;
        }

        .lead {
            margin: 0.5rem 0 0;
            color: var(--muted);
        }

        form {
            padding: 1.5rem;
        }

        fieldset {
            border: 1px solid var(--line);
            border-radius: 14px;
            padding: 1rem;
            margin: 0 0 1rem;
        }

        legend {
            padding: 0 0.45rem;
            color: var(--accent-2);
            font-weight: 700;
        }

        .hint {
            color: var(--muted);
            margin: 0 0 0.8rem;
            font-size: 0.93rem;
        }

        .row {
            display: grid;
            grid-template-columns: 1fr 110px;
            gap: 0.7rem;
            align-items: center;
            padding: 0.55rem 0;
            border-bottom: 1px dashed #e6eaf0;
        }

        .row:last-child {
            border-bottom: 0;
        }

        .options {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 0.5rem;
        }

        label {
            display: inline-flex;
            gap: 0.5rem;
            align-items: center;
        }

        select,
        textarea {
            width: 100%;
            border: 1px solid #bfc8d4;
            border-radius: 10px;
            padding: 0.58rem 0.64rem;
            font: inherit;
            background: #fff;
            color: var(--text);
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
            margin-top: 1rem;
        }

        .btn {
            border: 0;
            border-radius: 999px;
            padding: 0.72rem 1.2rem;
            font: inherit;
            font-weight: 700;
            cursor: pointer;
            color: #fff;
            background: linear-gradient(120deg, var(--accent), var(--accent-2));
        }

        .btn-secondary {
            text-decoration: none;
            border-radius: 999px;
            padding: 0.72rem 1.2rem;
            font-weight: 700;
            color: var(--accent-2);
            background: #eaf4fb;
        }

        .flash,
        .errors {
            margin: 0 0 1rem;
            border-radius: 12px;
            padding: 0.8rem 0.95rem;
        }

        .flash {
            color: #065f46;
            background: #d9fbe6;
            border: 1px solid #95e3b8;
        }

        .errors {
            color: var(--danger);
            background: #feeceb;
            border: 1px solid #f4c7c3;
        }

        .errors ul {
            margin: 0;
            padding-left: 1.2rem;
        }

        @media (max-width: 680px) {
            .row {
                grid-template-columns: 1fr;
            }

            h1 {
                font-size: 1.45rem;
            }
        }
    </style>
</head>
<body>
    <main class="wrap">
        <section class="panel">
            <header class="hero">
                <h1>Formular zpetne vazby</h1>
                <p class="lead">Pomozte nam zlepsit vyuku. Vyplneni zabere jen par minut.</p>
            </header>

            <form method="POST" action="{{ route('feedback.store', [], false) }}">
                @csrf

                @if(session('status'))
                    <div class="flash">{{ session('status') }}</div>
                @endif

                @if($errors->any())
                    <div class="errors">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <fieldset>
                    <legend>1. Uroven respondenta</legend>
                    <p class="hint">Jak byste popsali svoji uroven v oblasti webovych technologii?</p>
                    <select name="experience_level" required>
                        <option value="">Vyberte uroven</option>
                        <option value="beginner" @selected(old('experience_level') === 'beginner')>Zacatecnik - s webovymi technologiemi se teprve seznamuji</option>
                        <option value="basic" @selected(old('experience_level') === 'basic')>Mirne pokrocily - zvladam zaklady HTML/CSS a orientuji se v pojmech</option>
                        <option value="advanced" @selected(old('experience_level') === 'advanced')>Pokrocily - dokazu vytvorit jednodussi webovou aplikaci</option>
                        <option value="practitioner" @selected(old('experience_level') === 'practitioner')>Praktik - webove technologie pouzivam v praxi / zamestnani / projektech</option>
                        <option value="professional" @selected(old('experience_level') === 'professional')>Profesional - mam hlubsi zkusenosti s vyvojem webovych aplikaci</option>
                    </select>
                </fieldset>

                <fieldset>
                    <legend>2. Oblasti, ve kterych se student orientuje</legend>
                    <p class="hint">Skvele se orientuji v techto oblastech:</p>
                    <div class="options">
                        <label><input type="checkbox" name="knows_html" value="1" @checked(old('knows_html'))> HTML</label>
                        <label><input type="checkbox" name="knows_css" value="1" @checked(old('knows_css'))> CSS</label>
                        <label><input type="checkbox" name="knows_javascript" value="1" @checked(old('knows_javascript'))> JavaScript</label>
                        <label><input type="checkbox" name="knows_server_side" value="1" @checked(old('knows_server_side'))> Server-side technologie</label>
                        <label><input type="checkbox" name="knows_database" value="1" @checked(old('knows_database'))> Databaze</label>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>3. Hodnoceni na skale 0-5</legend>
                    <p class="hint">0 = vubec ne / velmi slabe, 5 = vyborne / velmi prinosne</p>

                    <div class="row">
                        <span>Prednasky byly pro me prinosne</span>
                        <select name="lectures_value_rating" required>
                            @for($i = 0; $i <= 5; $i++)
                                <option value="{{ $i }}" @selected((string) old('lectures_value_rating', '0') === (string) $i)>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="row">
                        <span>Obsah byl zajimavy</span>
                        <select name="content_interest_rating" required>
                            @for($i = 0; $i <= 5; $i++)
                                <option value="{{ $i }}" @selected((string) old('content_interest_rating', '0') === (string) $i)>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="row">
                        <span>Vyklad byl srozumitelny</span>
                        <select name="clarity_rating" required>
                            @for($i = 0; $i <= 5; $i++)
                                <option value="{{ $i }}" @selected((string) old('clarity_rating', '0') === (string) $i)>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="row">
                        <span>Tempo vyuky mi vyhovovalo</span>
                        <select name="pace_rating" required>
                            @for($i = 0; $i <= 5; $i++)
                                <option value="{{ $i }}" @selected((string) old('pace_rating', '0') === (string) $i)>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="row">
                        <span>Prakticke ukazky mi pomohly pochopit latku</span>
                        <select name="practical_examples_rating" required>
                            @for($i = 0; $i <= 5; $i++)
                                <option value="{{ $i }}" @selected((string) old('practical_examples_rating', '0') === (string) $i)>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="row">
                        <span>Vyuclujici dokazal tema dobre vysvetlit</span>
                        <select name="teacher_explanation_rating" required>
                            @for($i = 0; $i <= 5; $i++)
                                <option value="{{ $i }}" @selected((string) old('teacher_explanation_rating', '0') === (string) $i)>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="row">
                        <span>Narocnost byla primerena</span>
                        <select name="difficulty_rating" required>
                            @for($i = 0; $i <= 5; $i++)
                                <option value="{{ $i }}" @selected((string) old('difficulty_rating', '0') === (string) $i)>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="row">
                        <span>Predmet bych doporucil/a dalsim studentum</span>
                        <select name="recommendation_rating" required>
                            @for($i = 0; $i <= 5; $i++)
                                <option value="{{ $i }}" @selected((string) old('recommendation_rating', '0') === (string) $i)>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>4. Volna poznamka</legend>
                    <p class="hint">Chcete neco doplnit? Co byste zmenili, pochvalili nebo doporucili?</p>
                    <textarea name="note" maxlength="2000" placeholder="Nepovinne, max 2000 znaku">{{ old('note') }}</textarea>
                </fieldset>

                <div class="actions">
                    <button class="btn" type="submit">Odeslat odezvu</button>
                    <a class="btn-secondary" href="{{ route('feedback.index', [], false) }}">Zobrazit seznam odezev</a>
                </div>
            </form>
        </section>
    </main>
</body>
</html>
