 $(function () {
 	var ctx = document.getElementById("myChart");
 	var myChart = new Chart(ctx, {
 		type: 'bar',
 		data: {
 			labels:myGraphLabelList,
 			datasets: [{
 				label: myGraphLabel,
 				data: myGraphData,
 				backgroundColor: [
 				'rgba(255, 99, 132, 0.2)',
 				'rgba(54, 162, 235, 0.2)',
 				'rgba(255, 206, 86, 0.2)',
 				'rgba(75, 192, 192, 0.2)',
 				'rgba(153, 102, 255, 0.2)',
 				'rgba(255, 159, 64, 0.2)'
 				],
 				borderColor: [
 				'rgba(255,99,132,1)',
 				'rgba(54, 162, 235, 1)',
 				'rgba(255, 206, 86, 1)',
 				'rgba(75, 192, 192, 1)',
 				'rgba(153, 102, 255, 1)',
 				'rgba(255, 159, 64, 1)'
 				],
 				borderWidth: 1
 			}]
 		
 		},	options: {
 				responsive : false,
 				maintainAspectRatio : false
 			},
 		onAnimationComplete: function () {
 			var sourceCanvas = this.chart.ctx.canvas;
 			var copyWidth = this.scale.xScalePaddingLeft - 5;
                // the +5 is so that the bottommost y axis label is not clipped off
                // we could factor this in using measureText if we wanted to be generic
                var copyHeight = this.scale.endPoint + 5;
                var targetCtx = document.getElementById("myChartAxis").getContext("2d");
                targetCtx.canvas.width = copyWidth;
                targetCtx.drawImage(sourceCanvas, 0, 0, copyWidth, copyHeight, 0, 0, copyWidth, copyHeight);
            }

        });
 });
