<!DOCTYPE html>
<html lang="en">
<?php
    $pairsRemaining = 12;
    // Streamlined array generation and merging into one cleaner layout
    $cards = array_merge(range(1, 12), range(1, 12));
    shuffle($cards);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <title>Memory Game</title>

</head>
<body>
    <div class="game-container">
        <div class="game-header">
            <h1>Memory Game</h1>
            <div class="header-info">
                <div class="clicks-container">
                    <h3>
                        <span class="clicks-label">Clicks:</span>
                        <span class="clicks-value" id="clicks">0</span>
                    </h3>
                </div>
                <div class="misses-container">
                    <h3>
                        <span class="misses-label">Misses:</span>
                        <span class="misses-value" id="misses">0</span>
                    </h3>
                </div>
                <div class="accuracy-container">
                    <h3>
                        <span class="accuracy-label">Accuracy:</span>
                        <span class="accuracy-value" id="accuracy">0</span>
                    </h3>
                </div>
                <div class="reset-container">
                    <h3>
                        <button class="button" id="reset-button" onclick="resetGame()">Reset</button>
                    </h3>
                </div>
            </div>
        </div>
        <div class="cards-container">
            <?php foreach ($cards as $card): ?>
                <div class="card-container">
                    <div class="card" onclick="flipCard(this,'<?php echo htmlspecialchars($card); ?>')">
                        <div class="card-face card-front">
                            <div class="card-content">
                                <img src="./public/assets/images/card-<?php echo htmlspecialchars($card); ?>.webp" alt="Card <?php echo htmlspecialchars($card); ?>" class="card-image">
                            </div>
                        </div>
                        <div class="card-face card-back">
                            <!-- Left empty intentionally for card background asset -->
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script src="./scripts/main.js"></script>
</body>
</html>