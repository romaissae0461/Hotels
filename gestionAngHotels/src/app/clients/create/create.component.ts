import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-create',
  templateUrl: './create.component.html',
  styleUrl: './create.component.css'
})
export class CreateComponent implements OnInit{
  clients: any;
  nomC: string='';
  prenom: string='';
  adresse: string='';
  telephone: string='';
  email: string='';
  password: string='';
successMessage: any;
errorMessage: any;

  constructor(private http:HttpClient, private router:Router, private route: ActivatedRoute){

  }
  ngOnInit():void{
    this.getClients()
  }

  getClients(){
    this.http.get("http://localhost:8000/api/index")
    .subscribe((resultData: any)=>
    {
      console.log(resultData);
      this.clients = resultData;
    })
  }
  

  
  ajouter(): void{
    const  client = {
      nomC: this.nomC,
      prenom: this.prenom,
      adresse: this.adresse,
      telephone: this.telephone,
      email:this.email,
      password: this.password,
    }
    this.http.post<any>('http://localhost:8000/api/clients/store', client)
    .subscribe((response)=>{
      console.log(response);
      // if(Array.isArray(response.data)){
      //   this.clients = response.data;
      // }else{
      //   this.clients = response;
      // }
      this.getClients();
      this.router.navigate(['/clients']); 
    })
  }
}
