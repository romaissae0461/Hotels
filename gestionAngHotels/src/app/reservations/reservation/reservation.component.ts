import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';

@Component({
  selector: 'app-reservation',
  templateUrl: './reservation.component.html',
  styleUrl: './reservation.component.css'
})
export class ReservationComponent implements OnInit{


  dateReserv: Date= new Date();
  dateArrivee: Date= new Date();
  dateDepart: Date= new Date();
  nbrChambre= 0;
  nbrPersonne = 0;
  idC: number=0;
  id: number=0;

  successMessage: any;
  errorMessage: any;
  csrfToken: any;

  clients: any;
  reservations: any;
  constructor(private http:  HttpClient) {

  }

  ngOnInit(): void {
    this.reservation();
  }

  reservation(){
    this.http.get<any>('http://localhost:8000/api/reservation')
    .subscribe((response)=>
    {
      console.log(response);
      this.reservations = response;
    })
  }

  
  


  
}
