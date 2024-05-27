import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-edit-c',
  templateUrl: './edit-c.component.html',
  styleUrl: './edit-c.component.css'
})
export class EditCComponent implements OnInit{
  numC: string='';	
  nbrLits: number=0;
  type_chambre_id: string='';
  prixC: number=0;
  etage: string='';
  status: number=1;
  successMessage: any;
  errorMessage: any;
  csrfToken: any;
  id: number=0;
  chambres: any;

  typeChambre: any;

  constructor(private http: HttpClient, private route: ActivatedRoute, private router:Router){}
  ngOnInit(): void {
     this.route.params.subscribe(params => {
      this.id = params['id']; 
      this.getChambreDetails(this.id); 
    });
    this.roomType();  
  }

  getChambres(): void{
    this.http.get('http://localhost:8000/api/chambres')
    .subscribe((response)=>
    {
      console.log(response);
    })
  }

  getChambreDetails(id: number):void{
    this.http.get<any>('http://localhost:8000/api/chambre/'+id)
    .subscribe((response)=>
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
  
  roomType(): void{
    this.http.get('http://localhost:8000/api/chambre/type')
    .subscribe((response)=>{
      console.log(response);
      this.typeChambre = response;
    })
  }

  update(id: number):void{
    let chambre={
      "numC": this.numC,
      "nbrLits": this.nbrLits,
      "type_chambre_id": this.type_chambre_id,
      "prixC": this.prixC,
      "etage": this.etage,
      "status": this.status,
    }
    this.http.put('http://localhost:8000/api/chambre/' + id , chambre)
    .subscribe((response)=>
    {
      console.log(response);
      this.getChambreDetails(this.id);

      this.router.navigate(['/chambres']);
    })
  }

  onSubmit(form: NgForm){
    console.log(form.value);
  }

}
