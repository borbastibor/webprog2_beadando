class Ball {

    radius;
    color;
    context;
    coordX;
    coordY;

    constructor(context, radius, color, coordx, coordy) {
        this.context = context;
        this.radius = radius;
        this.color = color;
        this.coordX = coordx;
        this.coordY = coordy;
    }

    render() {
        this.context.beginPath();
        this.context.arc(this.coordX, this.coordY, this.radius, 0, 2 * Math.PI);
        this.context.fillStyle = this.color;
        this.context.fill();
    }

}

$(document).ready(function(){
    
    let canvas = document.getElementById('gameCanvas');
    let context = canvas.getContext('2d');
    let canvasWidth = canvas.width;
    let canvasHeight = canvas.height;
    let balls = [];
    let gravity;
    let radius;
    let ballnumber;
    let isRunning = false;

    function init(){
        //canvas.addEventListener('click', onclick, false);
        gravity = $('#gravity').val();
        radius = $('#ballsize').val();
        ballnumber = $('#ballnumber').val();
        createBalls();
        window.requestAnimationFrame(gameLoop);
    }

    function gameLoop(timeStamp){
        calcPositions();
        render();
        if (isRunning) {
            window.requestAnimationFrame(gameLoop);
        }
    }

    function calcPositions() {
        
    }

    function render(){
        for (let i = 0; i < balls.length; i++) {
            balls[i].render();
        }
    }

    function createBalls() {
        for (let i = 0; i < ballnumber; i++) {
            balls.push(new Ball(context, radius, 'red', getRndInteger(0, canvasWidth), getRndInteger(radius * 2, canvasHeight)));
        }
    }

    $('#gameCanvas').click(function(e) {
        mouseX = e.clientX - $("#gameCanvas").offset().left;
        mouseY = e.clientY - $("#gameCanvas").offset().top;
    });

    $('#btn').click(function(e) {
        if (isRunning) {
            isRunning = false;
            $('#gameCanvas').prop('disabled', true);
            $('#btn').html('Indítás');
        } else {
            isRunning = true;
            $('#gameCanvas').prop('disabled', false);
            init();
            $('#btn').html('Leállítás');
        }
        e.preventDefault();
    });

    function getRndInteger(min, max) {
        return Math.floor(Math.random() * (max - min + 1) ) + min;
    }
});