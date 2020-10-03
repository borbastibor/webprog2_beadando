export default class Ball {

    #radius;
    #color;
    #context;
    #coordX;
    #coordY;

    constructor(context, radius, color, coordx, coordy) {
        this.#context = context;
        this.#radius = radius;
        this.#color = color;
        this.#coordX = coordx;
        this.#coordY = coordy;
    }

    get getRadius() { return this.#radius; }
    set setRadius(value) { this.#radius = value; }
    get getColor() { return this.#color; }
    set setColor(value) { this.#color = value; }
    get getX() { return this.#coordX; }
    set setX(posx) { this.#coordX = posx; }
    get getY() { return this.#coordY; }

    render() {
        this.#context.beginPath();
        this.#context.arc(this.#coordX, this.#coordY, this.#radius, 0, 2 * Math.PI);
        this.fillStyle = this.#color;
        this.#context.fill();
    }

}
