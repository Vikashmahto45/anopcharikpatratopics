<?php include('includes/config.php'); ?>
<!DOCTYPE html>
<html lang="hi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Universal Format Switcher: Master Any Letter Format Instantly</title>
    <meta name="description"
        content="The ultimate interactive format switcher for students. Toggle between Informal and Formal letter formats, understand marking schemes, and master board exam writing.">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Outfit:wght@400;700&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --glass-bg: rgba(255, 255, 255, 0.9);
            --glass-border: rgba(255, 255, 255, 0.2);
            --accent-primary: #3b82f6;
            --accent-secondary: #8b5cf6;
            --text-main: #1e293b;
        }

        body {
            background: linear-gradient(135deg, #f8fafc 0%, #eff6ff 100%);
            min-height: 100vh;
        }

        .tool-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
            font-family: 'Inter', sans-serif;
        }

        .tool-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .tool-header h1 {
            font-family: 'Outfit', sans-serif;
            font-size: 3rem;
            background: linear-gradient(to right, var(--accent-primary), var(--accent-secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 10px;
        }

        .control-panel {
            background: var(--glass-bg);
            backdrop-filter: blur(12px);
            border: 1px solid var(--glass-border);
            padding: 30px;
            border-radius: 24px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05);
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
            justify-content: center;
            margin-bottom: 40px;
        }

        .control-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .control-label {
            font-weight: 700;
            font-size: 0.9rem;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .select-btn {
            padding: 12px 24px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            background: white;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .select-btn.active {
            border-color: var(--accent-primary);
            background: #eff6ff;
            color: var(--accent-primary);
        }

        .display-area {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            align-items: start;
        }

        .format-display {
            background: white;
            padding: 50px;
            border-radius: 30px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            position: relative;
            min-height: 600px;
        }

        .format-line {
            padding: 10px;
            margin: 5px 0;
            border-radius: 8px;
            transition: all 0.3s ease;
            position: relative;
        }

        .format-line.highlight {
            background: #f0f9ff;
            border-left: 4px solid var(--accent-primary);
        }

        .marking-tag {
            position: absolute;
            right: -20px;
            top: 50%;
            transform: translateY(-50%);
            background: var(--accent-secondary);
            color: white;
            font-size: 0.7rem;
            padding: 2px 8px;
            border-radius: 4px;
            font-weight: 700;
        }

        .explanation-card {
            background: var(--glass-bg);
            padding: 30px;
            border-radius: 24px;
            border: 1px solid var(--glass-border);
        }

        .explanation-item {
            margin-bottom: 25px;
        }

        .explanation-item h3 {
            color: var(--accent-primary);
            font-size: 1.1rem;
            margin-bottom: 8px;
        }

        .explanation-item p {
            color: #475569;
            font-size: 0.95rem;
            line-height: 1.6;
        }

        @media (max-width: 968px) {
            .display-area {
                grid-template-columns: 1fr;
            }

            .tool-header h1 {
                font-size: 2.2rem;
            }
        }
    </style>
</head>

<body>

    <?php include('includes/header.php'); ?>

    <div class="tool-container">
        <header class="tool-header">
            <span
                style="background: #dbeafe; color: #1e40af; padding: 4px 12px; border-radius: 20px; font-weight: 700; font-size: 0.8rem;">PHASE
                3: ACADEMY UTILITY</span>
            <h1>Universal Format Switcher</h1>
            <p>Select your letter type and recipient to see the perfect board-exam format instantly.</p>
        </header>

        <section class="control-panel">
            <div class="control-group">
                <span class="control-label">Category</span>
                <div style="display: flex; gap: 10px;">
                    <button class="select-btn active" onclick="setCategory('informal')">Informal (Anopcharik)</button>
                    <button class="select-btn" onclick="setCategory('formal')">Formal (Aupcharik)</button>
                </div>
            </div>
            <div class="control-group">
                <span class="control-label">Recipient</span>
                <select id="recipientSelect" class="select-btn" onchange="updateFormat()" style="min-width: 200px;">
                    <!-- Options populated by JS -->
                </select>
            </div>
        </section>

        <main class="display-area">
            <div class="format-display" id="skeletonView">
                <!-- Skeleton rendered by JS -->
            </div>

            <div class="explanation-card">
                <h2 style="font-family: 'Outfit', sans-serif; margin-bottom: 20px;">Why This Format?</h2>
                <div id="explanationContent">
                    <!-- Explanations populated by JS -->
                </div>
                <div
                    style="margin-top: 30px; padding: 20px; background: #fff7ed; border-radius: 12px; border: 1px solid #fed7aa;">
                    <p style="font-size: 0.85rem; color: #9a3412;"><strong>Pro Tip:</strong> Board examiners look for
                        these specific "anchors" to award the full 5 marks. Missing even a simple salutation can cost
                        0.5 marks.</p>
                </div>
            </div>
        </main>
    </div>

    <script>
        const formatData = {
            informal: {
                recipients: ['Father/Mother', 'Friend', 'Younger Sibling'],
                skeleton: (recipient) => `
                    <div class="format-line highlight">Sender's Address (आपका पता)<div class="marking-tag">0.5M</div></div>
                    <div class="format-line">Date (दिनांक)</div>
                    <div class="format-line highlight">${recipient === 'Younger Sibling' ? 'Priy (प्रिय) [Name]' : 'Pujya (पूज्य) / Sadar Pranam'}</div>
                    <div class="format-line">Body Paragraph 1: Opening/Health (हाल-चाल)</div>
                    <div class="format-line">Body Paragraph 2: Main Subject (विषय-वस्तु)</div>
                    <div class="format-line">Body Paragraph 3: Closing/Regards (अभिवादन)</div>
                    <div class="format-line highlight">${recipient === 'Father/Mother' ? 'Apka Beta/Beti' : 'Tumhara Mitra'}<div class="marking-tag">0.5M</div></div>
                    <div class="format-line">Name (नाम)</div>
                `,
                explanations: {
                    'Father/Mother': [
                        { h: 'Address & Date', p: 'Start with your own address. No need for the recipient\'s address in informal letters.' },
                        { h: 'Salutation', p: 'Use "Pujya" (Respectful) for parents. Avoid using their names.' },
                        { h: 'Subscription', p: 'Use "Apka Beta/Beti" to show the relationship clearly.' }
                    ]
                }
            },
            formal: {
                recipients: ['Editor', 'Principal', 'Municipal Commissioner'],
                skeleton: (recipient) => `
                    <div class="format-line highlight">Sender's Address (प्रेषक का पता)</div>
                    <div class="format-line">Date (दिनांक)</div>
                    <div class="format-line highlight">Recipient Designation (प्राप्तकर्ता का पद)</div>
                    <div class="format-line">Recipient Address (पता)</div>
                    <div class="format-line highlight" style="background: #fffbeb; border-color: #f59e0b;">Subject: (विषय: संक्षिप्त और स्पष्ट)<div class="marking-tag">1M</div></div>
                    <div class="format-line">Salutation (महोदय/महोदया)</div>
                    <div class="format-line">Body Paragraph 1: Purpose (उद्देश्य)</div>
                    <div class="format-line">Body Paragraph 2: Details (विवरण)</div>
                    <div class="format-line">Body Paragraph 3: Expectations (अपेक्षा)</div>
                    <div class="format-line">Complimentary Close (सधन्यवाद)</div>
                    <div class="format-line highlight">Bhavdiye (भवदीय) / Prarthana (प्रार्थना)<div class="marking-tag">0.5M</div></div>
                    <div class="format-line">Name/Signature</div>
                `,
                explanations: {
                    'Editor': [
                        { h: 'The Subject Line', p: 'Crucial for formal letters. It must be a single line summarizing the problem.' },
                        { h: 'Public Interest', p: 'Clearly state that you are writing to highlight a public grievance in their esteemed newspaper.' },
                        { h: 'Subscription', p: 'Use "Bhavdiye". Avoid overly personal closings.' }
                    ]
                }
            }
        };

        let currentCategory = 'informal';

        function setCategory(cat) {
            currentCategory = cat;
            document.querySelectorAll('.select-btn').forEach(btn => {
                if (btn.innerText.toLowerCase().includes(cat)) btn.classList.add('active');
                else btn.classList.remove('active');
            });

            const select = document.getElementById('recipientSelect');
            select.innerHTML = '';
            formatData[cat].recipients.forEach(r => {
                const opt = document.createElement('option');
                opt.value = r;
                opt.innerText = r;
                select.appendChild(opt);
            });
            updateFormat();
        }

        function updateFormat() {
            const recipient = document.getElementById('recipientSelect').value;
            const skeletonArea = document.getElementById('skeletonView');
            const explanationArea = document.getElementById('explanationContent');

            skeletonArea.innerHTML = formatData[currentCategory].skeleton(recipient);

            // Default to first recipient explanations if specific not found
            const expl = formatData[currentCategory].explanations[recipient] || formatData[currentCategory].explanations[Object.keys(formatData[currentCategory].explanations)[0]];

            explanationArea.innerHTML = expl.map(item => `
                <div class="explanation-item">
                    <h3>${item.h}</h3>
                    <p>${item.p}</p>
                </div>
            `).join('');
        }

        // Init
        setCategory('informal');
    </script>

    <?php include('includes/footer.php'); ?>

</body>

</html>