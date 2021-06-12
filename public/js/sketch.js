// Global variables
var plot1 = undefined;
var plot2 = undefined;

function setup() {
    var parent = document.getElementById("graphic");

    console.log(parent.clientWidth);
    console.log(parent.clientHeight);
    var canvas = createCanvas(parent.clientWidth, parent.clientHeight);
    canvas.parent("graphic");

    var points, i;
    // Create the first plot
    plot1 = new GPlot(this);
    plot1.setPos(0, 0);
    plot1.setMar(60, 70, 40, 70);
    plot1.setOuterDim(this.width, this.height);
    plot1.setAxesOffset(4);
    plot1.setTicksLength(4);

    // Create the second plot with the same dimensions
    plot2 = new GPlot(this);
    plot2.setPos(plot1.getPos());
    plot2.setMar(plot1.getMar());
    plot2.setDim(plot1.getDim());
    plot2.setAxesOffset(4);
    plot2.setTicksLength(4);

    // Prepare the points
    points = [];

    for (i = 0; i < 50; i++) {
        points[i] = new GPoint(i, 30 + 10 * this.noise(i * 0.1));
    }

    // Set the points, the title and the axis labels
    plot1.setPoints(points);
    plot1.setTitleText("COVID-19 por Estado");
    plot1.getYAxis().setAxisLabelText("Infectados");
    plot1.getXAxis().setAxisLabelText("Estados");

    plot2.getRightAxis().setAxisLabelText("Fallecidos");

    // Make the right axis of the second plot visible
    plot2.getRightAxis().setDrawTickLabels(true);

    // Activate the panning (only for the first plot)
    plot1.activatePanning();

    noLoop();
}

function draw () {
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

    // Change the second plot vertical scale from Celsius to Kelvin
    plot2.setYLim(celsiusToKelvin(plot1.getYLim()));

    // Draw only the right axis
    plot2.beginDraw();
    plot2.drawRightAxis();
    plot2.endDraw();
    
}

function celsiusToKelvin(celsius) {
    var kelvin = [];

    for (var i = 0; i < celsius.length; i++) {
        kelvin[i] = 273.15 + celsius[i];
    }

    return kelvin;
}