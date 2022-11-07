const p1Points = document.getElementById("p1-points");
const p2Points = document.getElementById("p2-points");
const p1Btn = document.getElementById("p1-btn");
const p2Btn = document.getElementById("p2-btn");
const winnerContainer = document.getElementById("winner");
// const appImage = document.getElementsByTagName('img')[0];
let p1Score = 0;
let p2Score = 0;
const gameOver = 5;

p1Btn.addEventListener("click", function (event) {
  addPoint(1);
  if (p1Score >= gameOver) {
    endGame();
  }
});

p2Btn.addEventListener("click", function (event) {
  addPoint(2);
  if (p2Score >= gameOver) {
    endGame();
  }
});

document.getElementById("reset").addEventListener("click", function () {
  p1Score = 0;
  p2Score = 0;
  p1Points.textContent = 0;
  p2Points.textContent = 0;
  p1Btn.disabled = false;
  p2Btn.disabled = false;
  document.getElementById("winner").style.display = "none";
  document.getElementsByTagName("body")[0].style.backgroundColor = "#fff";
  // Another way to solve the problem.
  //   location.reload();
});

// DRY => Don't Repeat Yourself
function addPoint(player) {
  if (player == 1) {
    // add 1 point to the score
    p1Score++;
    if (p2Score > 0) {
      p2Score--;
    }
    // print the score on the player points section
    p1Points.textContent = p1Score;
    p2Points.textContent = p2Score;
  } else {
    // add 1 point to the score
    p2Score++;
    if (p1Score > 0) {
      p1Score--;
    }
    // print the score on the player points section
    p2Points.textContent = p2Score;
    p1Points.textContent = p1Score;
  }
}

function endGame() {
  let winnerPlayerName = null;

  if (p1Score > p2Score) {
    winnerPlayerName = document.getElementById("p1-name").textContent;
  } else {
    winnerPlayerName = document.getElementById("p2-name").textContent;
  }
  document.getElementById("winner-name").textContent = winnerPlayerName;
  winnerContainer.style.display = "block";
  document.getElementsByTagName("body")[0].style.backgroundColor = "green";
  p1Btn.disabled = true;
  p2Btn.disabled = true;

  let colorSwitch = 0;
  setInterval(function () {

    if (colorSwitch == 0) {
      winnerContainer.style.backgroundColor = 'red';
      // appImage.style.boxShadow = '0px 0px 41px 10px rgba(209,224,23,0.75)';
      colorSwitch++;
    } else {
      winnerContainer.style.backgroundColor = 'yellow';
      // appImage.style.boxShadow = 'none';
      colorSwitch--;
    }
  }, 500);


}

// Bonus Assignment
// The score should start from 0. (this is already done)
// If any player got a point, the point should be deducted from the other player.
// The players score should not go below zero.