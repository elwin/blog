if (document.getElementsByClassName('canvas-network').length > 0) {
    const strokeColor = '#5cb85c';
    const pointColor = '#5cb85c';

    class Point {

        constructor(width, height) {
            this.x = Math.random() * width;
            this.y = Math.random() * height;
            this.vel = {
                x: (Math.random() * 2 - 1) / 4,
                y: (Math.random() * 2 - 1) / 4
            };
        }

        draw() {
            ctx.beginPath();
            ctx.arc(this.x, this.y, 2, 0, 2 * Math.PI);
            ctx.globalAlpha = 1;
            ctx.fillStyle = pointColor;
            ctx.fill();
        }

        move() {
            if (this.x > canvas.width + 100 || this.x < -100)
                this.vel.x *= -1;
            if (this.y > canvas.height + 100 || this.y < -100)
                this.vel.y *= -1;

            this.x += this.vel.x;
            this.y += this.vel.y;
        }
    }

    class Network {

        constructor(points = 400, strokeLength = 150) {
            this.points = [];
            this.strokeLength = strokeLength;

            for (let i = 0; i < points; i++)
                this.points.push(new Point(canvas.width, canvas.height));
        }

        updatePoints() {
            this.points.forEach(function(point) {
                point.move();
                point.draw();
            });
        }

        createLineBetween(first, second) {
            let distance = Math.hypot(first.x - second.x, first.y - second.y);

            if (distance < this.strokeLength) {
                ctx.beginPath();
                ctx.strokeStyle = strokeColor;
                ctx.globalAlpha = 1 - distance / this.strokeLength;
                ctx.moveTo(first.x, first.y);
                ctx.lineTo(second.x, second.y);
                ctx.stroke();
            }
        }

        updateLines() {
            for (let i = 0; i < this.points.length - 1; i++) {
                for (let j = i + 1; j < this.points.length; j++) {
                    this.createLineBetween(this.points[i], this.points[j]);
                }
            }
        }

        updateLineWithMouse() {
            let mouse = new Point(ctx.clientX, ctx.clientY);
            for (let i = 0; i < this.points.length; i++)
                this.createLineBetween(mouse, this.points[i]);
        }

        update() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            this.updateLines();
            this.updatePoints();
            this.updateLineWithMouse();
        }
    }

    function setup() {
        fitToContainer(canvas);
        // canvas.width = window.innerWidth;
        // canvas.height = window.innerHeight;

        let pixels = canvas.width * canvas.height;

         return new Network(points = pixels / 4000, strokeLength = 150);
    }

    function fitToContainer(canvas){
        // Make it visually fill the positioned parent
        canvas.style.width ='100%';
        canvas.style.height='100%';
        // ...then set the internal size to match
        canvas.width  = canvas.offsetWidth;
        canvas.height = canvas.offsetHeight;
    }

    let canvas = document.getElementsByClassName('canvas-network')[0];
    let ctx = canvas.getContext('2d');

    let network = setup();
    loop();

    function loop() {
        network.update();
        requestAnimationFrame(loop);
    }

    /*
     canvas.addEventListener('mousemove', function(event) {
     let mouse = new Point(event.x, event.y);
     network.updateLineWithMouse(mouse)
     });
     */

    let resizeTimer;
    window.onresize = function(event) {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function() {
            network = setup();
        }, 250);
    }
}
