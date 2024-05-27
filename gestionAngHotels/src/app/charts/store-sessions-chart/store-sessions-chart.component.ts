import { Component, OnInit } from '@angular/core';
import { ChartDataset, ChartOptions, ChartType } from 'chart.js';

@Component({
  selector: 'app-store-sessions-chart',
  templateUrl: './store-sessions-chart.component.html',
  styleUrl: './store-sessions-chart.component.css'
})
export class StoreSessionsChartComponent implements OnInit {
  public pieChartOptions: ChartOptions = {
    responsive: true,
  };
  public pieChartLabels: string[] = ['Étage 1', 'Étage 2', 'Étage 3', 'Étage 4', 'Étage 5', 'Étage 6', 'Étage 7', 'Étage 8', 'Étage 9'];
  public pieChartType: ChartType = 'pie';

  public pieChartData: ChartDataset<'pie'>[] = [
    { data: [60, 100, 90, 80, 70, 50, 40, 30, 20], label: 'Taux d\'occupation' }
  ];
  constructor() { }

  ngOnInit(): void {
  }
}