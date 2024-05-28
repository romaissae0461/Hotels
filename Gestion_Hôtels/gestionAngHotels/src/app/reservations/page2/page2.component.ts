import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-page2',
  templateUrl: './page2.component.html',
  styleUrl: './page2.component.css',
  host: {ngSkipHydration: 'true'},

})
export class Page2Component implements OnInit{

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
  currentPage: string='';
  constructor(private http: HttpClient, private route:ActivatedRoute, private router:Router) {

  }

  ngOnInit(): void {
    this.getChambres();
    this.getChambreType();
    
  }

  
  navigateToPage1() {
    this.router.navigate(['/createReserv']);
  }
  navigateToPage3() {
    this.router.navigate(['/page3']);
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
    })
  }
  
  getChambres(){
    this.http.get('http://localhost:8000/api/chambres')
    .subscribe((response: any)=>{
      this.chambres=response;
    })
  }

  getChambreType():void{
    this.http.get('http://localhost:8000/api/chambre/type')
    .subscribe((response)=>{
      this.typeChambre = response;
    })
  }
 
  calculDiff(){
    dateArrivee: this.dateArrivee;
    dateDepart: this.dateDepart;
    
    var days = Math.floor((this.dateDepart.getTime() - this.dateArrivee.getTime()) / 1000 / 60 / 60 / 24);
    return days; 
  }
  
}

