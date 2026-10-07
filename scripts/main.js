
let cardsTurned = 0; 
let flippedCards = [];
let clickedCard = {};
let lockBoard = false;
let clicks = 0; // Initialize clicks counter
let misses = 0; // Initialize misses counter
let accuracy = 0


function flipCard(element, cardValue) {    
  if (lockBoard || element.classList.contains('card-blank') || element.classList.contains('card-reveal')) return; // Prevent flipping if the board is locked
   
   
    element.classList.add('card-reveal');

    cardsTurned++;
    clickedCard = {element, cardValue};
    flippedCards.push(clickedCard);

    if (cardsTurned >= 2) {
      lockBoard = true;

      clicks++;// increment the clicks counter every time two cards are flipped
      document.getElementById('clicks').textContent = clicks;  // update the screen

      if (flippedCards[0].cardValue === flippedCards[1].cardValue){
        lockBoard = false; // release the lock since the cards matched
        flippedCards[0].element.classList.add('card-blank');
        flippedCards[1].element.classList.add('card-blank');

      }
      else
      {
        setTimeout(resetCards, 1000);
        misses++;// increment the misses counter every time two cards are flipped and don't match
        document.getElementById('misses').textContent = misses;  // update the screen
        accuracy = (clicks - misses) / clicks * 100; // calculate accuracy
        document.getElementById('accuracy').textContent = accuracy.toFixed(2) + '%';  // update the screen  
      }

      cardsTurned = 0; 
      flippedCards = [];
      clickedCard = {};
   }
}

function resetCards() {
    const cards = document.querySelectorAll('.card');
    cards.forEach(card => {
        card.classList.remove('card-reveal');
    });
    lockBoard = false; // release the lock since the cards don't matched
}

function resetGame(){
  window.location.reload();
}