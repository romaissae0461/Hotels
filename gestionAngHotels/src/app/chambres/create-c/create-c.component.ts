import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-create-c',
  templateUrl: './create-c.component.html',
  styleUrl: './create-c.component.css'
})
export class CreateCComponent implements OnInit{

  id: any;
  numC: string='';	
  nbrLits: string='';
  type_chambre_id: string='';
  prixC: any;
  etage: string='';
  status: number=1;
  successMessage: any;
  errorMessage: any;
  csrfToken: any;
  chambres: any;

  constructor(private http: HttpClient, private router: Router) { 

  }
  ngOnInit(): void {
    this.getChambres();
    this.roomType();
  }

  getChambres(){
    this.http.get<any>('http://localhost:8000/api/chambres')
    .subscribe((response)=>
    {
      console.log(response);
    })
  }

  getChambreDetails(id :number){
    this.http.get<any>('http://localhost:8000/api/chambre/'+id)
    .subscribe((response)=>{
      console.log(response);
    })
  }
 	
  roomType(){
    this.http.get<any>('http://localhost:8000/api/chambre/type')
    .subscribe((response)=>{
    this.chambres=response.type_chambre_id;}
    );
  }
  create(){
    const chambre={
      numC: this.numC,
      nbrLits: this.nbrLits,
      type_chambre_id: this.type_chambre_id,
      prixC: this.prixC,
      etage: this.etage,
      status: this.status,
    }
    this.http.post<any>('http://localhost:8000/api/chambre/store', chambre)
    .subscribe((response)=>
    {
      console.log(response);
      this.chambres = response.chambres;
      this.router.navigate(['/chambres']);
    })
  }

}
