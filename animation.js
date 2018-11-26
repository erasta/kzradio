function showPlasma() {
	var start = Date.now();
    var img=document.getElementById("logo-img");
// 	var imgRect = img.getBoundingClientRect();
	var canvas = jQuery('#plasma')[0];
	canvas.style = "position: absolute; z-index: 99999";
	canvas.width = canvas.parentElement.clientWidth;
	canvas.height = canvas.parentElement.clientHeight;
	var ctx = canvas.getContext('2d');
//    	ctx.drawImage(img, 0, 0, canvas.width, canvas.height);

	var particles = [];
	var frame = 0;
	var AMPLITUDE = 6;
	var DISTANCE = 5;
	var DISTANCE_VARIANT = 10;
	var GHOSTING_EFFECT = 0.225;
	var originY = ctx.canvas.height / 2;

// 	console.log("1");
	var Particle = function Particle(x, y) {
		this.x = x;
		this.y = y;
	};

	function tick() {
		draw();
		frame++;
		if (Date.now() - start < 200){
			requestAnimationFrame(tick);
		} else {
			canvas.style = "display: none";
			donateRotate();
		}
	}

	function moveParticle(i) {
		var self = particles[i];
		var next = particles[i + 1];
		var prev = particles[i - 1];

		var neighborsAttraction = 0; //0.5*((prev.y-next.y)/2);
		var medianAttraction = (originY - self.y) * 0.1;
		var randomness = AMPLITUDE / 2 - Math.random() * AMPLITUDE;
		self.y += neighborsAttraction + medianAttraction + randomness;

		//TODO: move x in a similar way?
		self.x -= 0.05 * ((self.x - prev.x - (next.x - self.x)) / 2);
		var ampx = 4;
		self.x += ampx / 2 - Math.random() * ampx;
	}

	function draw() {
		ctx.beginPath();
//     	ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
		ctx.fillStyle = 'rgba(0,0,0,' + GHOSTING_EFFECT + ')';
		ctx.fillRect(0, 0, ctx.canvas.width, ctx.canvas.height);
		ctx.lineWidth = 3;
		ctx.lineJoin = 'round';
		var r = Math.floor(127 + 128 * Math.random()),
			g = Math.floor(256 * Math.random()),
			b = Math.floor(256 * Math.random());

		var particle = particles[0];
		ctx.moveTo(particle.x, particle.y);

		for (var i = 1; i < particles.length - 1; i++) {
			ctx.strokeStyle = randomColorHSLA(180, 240);
			ctx.lineTo(particles[i].x, particles[i].y);
			ctx.stroke();
			moveParticle(i);
		}

		ctx.lineTo(particles[particles.length - 1].x, particles[particles.length - 1].y);
		ctx.stroke();

		ctx.closePath();
	}

	function init() {
		var distance, x, y, particle;
		var previous = particle = new Particle(0, originY);
		do {
			distance = DISTANCE + DISTANCE_VARIANT * Math.random();
			x = previous.x + distance;
			y = previous.y;
			particle = new Particle(x, y);
			particles.push(particle);
			previous = particle;
		} while (particle.x < ctx.canvas.width);

		requestAnimationFrame(tick);
	}

	function randomColorHSLA(minHue, maxHue) {
		var h = Math.round(minHue + Math.random() * (maxHue - minHue)),
			s = '100%',
			l = '50%';
		return 'hsla(' + h + ',' + s + ',' + l + ',1)';
	}

	init();
}

function rotateCatHead() {
    function rotateElementDegrees(e, deg, msec, after) {
        e.style.transition = "all 200ms ease";
        e.style.transform = "translateY(-50%) rotate(" + deg + "deg)";
        setTimeout(after, msec);
    }

    var es = document.getElementsByClassName("donate-image");
    rotateElementDegrees(es[0], 10, 200, () => {
        rotateElementDegrees(es[0], -10, 200, () => {
            rotateElementDegrees(es[0], 10, 200, () => {
                rotateElementDegrees(es[0], -10, 200, () => {
                    rotateElementDegrees(es[0], 0, 200, () => {
                        donateRotate();
                    });
                });
            });
        });
    });
}

document.write(`
<style>
	@keyframes laser { 0% { border-color: red; } 33% { border-color: purple; } 67% { border-color: green; } 100% { border-color: red; } }
</style>
`);

function showLasers() {

    function createLineElement(x, y, length, angle, color) {
        var line = document.createElement("div");
        var styles = 'border: 1px solid ' + color + '; '
        + 'width: ' + length + 'px; '
        + 'height: 0px; '
        + 'transform: rotate(' + angle + 'rad); '
        + 'position: absolute; '
        + 'top: ' + y + 'px; '
        + 'left: ' + x + 'px; '
        + 'animation: 200ms laser infinite; ';
        line.setAttribute('style', styles);
        return line;
    }

    function createLine(x1, y1, x2, y2, color) {
        var a = x1 - x2,
            b = y1 - y2,
            c = Math.sqrt(a * a + b * b);

        var sx = (x1 + x2) / 2,
            sy = (y1 + y2) / 2;

        var x = sx - c / 2,
            y = sy;

        var alpha = Math.PI - Math.atan2(-b, a);

        return createLineElement(x, y, c, alpha, color);
    }

    var es = document.getElementsByClassName("donate-image");
    var bodyRect = document.body.getBoundingClientRect(),
        elemRect = es[0].getBoundingClientRect();
    var x1 = 18 + elemRect.left - bodyRect.left;
    var y1 = 61 + elemRect.top - bodyRect.top;
    var x2 = Math.random() * document.body.clientWidth;
    var y2 = Math.random() * document.documentElement.clientHeight;//document.body.clientHeight;
    var e1 = createLine(x1, y1, x2, y2, 'red');
    var e2 = createLine(x1 + 18, y1, x2, y2, 'red');
    document.body.appendChild(e1);
    document.body.appendChild(e2);
    setTimeout(() => {
        document.body.removeChild(e1);
        document.body.removeChild(e2);
        donateRotate();
    }, 1000);
}

document.write(`
<style>
@keyframes lightningflash {
	from { filter: brightness(1);; }
	20% { filter: brightness(2); }
    40% { filter: brightness(1.5); }
    70% { filter: brightness(3); }
	to { filter: brightness(1); }
}
</style>
`);

function showLightning() {
    var e = document.getElementById('show-image-curr');
    if (!e) return donateRotate();
    e.style.animation = 'lightningflash 500ms';
    setTimeout(() => {
        e.style.animation = '';
        donateRotate();
    }, 1000);
}

function checkVisible(elm) {
	var rect = elm.getBoundingClientRect();
	var viewHeight = Math.max(document.documentElement.clientHeight, window.innerHeight);
	return !(rect.bottom < 0 || rect.top - viewHeight >= 0);
}

var donateRotateInterval = 10000;
var donateRotateSpecial = 0.1;

function donateRotate() {
	setTimeout(() => {
		var es = document.getElementsByClassName("donate-image");
		if (es && es.length && checkVisible(es[0])) {
			if (Math.random() < donateRotateSpecial) {
				if (Math.random() < 0.3) {
					showPlasma();
				} else if (Math.random() < 0.6) {
					showLightning();
				} else {
                    showLasers();
				}
			} else {
                rotateCatHead();
			}
		} else {
			donateRotate();
		}
	}, donateRotateInterval);
}
donateRotate();
