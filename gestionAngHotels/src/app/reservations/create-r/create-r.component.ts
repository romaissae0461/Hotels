import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-create-r',
  templateUrl: './create-r.component.html',
  styleUrl: './create-r.component.css'
})
export class CreateRComponent  implements OnInit{

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
  constructor(private http: HttpClient, private route:ActivatedRoute) {

  }

  ngOnInit(): void {
    this.getChambres();
    this.route.queryParams.subscribe(params => {
      this.id = params['id']; 
      this.getChambreDetails(this.id); 
    });
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
      this.chambres=response.numC;
    })
  }
  
  getChambres(){
    this.http.get('http://localhost:8000/api/chambres')
    .subscribe((response: any)=>{
      console.log(response);
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
  
}
