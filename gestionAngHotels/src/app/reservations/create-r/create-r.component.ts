import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { MatSnackBar } from '@angular/material/snack-bar';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-create-r',
  templateUrl: './create-r.component.html',
  styleUrl: './create-r.component.css',
  host: {ngSkipHydration: 'true'},

})
export class CreateRComponent  implements OnInit{
[x: string]: any;

  nom: string='';
  prenom: string='';
  email: string='';
  dateReserv: Date= new Date();
  dateArrivee: Date= new Date();
  dateDepart: Date= new Date();
  nbrChambre= 0;
  nbrPersonne = 0;
  idC: number=0;
  id: number=0;
  idReserv: number=0;
  idS: number=0;
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
  selectedService: number = 0;
  dateSer: Date = new Date();
  heure: string = '';
  services: any[]=[];
  step: number = 1;
  constructor(private http: HttpClient, private route:ActivatedRoute, private snackBar: MatSnackBar) {

  }

  ngOnInit(): void {
    this.getChambres();
    this.getServices();
    this.reservation();
  }

 
  
  reservation(){
    this.http.get<any>('http://localhost:8000/api/reservation')
    .subscribe((response)=>
    {
      if (response.length > 0) {
        // Get the maximum idReserv from the response
        const maxIdReserv = Math.max(...response.map((res: any) => res.idReserv));
        this.idReserv = maxIdReserv + 1; 
      } else {
        this.idReserv = 1; 
      }
    }, (error) => {
      console.error('Failed to fetch reservations:', error);
      this.errorMessage = 'Failed to fetch reservations';
    });
  }

  store():void{
    let reservation={
      nom: this.nom,
      prenom: this.prenom,
      email: this.email,
      dateArrivee: this.dateArrivee,
      dateDepart: this.dateDepart,
      nbrChambre: this.nbrChambre,
      nbrPersonne: this.nbrPersonne,
      id: this.id,
      idC: this.idC,
    }
    this.http.post<any>('http://localhost:8000/api/reservation/store', reservation)
    .subscribe((response)=>
    {
      console.log(response);
      this.getChambres();
      this.reservation = response;
      this.chambres=response.numC;
      this.idReserv = response.idReserv;
      this.openSnackBar('Réservation créée');
      // if (this.idS) {
      //   this.createServiceReservation();
      // }
      if (this.step < 2) {
        this.step++;
      }
    }, (error) => {
      console.error('Failed to create room reservation:', error);
      this.errorMessage = error.error.message || 'Chambre réservée!';
      this.openSnackBar(`Erreur lors de la création de la réservation: ${this.errorMessage}`);
    });
  }
  
  openSnackBar(message: string) {
    this.snackBar.open(message, 'Close', {
      duration: 10000, // Duration in milliseconds
    });
  }
  getChambres(){
    this.http.get('http://localhost:8000/api/chambres')
    .subscribe((response: any)=>{
      
      this.chambres=response;
    })
  }

  getChambreDetails(id: number):void{
    this.http.get<any>('http://localhost:8000/api/chambre/'+id)
    .subscribe((response: any)=>
    {
      console.log(response);
      this.numC = response.numC;
      this.nbrLits = response.nbrLits;
      this.type_chambre_id = response.type_chambre_id;
      this.prixC = response.prixC;
      this.etage = response.etage;
      this.status = response.status;
    })
  }

  createServiceReservation(): void {
    
      const serviceReservation = {
        idReserv: this.idReserv,
        idS: this.idS,
        dateSer: this.dateSer,
        heure: this.heure,
      };

      this.http.post<any>('http://localhost:8000/api/reservice/store', serviceReservation)
        .subscribe(
          (response) => {
            console.log(response);
            this.successMessage = 'Réservation de service créée avec succès!';
          },
          (error) => {
            console.error(error);
            this.errorMessage = 'Réservation de service créée avec succès !';
          }
        );
    
  }

  getServices() {
    this.http.get<any[]>('http://localhost:8000/api/service')
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
