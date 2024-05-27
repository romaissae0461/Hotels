import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class SharedService {

  private reservationData: any;

  constructor() { }

  setReservationData(data: any): void {
    this.reservationData = data;
  }

  getReservationData(): any {
    return this.reservationData;
  }
}
