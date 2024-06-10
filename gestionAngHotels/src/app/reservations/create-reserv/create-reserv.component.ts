import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { SharedService } from '../shared.service';

@Component({
  selector: 'app-create-reserv',
  templateUrl: './create-reserv.component.html',
  styleUrl: './create-reserv.component.css',
  host: {ngSkipHydration: 'true'},
})
export class CreateReservComponent  implements OnInit{

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
  prixS: any;
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
  totalPrix: any;
  constructor(private http: HttpClient, private route:ActivatedRoute, private router: Router, private sharedService: SharedService) {

  }

  ngOnInit(): void {
    this.getChambres();
    this.getChambreType();
    this.getServices();
    this.reserv();
  }


  reserv(){
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
  navigateToNextStep() {
    if(this.step===1){
      this.step++;
    }
    else if (this.step === 2) {
        if (this.dateArrivee && this.dateDepart && this.nbrPersonne && this.nbrChambre && this.type_chambre_id) {
            this.step++;
        } else {
            this.errorMessage = "Veuillez remplir tous les champs obligatoires.";
        }
    } else if (this.step === 3) {
        if (this.nom && this.prenom && this.email) {
            this.step++;
        } else {
            this.errorMessage = "Veuillez remplir tous les champs obligatoires.";
        }
    } else if (this.step === 4) {
      this.step++;
    } else if (this.step === 5) {
      this.step++;
    } else if (this.step === 6){
    }else{}
  }
  

  navigateToPreviousStep() {
    if (this.step > 1) {
      this.step--;
    }
  }

  handleFormSubmission() {
    this.navigateToNextStep();
  }
  
  
  

  reservation(){
    this.http.get<any>('http://localhost:8000/api/reservation')
    .subscribe((response)=>
    {
      console.log(response);
    })
  }

  create(){
    this.http.get<any>('http://localhost:8000/api/reservation/create')
    .subscribe((response)=>
    {
      console.log(response);
    })
  }
  store():void{
    if (!this.selectedRoomId) {
      this.errorMessage = "Please select a room.";
      return;
    };
   

    this.idC=1;
    let reservation={
      nom: this.nom,
      prenom: this.prenom,
      email: this.email,
      dateArrivee: this.dateArrivee,
      dateDepart: this.dateDepart,
      nbrChambre: this.nbrChambre,
      nbrPersonne: this.nbrPersonne,
      idC: this.idC,
      id: this.id
    }
    this.http.post<any>('http://localhost:8000/api/reservation/store', reservation)
    .subscribe((response)=>
    {
      console.log(response);
      this.getChambres();
      this.reservation = response;
      this.chambres=response.numC;
      this.idReserv = response.idReserv;
      //this.router.navigate(['/confirm']);
    })
  }
  
  selectRoom(id: number): void {
    this.selectedRoomId = id;
    this.id = id;  
    this.prixC = this.chambres.find((chambre: any) => chambre.id === id).prixC;
    const selectedRoom = this.chambres.find((chambre: any) => chambre.id === id);

    // Vérifier si la chambre est trouvée
    if (selectedRoom) {
      // Vérifier le statut de la chambre
      if (selectedRoom.status === 1) {
        // Si la chambre est disponible (status = 1)
        this.prixC = selectedRoom.prixC;
        console.log('Selected room ID:', this.selectedRoomId);
      } else {
        // Si la chambre est réservée (status = 0)
        this.errorMessage = "La chambre sélectionnée est déjà réservée.";
        console.log('Selected room is already reserved.');
      }
    } else {
      // Si la chambre n'est pas trouvée (au cas où)
      this.errorMessage = "Chambre non trouvée.";
      console.log('Selected room not found.');
    }
  }
  getChambres(){
    this.http.get('http://localhost:8000/api/chambres')
    .subscribe((response: any)=>{
      this.chambres=response;
      // this.prixC = response.prixC;
    })
  }

  getChambreType():void{
    this.http.get('http://localhost:8000/api/chambre/type')
    .subscribe((response)=>{
      this.typeChambre = response;
    })
  }

  getChambreByType(id: number): void {
    this.http.get('http://localhost:8000/api/chambre/getType/'+id)
    .subscribe((response) => {
      console.log('Fetched rooms by type:',response);
      this.chambres = response;
    },
    (error) => {
      console.error('Error fetching chambre data:', error);
    }
  );
  }
 
  calculDiff(){
    const date1 = new Date(this.dateArrivee);
    const date2 = new Date(this.dateDepart);
    const diffTime = Math.abs(date2.getTime() - date1.getTime());
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
    return diffDays;
  }


  showAdditionalServices(event: any) {
    if (event?.value === '1') {
        this.showAdditionalService = true;
    } else {
        this.showAdditionalService = false;
    }
  }

  hideAdditionalServices() {
      this.showAdditionalService = false;
  }
  
  // getService(){
  //   this.http.get<any>('http://localhost:8000/api/service')
  //   .subscribe((response)=>
  //   {
  //     console.log(response);
  //   })
  // }

  calculTotal() {
    const nights = this.calculDiff();
    const total = nights * this.prixC * this.nbrChambre;
    return total;
  }

  getTypeChambreLabel(typeId: number) {
    const type = this.typeChambre.find((t: any) => t.id === typeId);
    return type ? type.typeC : '';
  }

  showServicesForType() {
    this.showAdditionalService = true;
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
            this.errorMessage = 'Réservation de service créée avec succès!';
          }
        );
    
  }

  getServices() {
    this.http.get<any>('http://localhost:8000/api/service')
      .subscribe(
        (response) => {
          this.services = response;
          this.prixS = response.prixS;

        },
        (error) => {
          console.error(error);
          this.errorMessage = 'Failed to load services';
        }
      );
  }

  fact(){
    this.http.get('http://localhost:8000/api/factures')
      .subscribe(
        (response) => {
          console.log(response);
        });
  }
  facturation(){
    let facture={
      idC: this.idC,
      idReserv: this.idReserv,
      idS: this.idS,
      prixC: this.prixC,
      // tax: this.tax,
      totalPrix:this.totalPrix,
    }
    this.http.post<any>('http://localhost:8000/api/facture/create', facture)
    .subscribe((response)=>
    {
      console.log(response);
      this.fact = response;
      
    })
  }
}

