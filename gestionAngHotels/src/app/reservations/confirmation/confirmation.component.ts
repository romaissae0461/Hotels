import { Component, OnInit } from '@angular/core';
import { SharedService } from '../shared.service';

@Component({
  selector: 'app-confirmation',
  templateUrl: './confirmation.component.html',
  styleUrl: './confirmation.component.css'
})
export class ConfirmationComponent implements OnInit {
  reservationData: any;

  constructor(private sharedService: SharedService) {}

  ngOnInit(): void {
    this.reservationData = this.sharedService.getReservationData();
  }
}