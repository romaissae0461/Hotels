import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';


interface Reservation {
  idReserv: number;
  dateReserv: string;
  dateArrivee: string;
  dateDepart: string;
  nbrChambre: number;
  typeChambre: string;
  nbrPersonne: number;
  idC: number;
}

@Component({
  selector: 'app-client-p',
  templateUrl: './client-p.component.html',
  styleUrl: './client-p.component.css',
  host: {ngSkipHydration: 'true'},

})
export class ClientPComponent implements OnInit {

  reservations: Reservation[] = [
    {
      idReserv: 1,
      dateReserv: '2024-06-01',
      dateArrivee: '2024-06-10',
      dateDepart: '2024-06-15',
      nbrChambre: 2,
      typeChambre:'single',
      nbrPersonne: 2,
      
      idC: 1
    },
    {
      idReserv: 2,
      dateReserv: '2024-06-05',
      dateArrivee: '2024-06-12',
      dateDepart: '2024-06-18',
      nbrChambre: 1,
      typeChambre:'single',
      nbrPersonne: 1,
      idC: 1
    },
  ];

  constructor() { }

  ngOnInit(): void {
  }
}