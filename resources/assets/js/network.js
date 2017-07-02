const strokeColor = 'blue';

let canvas = document.querySelector('canvas');
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;
let ctx = canvas.getContext('2d');

class Point {

    constructor(width, height) {
        this.x = Math.random() * width;
        this.y = Math.random() * height;
        this.vel = {
            x: Math.random() * 2 - 1,
            y: Math.random() * 2 - 1
        };
    }

    draw() {
        ctx.beginPath();
        ctx.arc(this.x, this.y, 4, 0, 2 * Math.PI);
        ctx.globalAlpha = 1;
        ctx.fillStyle = strokeColor;
        ctx.fill();
    }

    move() {
        if (this.x > canvas.width || this.x < 0)
            this.vel.x *= -1;
        if (this.y > canvas.height || this.y < 0)
            this.vel.y *= -1;

        this.x += this.vel.x;
        this.y += this.vel.y;
    }
}

class Network {

    constructor(points) {
        this.points = [];

        for (let i = 0; i < points; i++)
            this.points.push(new Point(canvas.width, canvas.height));
    }

    updatePoints() {
        this.points.forEach(function(point) {
            point.move();
            point.draw();
        });
    }

    updateLines() {
        for (let i = 0; i < this.points.length - 1; i++) {
            for (let j = i + 1; j < this.points.length; j++) {
                let first = this.points[i];
                let second = this.points[j];

                let distance = Math.hypot(first.x - second.x, first.y - second.y);

                if (distance < 150) {
                    ctx.beginPath();
                    ctx.strokeStyle = strokeColor;
                    ctx.globalAlpha = 1 - distance / 100;
                    ctx.moveTo(first.x, first.y);
                    ctx.lineTo(second.x, second.y);
                    ctx.stroke();
                }
            }
        }
    }

    update() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        this.updateLines();
        this.updatePoints();
    }
}

let network = new Network(200);

function loop() {
    network.update();
    requestAnimationFrame(loop);
}

loop();