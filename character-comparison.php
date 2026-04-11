<?php include('includes/config.php'); ?>
<!DOCTYPE html>
<html lang="hi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Character Comparison Engine: Literatue Academy Utility</title>
    <meta name="description"
        content="Interactive character comparison tool for Class 10/12 students. Compare literary traits, motivations, and thematic significance of famous protagonists.">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Outfit:wght@400;700&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --glass-bg: rgba(255, 255, 255, 0.95);
            --glass-border: rgba(255, 241, 242, 0.5);
            --char-1-color: #ef4444;
            --char-2-color: #3b82f6;
        }

        body {
            background: #fff5f5;
        }

        .engine-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
            font-family: 'Inter', sans-serif;
        }

        .engine-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .engine-header h1 {
            font-family: 'Outfit', sans-serif;
            font-size: 3rem;
            color: #1e293b;
        }

        .selector-grid {
            display: grid;
            grid-template-columns: 1fr auto 1fr;
            gap: 20px;
            align-items: center;
            margin-bottom: 50px;
        }

        .char-select {
            background: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            border: 2px solid transparent;
            transition: all 0.3s ease;
        }

        .char-select.left {
            border-color: var(--char-1-color);
        }

        .char-select.right {
            border-color: var(--char-2-color);
        }

        .select-input {
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            border: 1px solid #e2e8f0;
            font-weight: 600;
        }

        .vs-badge {
            background: #1e293b;
            color: white;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-weight: 800;
            font-family: 'Outfit';
        }

        .comparison-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .trait-row {
            display: grid;
            grid-template-columns: 1fr 200px 1fr;
            gap: 30px;
            align-items: center;
            margin-bottom: 20px;
        }

        .trait-title {
            text-align: center;
            font-family: 'Outfit';
            font-weight: 700;
            color: #64748b;
            text-transform: uppercase;
            font-size: 0.8rem;
        }

        .trait-data {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            font-size: 0.95rem;
            line-height: 1.6;
            min-height: 100px;
        }

        .trait-data.left {
            border-left: 4px solid var(--char-1-color);
        }

        .trait-data.right {
            border-left: 4px solid var(--char-2-color);
        }

        @media (max-width: 768px) {
            .selector-grid {
                grid-template-columns: 1fr;
            }

            .trait-row {
                grid-template-columns: 1fr;
                gap: 10px;
            }

            .vs-badge {
                display: none;
            }
        }
    </style>
</head>

<body>

    <?php include('includes/header.php'); ?>

    <div class="engine-container">
        <header class="engine-header">
            <span
                style="background: #fee2e2; color: #991b1b; padding: 4px 12px; border-radius: 20px; font-weight: 700; font-size: 0.8rem;">PHASE
                3: ACADEMY UTILITY</span>
            <h1>Character Comparison Engine</h1>
            <p>Compare traits, motivations, and significance of literary protagonists side-by-side.</p>
        </header>

        <section class="selector-grid">
            <div class="char-select left">
                <label style="color: var(--char-1-color); font-weight: 700; display: block; margin-bottom: 10px;">Select
                    Character A</label>
                <select id="charA" class="select-input" onchange="compare()"></select>
            </div>

            <div class="vs-badge">VS</div>

            <div class="char-select right">
                <label style="color: var(--char-2-color); font-weight: 700; display: block; margin-bottom: 10px;">Select
                    Character B</label>
                <select id="charB" class="select-input" onchange="compare()"></select>
            </div>
        </section>

        <main id="comparisonArea">
            <!-- Trait rows injected by JS -->
        </main>
    </div>

    <script>
        const characters = {
            'Lencho': {
                chapter: 'A Letter to God',
                traits: 'Unwavering faith, Naive, Hardworking',
                motivation: 'To save his family from starvation after the hailstorm.',
                outlook: 'Extremely optimistic/spiritual - believes God will directly send money.',
                conflict: 'Man vs Nature (hailstorm) and Man vs Man (ironic distrust of post office employees).'
            },
            'Postmaster': {
                chapter: 'A Letter to God',
                traits: 'Benevolent, Empathetic, Fat but Amiable',
                motivation: 'To preserve Lencho\'s faith in God by sending him money.',
                outlook: 'Realistic but kind - understands the power of faith despite the absurdity.',
                conflict: 'Internal resolve to help a stranger without any personal gain.'
            },
            'Nelson Mandela': {
                chapter: 'Long Walk to Freedom',
                traits: 'Resilient, Wise, Dignified',
                motivation: 'To achieve political emancipation for all South Africans.',
                outlook: 'Visionary - believes that the oppressor is as much a prisoner as the oppressed.',
                conflict: 'Self vs System (Apartheid) - overcoming decades of incarceration.'
            },
            'Valli': {
                chapter: 'Madam Rides the Bus',
                traits: 'Independent, Curious, Meticulous Planner',
                motivation: 'To experience the world outside her village via a bus ride.',
                outlook: 'Maturity beyond her years - encounters the reality of death (the dead cow).',
                conflict: 'Childhood wonder vs The harsh reality of existence.'
            },
            'Anne Frank': {
                chapter: 'Diary of a Young Girl',
                traits: 'Introspective, Talkative, Sensitive',
                motivation: 'To find a true friend in her diary "Kitty" and survive the Annex.',
                outlook: 'Observational - high emotional intelligence reflected in her analysis of adults.',
                conflict: 'Internal struggle of a teenager trapped in wartime claustrophobia.'
            }
        };

        const traits = [
            { id: 'chapter', label: 'Chapter/Origin' },
            { id: 'traits', label: 'Key Personality Traits' },
            { id: 'motivation', label: 'Primary Motivation' },
            { id: 'outlook', label: 'Philosophical Outlook' },
            { id: 'conflict', label: 'Central Conflict' }
        ];

        function init() {
            const selectA = document.getElementById('charA');
            const selectB = document.getElementById('charB');

            Object.keys(characters).forEach((name, index) => {
                const optA = new Option(name, name);
                const optB = new Option(name, name);
                selectA.add(optA);
                selectB.add(optB);
                if (index === 1) selectB.selectedIndex = 1;
            });

            compare();
        }

        function compare() {
            const charA = characters[document.getElementById('charA').value];
            const charB = characters[document.getElementById('charB').value];
            const area = document.getElementById('comparisonArea');

            area.innerHTML = traits.map(trait => `
                <div class="trait-row">
                    <div class="trait-data left">${charA[trait.id]}</div>
                    <div class="trait-title">${trait.label}</div>
                    <div class="trait-data right">${charB[trait.id]}</div>
                </div>
            `).join('');
        }

        init();
    </script>

    <?php include('includes/footer.php'); ?>
</body>

</html>