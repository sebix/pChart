<?php
/*
     Example13: A 2D exploded pie graph
 */

// Standard inclusions   
require_once("../lib/pData.php");
require_once("../lib/pChart.php");
require_once '../lib/GDCanvas.php';
require_once '../lib/BackgroundStyle.php';
require_once('../lib/PieChart.php');

// Definitions
$DataSet = new pData;
$Canvas = new GDCanvas(300, 200);
$Chart = new PieChart(300, 200, $Canvas);
// Dataset
$DataSet->AddPoints(array(10, 2, 3, 5, 3), "Serie1");
$DataSet->AddPoints(array("Jan", "Feb", "Mar", "Apr", "May"), "Serie2");
$DataSet->AddAllSeries();
$DataSet->SetAbscissaLabelSeries("Serie2");

// Initialise the graph
$Chart->setFontProperties("../Fonts/tahoma.ttf", 8);

// Draw the pie chart
$shadowProperties = ShadowProperties::FromSettings(2, 2, new Color(200));
$Chart->drawFlatPieGraphWithShadow($DataSet->GetData(), $DataSet->GetDataDescription(), 120, 100, 60, PIE_PERCENTAGE, 8, 0, $shadowProperties);
$Chart->drawPieLegend(230, 15, $DataSet->GetData(), $DataSet->GetDataDescription(), new Color(250));
$Chart->Render("Example13.png");
header("Content-Type:image/png");
readfile("Example13.png");
?>