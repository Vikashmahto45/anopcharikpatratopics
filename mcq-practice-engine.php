<?php include('includes/config.php'); ?>
<!DOCTYPE html>
<html lang="hi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MCQ Practice Engine: Master Literature Chapters with Interactive Quizzes</title>
    <meta name="description"
        content="Interactive MCQ practice engine for Class 10/12 Students. Test your knowledge of 65 core literature chapters with real-time feedback and board-exam patterns.">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Outfit:wght@400;700&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --glass-bg: rgba(255, 255, 255, 0.95);
            --glass-border: rgba(20, 184, 166, 0.1);
            --accent-quiz: #14b8a6;
            --bg-quiz: #f0fdfa;
        }

        body {
            background: linear-gradient(135deg, #f0fdfa 0%, #ccfbf1 100%);
            min-height: 100vh;
        }

        .quiz-container {
            max-width: 800px;
            margin: 60px auto;
            padding: 0 20px;
            font-family: 'Inter', sans-serif;
        }

        .quiz-card {
            background: var(--glass-bg);
            backdrop-filter: blur(16px);
            padding: 50px;
            border-radius: 32px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.05);
            border: 1px solid var(--glass-border);
            position: relative;
        }

        .step-indicator {
            position: absolute;
            top: 20px;
            right: 40px;
            font-weight: 700;
            color: var(--accent-quiz);
            font-size: 0.9rem;
        }

        .question-text {
            font-family: 'Outfit', sans-serif;
            font-size: 1.6rem;
            color: #1e293b;
            margin-bottom: 30px;
            line-height: 1.4;
        }

        .options-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .option-btn {
            padding: 18px 25px;
            border: 2px solid #e2e8f0;
            border-radius: 16px;
            background: white;
            cursor: pointer;
            text-align: left;
            font-size: 1rem;
            font-weight: 600;
            transition: all 0.2s ease;
            color: #475569;
        }

        .option-btn:hover {
            border-color: var(--accent-quiz);
            background: #f0fdfa;
        }

        .option-btn.correct {
            background: #dcfce7;
            border-color: #22c55e;
            color: #166534;
        }

        .option-btn.wrong {
            background: #fee2e2;
            border-color: #ef4444;
            color: #991b1b;
        }

        .feedback-box {
            margin-top: 30px;
            padding: 20px;
            border-radius: 12px;
            display: none;
        }

        .btn-next {
            margin-top: 30px;
            width: 100%;
            padding: 15px;
            background: #1e293b;
            color: white;
            border: none;
            border-radius: 12px;
            font-weight: 700;
            cursor: pointer;
            display: none;
        }

        .result-screen {
            text-align: center;
            display: none;
        }

        .score-circle {
            width: 150px;
            height: 150px;
            background: white;
            border-radius: 50%;
            margin: 0 auto 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            font-weight: 800;
            color: var(--accent-quiz);
            border: 10px solid var(--accent-quiz);
            box-shadow: 0 10px 15px -3px rgba(20, 184, 166, 0.2);
        }

        #setupScreen {
            display: block;
        }

        #quizScreen {
            display: none;
        }
    </style>
</head>

<body>

    <?php include('includes/header.php'); ?>

    <div class="quiz-container">
        <!-- SETUP SCREEN -->
        <div class="quiz-card" id="setupScreen">
            <h1 style="font-family: 'Outfit'; margin-bottom: 30px;">Choose a Practice Set</h1>
            <div class="options-list">
                <button class="option-btn" onclick="startQuiz('A Letter to God')">A Letter to God (English)</button>
                <button class="option-btn" onclick="startQuiz('Nelson Mandela')">Nelson Mandela (English)</button>
                <button class="option-btn" onclick="startQuiz('Anne Frank')">Anne Frank (English)</button>
                <button class="option-btn" onclick="startQuiz('Bade Bhai Sahab')">Bade Bhai Sahab (Hindi)</button>
            </div>
            <p style="margin-top: 30px; font-size: 0.85rem; color: #64748b;">More chapters being added daily in Phase 3
                expansion.</p>
        </div>

        <!-- QUIZ SCREEN -->
        <div class="quiz-card" id="quizScreen">
            <div class="step-indicator" id="stepText">Question 1 of 5</div>
            <div id="quizContent">
                <h2 class="question-text" id="qText">Loading question...</h2>
                <div class="options-list" id="options">
                    <!-- Options injected by JS -->
                </div>
                <div class="feedback-box" id="feedback"></div>
                <button class="btn-next" id="nextBtn" onclick="nextQuestion()">Next Question →</button>
            </div>

            <!-- RESULT SCREEN -->
            <div class="result-screen" id="resultArea">
                <div class="score-circle" id="scoreVal">0</div>
                <h2 style="font-family: 'Outfit';">Practice Complete!</h2>
                <p id="resultText">You've mastered the key concepts of this chapter.</p>
                <button class="btn-next" style="display: block; margin-top: 30px;" onclick="location.reload()">Restart
                    Engine</button>
                <a href="literature-academy.php"
                    style="display: inline-block; margin-top: 20px; color: var(--accent-quiz); font-weight: 700; text-decoration: none;">←
                    Back to Academy Hub</a>
            </div>
        </div>
    </div>

    <script>
        const questionBank = {
            'A Letter to God': [
                { q: "What did Lencho compare the raindrops to?", a: ["Silver coins", "New coins", "Pearls", "Diamonds"], c: 1, e: "Lencho called them 'new coins' – the big drops ten-cent pieces and the little ones fives." },
                { q: "What was the only hope left in the hearts of Lencho's family?", a: ["Help from neighbors", "Help from government", "Help from God", "Wait for new crops"], c: 2, e: "They believed that 'no one dies of hunger' and had firm faith in help from God." },
                { q: "How much money did Lencho receive?", a: ["100 pesos", "70 pesos", "50 pesos", "30 pesos"], c: 1, e: "He asked for 100 but found only 70 pesos in the envelope." }
            ],
            'Nelson Mandela': [
                { q: "What does 'emancipation' mean in the context of Mandela's speech?", a: ["Slavery", "Freedom from restriction", "Apartheid", "Incarceration"], c: 1, e: "Mandela spoke about 'political emancipation' meaning freedom from unjust laws." },
                { q: "According to Mandela, what is a nation's greatest wealth?", a: ["Minerals", "Gems", "Its people", "Its history"], c: 2, e: "He believed people are 'finer and truer than the purest diamonds'." }
            ],
            'Bade Bhai Sahab': [
                { q: "Bade Bhai Sahab was how many years older than the narrator?", a: ["3 years", "5 years", "2 years", "10 years"], c: 1, e: "He was 5 years older but only 3 grades ahead." },
                { q: "What was Bade Bhai Sahab's primary focus?", a: ["Kite flying", "Sports", "Studies", "Cooking"], c: 2, e: "He believed in a firm foundation and studied relentlessly, even if he failed." }
            ]
        };

        let currentSet = [];
        let currentIdx = 0;
        let score = 0;
        let answered = false;

        function startQuiz(chapter) {
            currentSet = questionBank[chapter];
            if (!currentSet) return;

            document.getElementById('setupScreen').style.display = 'none';
            document.getElementById('quizScreen').style.display = 'block';
            loadQuestion();
        }

        function loadQuestion() {
            answered = false;
            const q = currentSet[currentIdx];
            document.getElementById('stepText').innerText = `Question ${currentIdx + 1} of ${currentSet.length}`;
            document.getElementById('qText').innerText = q.q;
            document.getElementById('nextBtn').style.display = 'none';
            document.getElementById('feedback').style.display = 'none';

            const optionsArea = document.getElementById('options');
            optionsArea.innerHTML = '';
            q.a.forEach((opt, idx) => {
                const btn = document.createElement('button');
                btn.className = 'option-btn';
                btn.innerText = opt;
                btn.onclick = () => checkAnswer(idx);
                optionsArea.appendChild(btn);
            });
        }

        function checkAnswer(idx) {
            if (answered) return;
            answered = true;

            const q = currentSet[currentIdx];
            const btns = document.querySelectorAll('.option-btn');

            if (idx === q.c) {
                btns[idx].classList.add('correct');
                score++;
                showFeedback(true, q.e);
            } else {
                btns[idx].classList.add('wrong');
                btns[q.c].classList.add('correct');
                showFeedback(false, q.e);
            }

            document.getElementById('nextBtn').style.display = 'block';
        }

        function showFeedback(isCorrect, text) {
            const fb = document.getElementById('feedback');
            fb.style.display = 'block';
            fb.style.background = isCorrect ? '#dcfce7' : '#fff7ed';
            fb.style.color = isCorrect ? '#166534' : '#9a3412';
            fb.innerHTML = `<strong>${isCorrect ? 'Correct!' : 'Incorrect.'}</strong><p style="margin-top:5px; font-size:0.9rem;">${text}</p>`;
        }

        function nextQuestion() {
            currentIdx++;
            if (currentIdx < currentSet.length) {
                loadQuestion();
            } else {
                showResults();
            }
        }

        function showResults() {
            document.getElementById('quizContent').style.display = 'none';
            document.getElementById('resultArea').style.display = 'block';
            document.getElementById('stepText').style.display = 'none';

            const finalScore = Math.round((score / currentSet.length) * 100);
            document.getElementById('scoreVal').innerText = finalScore + '%';

            if (finalScore === 100) document.getElementById('resultText').innerText = "Exceptional! You have a perfect grasp of this chapter.";
            else if (finalScore >= 60) document.getElementById('resultText').innerText = "Good job! You've understood the core concepts well.";
            else document.getElementById('resultText').innerText = "Keep practicing. A quick re-read of the chapter summary will help.";
        }
    </script>

    <?php include('includes/footer.php'); ?>
</body>

</html>