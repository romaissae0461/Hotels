import { Component, OnInit } from '@angular/core';
import { ChartDataset, ChartOptions, ChartType } from 'chart.js';

@Component({
  selector: 'app-product-sales-chart',
  templateUrl: './product-sales-chart.component.html',
  styleUrl: './product-sales-chart.component.css'
})
export class ProductSalesChartComponent implements OnInit {
  public radarChartOptions: ChartOptions = {
    responsive: true,
  };
  public radarChartLabels: string[] = ['T1', 'T2', 'T3', 'T4'];

  public radarChartData: ChartDataset<'radar'>[] = [
    { data: [120, 130, 180, 70], label: 'Chambre Simple' },
    { data: [90, 150, 200, 45], label: 'Chambre Double' },
    { data: [100, 160, 220, 85], label: 'Suite' }
  ];
  public radarChartType: ChartType = 'radar';

  constructor() { }

  ngOnInit(): void { }
}