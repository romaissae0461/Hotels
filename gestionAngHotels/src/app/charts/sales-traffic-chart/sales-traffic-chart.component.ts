import { Component, OnInit } from '@angular/core';
import { ChartOptions, ChartDataset, ChartType } from 'chart.js';

@Component({
  selector: 'app-sales-traffic-chart',
  templateUrl: './sales-traffic-chart.component.html',
  styleUrl: './sales-traffic-chart.component.css'
})
export class SalesTrafficChartComponent implements OnInit {
  public lineChartOptions: ChartOptions = {
    responsive: true,
  };
  public lineChartLabels: string[] = ['Site Web', 'Sites Tiers', 'Téléphone', 'Visites Directes'];
  public lineChartType: ChartType = 'bar';

  public lineChartData: ChartDataset<'bar'>[] = [
    { data: [300, 500, 100, 200], label: 'Réservations' }
  ];

  constructor() { }

  ngOnInit(): void { }
}