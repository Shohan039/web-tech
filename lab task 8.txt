The game is called Guess the Number

PHP

<div id="game-container">
  <h1>Guess the Number</h1>
  <p>Guess a number between 1 and 200:</p>
  <input type="text" id="guess-input">
  <button id="guess-button">Guess</button>
  <p id="hint"></p>
  <p id="guesses-Right"></p>
</div>

CSS

#game-container {
  text-align: center;
}

#guess-input {
  width: 200px;
  margin: 10px;
}

#guess-button {
  margin: 10px;
}

#hint {
  font-weight: bold;
  margin-top: 20px;
}

#guesses-Right {
  margin-top: 10px;
}

JS

// Game variables
const MAX_GUESSES = 10;
let secretNumber = Math.floor(Math.random() * 200) + 1;
let guessesLeft = MAX_GUESSES;

const guessInput = document.querySelector('#guess-input');
const guessButton = document.querySelector('#guess-button');
const hintElement = document.querySelector('#hint');
const guessesRightElement = document.querySelector('#guesses-Right');


guessesRightElement.textContent = `Guesses Right: ${guessesRight}`;


guessButton.addEventListener('click', () => {
  
  const guess = parseInt(guessInput.value);

  
  if (isNaN(guess) || guess < 1 || guess > 200) {
    alert('Please enter a number between 1 and 200.');
    return;
  }

  
  guessesRight--;
  guessesRightElement.textContent = `Guesses Right: ${guessesRight}`;

  
  if (guessesRight == 0) {
    alert(`Game over! The secret number was ${secretNumber}.`);
    location.reload();
    return;
  }

  
  if (guess == secretNumber) {
    alert(`Congratulations! You are  guessed the right number (${secretNumber}) with ${guessesRight} guesses Right.`);
    location.reload();
    return;
  }

 
  if (guess < secretNumber) {
    hintElement.textContent = 'Hint: The secret number is lower.';
  } else {
    hintElement.textContent = 'Hint: The secret number is higer.';
  }

  
  guessInput.value = '';
});



