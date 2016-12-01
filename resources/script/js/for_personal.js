/**
 * Created by lin11 on 2016/11/28.
 */
$(function () {
  if($('.sleepGraph').length>0){
      var lengthData=[];
      var deepData=[];
      var level=[];
      var date=[];
      for(var i = 0;i<sleepTb.length;i++){
          lengthData.push(sleepTb[i].length);
          deepData.push(sleepTb[i].deeplength);
          level.push(sleepTb[i].level);
          date.push(sleepTb[i].date);
      }
      var option = {
          title: {
              text: '睡眠历史记录'
          },
          tooltip: {
              trigger: 'axis',
              axisPointer: {
                  animation: false
              }
          },
          legend: {
              data: ['睡眠总时间', '深度睡眠时间', '不安定值']
          },
          xAxis: {
              type: 'category',
              splitLine: {
                  show: false
              },
              data:date
          },
          yAxis: [{
              name:'时间/min',
              type: 'value',
              splitLine: {
                  show: false
              }
          },{
              type: 'value',
              splitLine: {
                  show: false
              }
          }],
          series: [{
              name: '睡眠总时间',
              type: 'line',
              showSymbol: false,
              hoverAnimation: false,
              data: lengthData,
              markLine: {
                  symbol: 'circle',
                  data:[{
                      name: '推荐睡眠时间',
                      yAxis: 450
                  }]
              }
          },{
              name: '深度睡眠时间',
              type: 'line',
              showSymbol: false,
              hoverAnimation: false,
              data: deepData
          },{
              name: '不安定值',
              type: 'line',
              yAxisIndex:1,
              showSymbol: false,
              hoverAnimation: false,
              data: level
          }]
      };
      var myChart = echarts.init(document.getElementById('sleepGraph'));
      myChart.setOption(option);
  }
});