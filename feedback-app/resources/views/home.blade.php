<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback App</title>
    <style>
        :root {
            --bg-a: #f5ecd8;
            --bg-b: #d9e9f7;
            --surface: #fffffff2;
            --line: #d9e0eb;
            --text: #1f2937;
            --muted: #607084;
            --accent: #0b6e4f;
            --accent-2: #0b4f6c;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: "Segoe UI", "Trebuchet MS", sans-serif;
            color: var(--text);
            background: radial-gradient(circle at 8% 10%, #fff8ea 0%, transparent 30%),
                        radial-gradient(circle at 92% 0%, #e6f2ff 0%, transparent 38%),
                        linear-gradient(160deg, var(--bg-a), var(--bg-b));
            padding: 1.2rem;
        }

        .shell {
            max-width: 1020px;
            margin: 0 auto;
            background: var(--surface);
            border: 1px solid #fff;
            border-radius: 20px;
            box-shadow: 0 18px 40px rgba(23, 35, 53, 0.14);
            overflow: hidden;
        }

        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
            padding: 1rem 1.4rem;
            border-bottom: 1px solid var(--line);
            background: linear-gradient(120deg, #eef8f5 0%, #f3f9ff 75%);
        }

        .brand {
            margin: 0;
            font-size: 1.1rem;
            letter-spacing: 0.03em;
        }

        .menu {
            display: flex;
            gap: 0.6rem;
            flex-wrap: wrap;
        }

        .menu a {
            text-decoration: none;
            border-radius: 999px;
            padding: 0.58rem 0.9rem;
            font-weight: 700;
            color: #fff;
            background: linear-gradient(120deg, var(--accent), var(--accent-2));
        }

        .hero {
            padding: 2.2rem 1.4rem 2rem;
        }

        .hero h1 {
            margin: 0;
            font-size: clamp(1.7rem, 4.2vw, 2.3rem);
            line-height: 1.2;
        }

        .hero p {
            margin: 0.8rem 0 0;
            color: var(--muted);
            max-width: 64ch;
            line-height: 1.5;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 0.9rem;
            padding: 0 1.4rem 1.5rem;
        }

        .card {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 14px;
            padding: 1rem;
        }

        .card h2 {
            margin: 0;
            font-size: 1.05rem;
            color: #0b4f6c;
        }

        .card p {
            margin: 0.55rem 0 0;
            color: var(--muted);
            font-size: 0.96rem;
            line-height: 1.45;
        }

        @media (max-width: 640px) {
            .nav {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="shell">
        <header class="nav">
            <p class="brand">Feedback App</p>
            <nav class="menu" aria-label="Hlavni navigace">
                <a href="/create-feedback">Vyplnit feedback</a>
                <a href="/feedbacks">Seznam feedbacku</a>
            </nav>
        </header>

        <main class="hero">
            <h1>Vitejte v aplikaci pro zpetnou vazbu</h1>
            <p>
                Na teto strance rychle vytvorite hodnoceni vyuky a muzete si projit odeslane odpovedi.
                Pouzijte navigaci nahore pro vyplneni noveho formulare nebo pro zobrazeni prehledu vsech feedbacku.
            </p>
        </main>

        <section class="cards" aria-label="Rychle volby">
            <article class="card">
                <h2>Vyplnit novy feedback</h2>
                <p>Otevrete formular na adrese /create-feedback a odeslete sve hodnoceni v nekolika krocich.</p>
            </article>
            <article class="card">
                <h2>Projit odeslane odpovedi</h2>
                <p>V prehledu /feedbacks muzete kliknout na kazdy zaznam a otevrit jeho detail.</p>
            </article>
        </section>
    </div>
</body>
</html>
