import { Component, OnInit } from '@angular/core';
import { ChartOptions, ChartType, ChartDataset } from 'chart.js';

@Component({
  selector: 'app-annual-sales-chart',
  templateUrl: './annual-sales-chart.component.html',
  styleUrl: './annual-sales-chart.component.css'
})
export class AnnualSalesChartComponent implements OnInit {
  public barChartOptions: ChartOptions = {
    responsive: true,
  };
  public barChartLabels: string[] = ['2019', '2020', '2021', '2022'];
  public barChartType: ChartType = 'line';

  public barChartData: ChartDataset<'line'>[] = [
    { data: [40000, 38000, 50000, 55000], label: 'Revenu Annuel' }
  ];;

  constructor() { }

  ngOnInit(): void {
  }
}