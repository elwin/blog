
let canvas = document.getElementsByClassName('canvas-wave')[0];
let ctx = canvas.getContext('2d');

canvas.style.width ='100%';
canvas.style.height='100%';

canvas.width  = canvas.offsetWidth;
canvas.height = canvas.offsetHeight;

function waveForm(x) {
    var amplitude = 2.5;
    var period = 4;
    var freq = 1;
    var phase = 20;

    return Math.sin(x);
}

class Point {

    constructor(x, y) {
        this.x = x;
        this.y = y;
    }

    translateX() {
        return this.x * 1 + canvas.width / 2;
    }

    translateY() {
        return canvas.height / 2 - this.y * 100;
    }
}

ctx.beginPath();
ctx.strokeStyle = 'red';

function drawPoints(oldPoint, newPoint) {
    ctx.moveTo(oldPoint.translateX(), oldPoint.translateY());
    ctx.lineTo(newPoint.translateX(), newPoint.translateY());
    ctx.stroke();
}

let oldPoint;
let newPoint = new Point(-10000, waveForm(-10000));

for (let i = -10000; i < canvas.width; i += 10) {

    oldPoint = newPoint;
    newPoint = new Point(i, waveForm(i));

    console.log(oldPoint.translateX(), oldPoint.translateY());

    drawPoints(oldPoint, newPoint);

}



