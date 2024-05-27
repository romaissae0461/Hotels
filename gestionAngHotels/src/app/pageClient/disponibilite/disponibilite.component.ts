import { HttpClient } from '@angular/common/http';
import { Component, ElementRef, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-disponibilite',
  templateUrl: './disponibilite.component.html',
  styleUrl: './disponibilite.component.css',
  host: {ngSkipHydration: 'true'},

})
export class DisponibiliteComponent implements OnInit {

  name: string='';
  email: string='';
  password: string='';
  message: string='';
  contacts: any;
  nom: string='';
  prenom: string='';
  dateReserv: Date=new Date();
  dateArrivee: Date=new Date();
  dateDepart: Date=new Date();
  nbrChambre: number=0;
  nbrPersonne: number=0;
  id: any;
  chambres: any;
  availableRooms: any[] = []; 
  comment: string='';
 
typeChambre: any;
chambre: any;
  errorMessage: any;
  formSubmitted: boolean=false;
  filteredRooms: any[]=[];
  constructor(private http: HttpClient, private router:Router, public elementRef: ElementRef){
    
  }
  ngOnInit(): void {
     this.checkAvailability();
     this.getChambreType();
    }
  
    reservation(){
      this.http.get<any>('http://localhost:8000/api/reservation')
      .subscribe((response)=>
      {
        console.log(response);
      })
    }
  
    store():void{
      let reservation={
        nom: this.nom,
        prenom: this.prenom,
        email: this.email,
        dateReserv : this.dateReserv,
        dateArrivee: this.dateArrivee,
        dateDepart: this.dateDepart,
        nbrChambre: this.nbrChambre,
        nbrPersonne: this.nbrPersonne,
        id: this.id,
      }
      this.http.post<any>('http://localhost:8000/api/reservation/store', reservation)
      .subscribe((response)=>
      {
        console.log(response);
        this.getChambres();
        this.reservation = response;
      })
    }
    
    checkAvailability(): void{
      this.formSubmitted = true;
      const reserv={
        dateArrivee: this.dateArrivee,
        dateDepart: this.dateDepart,
        nbrChambre: this.nbrChambre,
        nbrPersonne: this.nbrPersonne,
      }
      this.http.post<any>('http://localhost:8000/api/reservation/check', reserv)
      .subscribe((response)=>{
        console.log(response);
        this.availableRooms = response;
        if(response.error){
          this.availableRooms=[];
          this.errorMessage=response.error;
        }
        else{
          this.availableRooms=response;
          this.errorMessage='';
        }
      },
      (error) => {
        console.error('Erreur lors de la demande de disponibilité des chambres :', error);
      });
    }
  
    getChambres(){
      this.http.get<any>('http://localhost:8000/api/chambres')
      .subscribe((response: any)=>{
        console.log(response);
        this.chambres=response;
      })
    }

    getChambreType():void{
      this.http.get('http://localhost:8000/api/chambre/type')
      .subscribe((response)=>{
        console.log(response);
        this.typeChambre = response;
      })
    }
    
  
    onSubmit(form: NgForm){
      console.log(form.value);
    }
}
