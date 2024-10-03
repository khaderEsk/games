let boxes = document.querySelectorAll(".box");

let turn = "X";
let isGameOver = false;
let computerTurn = false;




boxes.forEach(e => {
    e.innerHTML = "";
    e.addEventListener("click", () => {
        if (!isGameOver && e.innerHTML === "" && !computerTurn) {
            e.innerHTML = turn;
            checkWin();
            checkDraw();
            if (!isGameOver) changeTurn();
            if (turn === "O" && !isGameOver) computerMove(); // Trigger computer move if it's O's turn
        }
    });
});

function changeTurn() {
    turn = (turn === "X") ? "O" : "X";
    document.querySelector(".bg").style.left = (turn === "O") ? "85px" : "0";
}

function computerMove() {
    computerTurn = true;
    let availableBoxes = [];

    boxes.forEach((box, index) => {
        if (box.innerHTML === "") availableBoxes.push(index);
    });

    if (availableBoxes.length > 0) {
        let randomIndex = availableBoxes[Math.floor(Math.random() * availableBoxes.length)];
        boxes[randomIndex].innerHTML = "O";
        checkWin();
        checkDraw();
        if (!isGameOver) changeTurn();
    }

    computerTurn = false;
}

function checkWin() {
    let winConditions = [
        [0, 1, 2],
        [3, 4, 5],
        [6, 7, 8],
        [0, 3, 6],
        [1, 4, 7],
        [2, 5, 8],
        [0, 4, 8],
        [2, 4, 6]
    ];

    winConditions.forEach(condition => {
        let [a, b, c] = condition;
        if (boxes[a].innerHTML && boxes[a].innerHTML === boxes[b].innerHTML && boxes[a].innerHTML === boxes[c].innerHTML) {
            isGameOver = true;
            document.querySelector("#results").innerHTML = turn + " wins!";
            document.querySelector("#play-again").style.display = "inline";
            [a, b, c].forEach(i => {
                boxes[i].style.backgroundColor = "#08D9D6";
                boxes[i].style.color = "#000";
            });
        }
    });
}

function checkDraw() {
    if (!isGameOver) {
        let isDraw = true;
        boxes.forEach(e => {
            if (e.innerHTML === "") isDraw = false;
        });
        if (isDraw) {
            isGameOver = true;
            document.querySelector("#results").innerHTML = "Draw";
            document.querySelector("#play-again").style.display = "inline";
        }
    }
}

document.querySelector("#play-again").addEventListener("click", () => {
    isGameOver = false;
    turn = "X";
    document.querySelector(".bg").style.left = "0";
    document.querySelector("#results").innerHTML = "";
    document.querySelector("#play-again").style.display = "none";
    boxes.forEach(e => {
        e.innerHTML = "";
        e.style.removeProperty("background-color");
        e.style.color = "#fff";
    });
});

