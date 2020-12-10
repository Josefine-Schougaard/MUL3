let canvas = document.querySelector('#canvas');
let ctx = canvas.getContext('2d');

let nebula = new Image();
nebula.src= 'images/Road.png';

let asteroid = new Image();
asteroid.src= 'images/wall.png';

let avatar = new Image();
avatar.src= 'images/Avatar.png';

let gem = new Image();
gem.src= 'images/Gem.png';

let portal = new Image();
portal.src = 'images/Portal.png';

let poison = new Image();
poison.src = 'images/Void.png';


let levels = [
    [
        [1,0,0,0,0,0,0,1,1,3],
        [1,0,1,1,0,1,0,0,0,0],
        [0,5,1,1,0,1,0,0,0,0],
        [0,1,0,0,0,0,5,1,0,0],
        [0,1,0,1,1,1,1,1,0,0],
        [0,0,0,0,0,0,0,0,0,0],
        [1,1,0,1,1,0,1,1,0,0],
        [0,0,5,1,1,0,1,5,0,0],
        [0,1,1,1,0,0,1,0,0,0],
        [0,0,0,0,0,2,1,1,1,1]
    
    ],
    [
        [5,0,0,0,0,0,1,1,1,2],
        [0,0,0,0,0,0,0,0,0,0],
        [1,1,1,1,0,1,1,1,0,1],
        [0,0,0,1,0,0,5,0,0,1],
        [0,1,0,5,1,0,0,0,0,1],
        [0,1,1,0,1,1,1,0,1,1],
        [0,3,1,0,0,1,1,0,0,0],
        [1,1,1,0,0,0,0,0,1,0],
        [1,1,5,0,0,1,1,0,1,0],
        [0,0,0,0,0,1,1,5,0,0]
    
    ],
    [
        [5,0,0,0,0,1,0,0,0,0],
        [0,1,1,1,5,0,0,1,5,1],
        [0,0,0,0,0,0,1,1,0,0],
        [1,1,1,1,1,0,0,1,1,0],
        [0,0,0,0,0,0,0,0,0,0],
        [0,1,1,1,0,1,1,1,0,1],
        [0,2,1,1,0,1,3,1,0,0],
        [0,1,1,0,0,0,0,1,1,0],
        [0,1,5,0,1,1,0,0,0,0],
        [0,0,0,1,1,1,1,1,1,1]
    
    ], 
    [
        [5,0,0,0,0,1,0,0,0,0],
        [0,1,1,1,0,1,0,1,1,5],
        [0,1,3,0,0,0,0,0,0,0],
        [0,1,1,1,0,0,0,0,1,0],
        [0,0,1,1,0,0,1,0,1,1],
        [1,0,0,0,0,1,0,0,0,1],
        [1,0,1,1,0,1,2,1,0,0],
        [1,0,1,0,5,1,1,1,1,0],
        [0,0,0,0,0,0,0,0,1,0],
        [1,0,1,1,1,1,1,0,0,0]
    
    ] 
]

let levelIndex = 0;
let maze = levels[levelIndex];

function nextLevel(){
    levelIndex++;
    if(levelIndex>=levels.length){
        $('#winModal').modal('show');
    }
    else{
        maze = levels[levelIndex];
        drawMaze();
    }
    
}

let tiles = 50;
let playerPosition = {x:0,y:0};

let player = 2;
let road = 0;
let wall = 1
let goal = 3;
let bvoid = 4;
let gems = 5;

let score = 0



function sendHighscore(){
    document.querySelector("#hscore").value = score;
    document.querySelector("#hscoreform").submit();
}



function drawMaze(){
    for(let y = 0; y< maze.length; y++){
        for(let x = 0; x < maze[y].length; x++){
            if(maze[y][x] === road){
                // ctx.fillStyle = 'green';
                ctx.drawImage(nebula,x*tiles,y*tiles,tiles,tiles);
            }else if(maze[y][x]===wall){
                // ctx.fillStyle = 'yellow';
                ctx.drawImage(asteroid,x*tiles,y*tiles,tiles,tiles);
            }else if(maze[y][x]===player){
                playerPosition.x = x;
                playerPosition.y = y;
                // ctx.fillStyle = 'red';
                ctx.drawImage(avatar,x*tiles,y*tiles,tiles,tiles);
            }
            else if(maze[y][x]===goal){
                // ctx.fillStyle = 'blue';
                ctx.drawImage(portal,x*tiles,y*tiles,tiles,tiles);
            }else if(maze[y][x]===bvoid){
                // ctx.fillStyle = 'black';
                ctx.drawImage(poison,x*tiles,y*tiles,tiles,tiles);
            }
            else if(maze[y][x]===gems){
                // ctx.fillStyle = 'purple';
                ctx.drawImage(gem,x*tiles,y*tiles,tiles,tiles);
            }
        }
        
    }
}

// Sounds
function walk(){
    let gameSound = new Audio('sounds/jump.mp3');
    gameSound.play();
}

function collect(){
    let gameSound = new Audio('sounds/collect.mp3');
    gameSound.play();
}

function blackhole(){
    let gameSound = new Audio('sounds/powerup.mp3');
    gameSound.play();
}

//checks if tile is walkable
function isWalkable(targetTile){
    if(targetTile === road || targetTile === gems || targetTile === goal){
        return true;
    }else{
        return false;
    }
}

// checks if player is stuck
function isStuck(){
    let walkableSides = 4;
    let targetY = playerPosition.y;
    let targetX = playerPosition.x-1;
    if(targetX < 0 || targetX > 9){
        walkableSides--;
    }else if(!isWalkable(maze[targetY][targetX])){
        walkableSides--;
    }
    targetY = playerPosition.y;
    targetX = playerPosition.x+1;
    if(targetX < 0 || targetX > 9){
        walkableSides--;
    }else if(!isWalkable(maze[targetY][targetX])){
        walkableSides--;
    }
    targetY = playerPosition.y-1;
    targetX = playerPosition.x;
    if(targetY< 0 || targetY > 9){
        walkableSides--;
    }else if(!isWalkable(maze[targetY][targetX])){
        walkableSides--;
    }
    targetY = playerPosition.y+1;
    targetX = playerPosition.x;
    if(targetY< 0 || targetY > 9){
        walkableSides--;
    }else if(!isWalkable(maze[targetY][targetX])){
        walkableSides--;
    }
    if(walkableSides === 0){
        $('#stuckModal').modal('show');
        return true;
    }else{
        
        return false;
    }
}

//assigns event to button
const btn = document.querySelectorAll('.gamerestart');
for(let i=0;i<btn.length;i++){
    btn[i].addEventListener('click', gameRestart);
}

function gameRestart(){
    sendHighscore();
}


//assigns movement, changes tiles, collects gems, next level
window.addEventListener('keydown', (e)=>{
    let targetTile;
    switch(e.keyCode){
        case 37: //left
            targetTile = maze[playerPosition.y][playerPosition.x-1];
            if(isWalkable(targetTile)){
                maze[playerPosition.y][playerPosition.x-1] = player; //players nye position
                maze[playerPosition.y][playerPosition.x] = bvoid;
                drawMaze();
                walk();
                if(targetTile === gems){
                    score++;
                    collect();
                }
                if(targetTile === goal){
                    blackhole();
                    nextLevel();
                }
                else{
                    isStuck();
                }
            }
        break;
        case 39: //Right
            targetTile = maze[playerPosition.y][playerPosition.x+1];
            if(isWalkable(targetTile)){
                maze[playerPosition.y][playerPosition.x+1] = player; //players nye position
                maze[playerPosition.y][playerPosition.x] = bvoid;
                drawMaze();
                walk();
                if(targetTile === gems){
                    score++;
                    collect();
                }
                if(targetTile === goal){
                    blackhole();
                    nextLevel();
                }
                else{
                    isStuck();
                }
            }
        break;
        case 38: //Up
            targetTile = maze[playerPosition.y-1][playerPosition.x];
            if(isWalkable(targetTile)){
                maze[playerPosition.y-1][playerPosition.x] = player; //players nye position
                maze[playerPosition.y][playerPosition.x] = bvoid;
                drawMaze();
                walk();
                if(targetTile === gems){
                    score++;
                    collect();
                }
                if(targetTile === goal){
                    blackhole();
                    nextLevel();
                }
                else{
                    isStuck();
                }
            }
        break;
        case 40: //down
            targetTile = maze[playerPosition.y+1][playerPosition.x];
            if(isWalkable(targetTile)){
                maze[playerPosition.y+1][playerPosition.x] = player; //players nye position
                maze[playerPosition.y][playerPosition.x] = bvoid;
                drawMaze();
                walk();
                if(targetTile === gems){
                    score++;
                    collect();
                }
                if(targetTile === goal){
                    blackhole();
                    nextLevel();
                }
                else{
                    isStuck();
                }
            }
        break;
    }
    document.getElementById('cscore').innerHTML=score;
})


window.addEventListener("load", drawMaze);
