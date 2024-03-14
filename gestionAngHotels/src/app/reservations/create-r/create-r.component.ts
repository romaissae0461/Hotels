import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';

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
  constructor(private http:  HttpClient) {

  }

  ngOnInit(): void {
    this.getChambres();
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
    }
    this.http.post<any>('http://localhost:8000/api/reservation/store', reservation)
    .subscribe((response)=>
    {
      console.log(response);
    })
  }
  
  getChambres(){
    this.http.get('http://localhost:8000/api/chambres')
    .subscribe((response: any)=>{
      console.log(response);
      this.chambres=response;
    })
  }
}
