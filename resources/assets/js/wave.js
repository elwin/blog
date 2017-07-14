let canvas = document.getElementsByClassName('canvas-wave')[0];
let ctx = canvas.getContext('2d');

canvas.style.width ='100%';
canvas.style.height='100%';

canvas.width  = canvas.offsetWidth;
canvas.height = canvas.offsetHeight;

class Playground {

    constructor(canvas) {
        this.ctx = canvas.getContext('2d');
        this.width = canvas.width;
        this.height = canvas.height;

        this.left = -(canvas.width / 2);
        this.right = (canvas.width / 2);
        this.top = (canvas.height / 2);
        this.bottom = -(canvas.height / 2);

        this.t = 0;
    }

    translateX(x) {
        return x - this.left;
    }

    translateY(y) {
        return this.top - y;
    }

    lineTo(x, y) {
        this.ctx.lineTo(this.translateX(x), this.translateY(y));
        this.ctx.stroke();
    }

    drawGraph(myFunction) {

        ctx.beginPath();

        for (let i = this.left; i < this.right; i += 20) {
            this.lineTo(i, 100 * myFunction(i / 100, this.t / 50));
        }

        this.t++;
    }

    clear() {
        this.ctx.clearRect(0, 0, this.width, this.height);
    }
}

let p = new Playground(canvas);

function loop() {
    p.clear();

    p.drawGraph(function(x, t) {
        return Math.exp(-0.5 * Math.pow(x, 2)) * Math.cos(4 * x + t);
    });

    p.drawGraph(function(x, t) {
        return Math.exp(-0.5 * Math.pow(x, 2)) * Math.cos(2 * x + t) / 2;
    });

    p.drawGraph(function(x, t) {
        return Math.exp(-0.5 * Math.pow(x, 2)) * Math.cos(4 * x + t) / 8;
    });

    requestAnimationFrame(loop);
}

loop();