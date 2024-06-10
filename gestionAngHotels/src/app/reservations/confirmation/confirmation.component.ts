import { Component, OnInit } from '@angular/core';
import { SharedService } from '../shared.service';
import { ActivatedRoute, Router } from '@angular/router';
import { HttpClient } from '@angular/common/http';
import { MatSidenav } from '@angular/material/sidenav';

@Component({
  selector: 'app-confirmation',
  templateUrl: './confirmation.component.html',
  styleUrl: './confirmation.component.css',
  host: {ngSkipHydration: 'true'},

})
export class ConfirmationComponent implements OnInit {
  reservationData: any;
  nom: string='';
  prenom: string='';
  email: string='';
  dateReserv: Date= new Date();
  dateArrivee: Date= new Date();
  dateDepart: Date= new Date();
  nbrChambre: any;
  nbrPersonne: any;
  idC: any;
  id: any;

  successMessage: any;
  errorMessage: any;
  csrfToken: any;

  chambres: any;
  numC: any;
  nbrLits: any;
  type_chambre_id: any;
  prixC: any;
  etage: any;
  status: any;
  typeChambre: any;
  step: number = 1;
  showAdditionalService: boolean=false;
  services: any;
  selectedRoomId: number | null = null;
  idReserv: number=0;
  idS: number=0;
  dateSer: Date = new Date();
  heure: string = '';
  facture: any;
  clients: any;
  constructor( private http: HttpClient, private route:ActivatedRoute, private router: Router, private sharedService: SharedService) {
    }

  ngOnInit(): void {
    this.reservationData = this.sharedService.getReservationData();
    this.fact();
    this.getClients();
    this.getServices();
  }
  toggleSidenav(sidenav: MatSidenav) {
    sidenav.toggle();
  }
  fact(){
    this.http.get('http://localhost:8000/api/factures')
      .subscribe(
        (response) => {
          console.log(response);
          this.facture = response;
        });
  }
  facturation(){
    let facture={
      idC: this.idC,
      idReserv: this.idReserv,
      idS: this.idS,
      prixC: this.prixC,
      // tax: this.tax,
      // totalPrix:this.totalPrix,
    }
    this.http.post<any>('http://localhost:8000/api/facture/create', facture)
    .subscribe((response)=>
    {
      console.log(response);
      this.fact = response;
      
    })
  }
  getClients(){
    this.http.get("http://localhost:8000/api/index")
    .subscribe((resultData: any)=>
    {
      console.log(resultData);
      this.clients = resultData;
    });
  }
  getServices() {
    this.http.get<any>('http://localhost:8000/api/service')
      .subscribe(
        (response) => {
          this.services = response;

        },
        (error) => {
          console.error(error);
          this.errorMessage = 'Failed to load services';
        }
      );
  }
}