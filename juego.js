// Selecciona el tablero de juego
const gameBoard = document.getElementById('game-board');

// Crea un array de pares de cartas con URLs de imágenes
const cardValues = [
  'https://imagessl4.casadellibro.com/a/l/s7/94/9788413143194.webp',
  'https://imagessl2.casadellibro.com/a/l/s7/92/9788419654892.webp',
  'https://imagessl7.casadellibro.com/a/l/s7/77/9788401035777.webp',
  'https://imagessl6.casadellibro.com/a/l/s7/56/9788408292456.webp',
  'https://imagessl3.casadellibro.com/a/l/s7/93/9788418359293.webp',
  'https://imagessl1.casadellibro.com/a/l/s7/31/9788401032431.webp',
  'https://imagessl7.casadellibro.com/a/l/s7/57/9788445013557.webp',
  'https://imagessl2.casadellibro.com/a/l/s7/42/9788410433342.webp'
];
let cards = [...cardValues, ...cardValues];

// Baraja las cartas
cards.sort(() => Math.random() - 0.5);

// Variables del juego
let flippedCards = [];
let matchedCards = [];

// Genera las cartas en el tablero
function createCards() {
  cards.forEach(value => {
    const card = document.createElement('div');
    card.classList.add('card');
    card.dataset.value = value; // Almacena el valor de la carta

    // Inserta la imagen en la carta
    const img = document.createElement('img');
    img.src = value; // Asigna la URL de la imagen
    img.alt = 'Carta de memoria';
    card.appendChild(img);

    // Agrega el evento de clic para voltear la carta
    card.addEventListener('click', flipCard);

    // Añade la carta al tablero
    gameBoard.appendChild(card);
  });
}

// Lógica para voltear una carta
function flipCard() {
  if (flippedCards.length < 2 && !this.classList.contains('flipped')) {
    this.classList.add('flipped');
    flippedCards.push(this);

    // Si hay 2 cartas volteadas, comprobar si coinciden
    if (flippedCards.length === 2) {
      checkMatch();
    }
  }
}

// Comprueba si las cartas coinciden
function checkMatch() {
  const [card1, card2] = flippedCards;
  const value1 = card1.dataset.value;
  const value2 = card2.dataset.value;

  if (value1 === value2) {
    // Si coinciden, añadir clase 'matched'
    card1.classList.add('matched');
    card2.classList.add('matched');
    matchedCards.push(card1, card2);

    // Verifica si el jugador ha ganado
    if (matchedCards.length === cards.length) {
      setTimeout(() => alert('¡Ganaste! 🎉'), 500);
    }
  } else {
    // Si no coinciden, voltear las cartas nuevamente
    setTimeout(() => {
      card1.classList.remove('flipped');
      card2.classList.remove('flipped');
    }, 750);
  }

  // Reinicia las cartas volteadas
  flippedCards = [];
}

// Inicia el juego
createCards();
