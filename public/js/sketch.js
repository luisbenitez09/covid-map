// Global variables
var plot1 = undefined;
var plot2 = undefined;

function setup() {
    var parent = document.getElementById("graphic");

    var canvas = createCanvas(parent.clientWidth, parent.clientHeight);
    canvas.parent("graphic");

    var stateNames = [];

    for (const property in covidData.State) {
        //console.log(`${property}: ${covidData.State[property].infected}`);
        stateNames.push(property);
    }

    var points, i;
    // Grafica infectados
    plot1 = new GPlot(this);
    plot1.setPos(0, 0);
    plot1.setMar(60, 70, 40, 70);
    plot1.setOuterDim(this.width, this.height);
    plot1.setAxesOffset(4);
    plot1.setTicksLength(4);

    var infectedNumbers = [];

    for (const property in covidData.State) {
        //console.log(`${property}: ${covidData.State[property].infected}`);
        infectedNumbers.push(covidData.State[property].infected);
    }

    // Prepare the points
    infectedPoints = [];

    for (i = 0; i < 32; i++) {
        infectedPoints[i] = new GPoint(i, infectedNumbers[i]);
    }

    // Set the points, the title and the axis labels
    plot1.setPoints(infectedPoints);
    plot1.setTitleText("COVID-19 por Estado");
    plot1.getYAxis().setAxisLabelText("Infectados");
    plot1.getXAxis().setAxisLabelText("Estados");

    // Activate the panning (only for the first plot)
    plot1.activatePanning();

    noLoop();
}

function draw() {
    background("fff");

    // Draw the plot
    plot1.beginDraw();
    plot1.drawBox();
    plot1.drawXAxis();
    plot1.drawYAxis();
    plot1.drawTitle();
    plot1.drawPoints();
    plot1.drawLines();
    plot1.endDraw();

}
