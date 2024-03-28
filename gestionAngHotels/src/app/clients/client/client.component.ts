import { Component, Injectable, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';
import { HttpClient } from '@angular/common/http';
import { ActivatedRoute } from '@angular/router';

@Injectable()
@Component({
  selector: 'app-client',
  templateUrl: './client.component.html',
  styleUrl: './client.component.css'
})
export class ClientComponent  implements OnInit {
  idC: any;
  clients: any;
  Session: any;
  nomC: string="";
  prenom: string="";
  email: string="";

  reservations: any[]=[];
  
  constructor( private http: HttpClient, private route:ActivatedRoute){}
  title = 'gestionAngHotels';

  ngOnInit():void{
    this.getClients();
    this.route.params.subscribe(params=>{
      const idC=params['id'];
      this.getReservation(idC);
    })
  }

  getClients(){
    this.http.get("http://localhost:8000/api/index")
    .subscribe((resultData: any)=>
    {
      console.log(resultData);
      this.clients = resultData;
      /*
      if (Array.isArray(resultData.data)) { 
        this.clients = resultData.data;
      } else {
        this.clients = resultData;
      }
      The function checks if the data property of 
      the resultData object is an array. 
      If it is, the clients property of the component
      class is set to the data array.
      If it's not an array, the clients property 
      is set to the resultData object itself.
      */
    })
  }

  getClientDetails(id: number): void{
    this.http.get<any>('http://localhost/8000/api/show/'+id)
    .subscribe(
      (resultData)=>{
        console.log(resultData);
        this.getClients();
      }
    )
  }
  
  getReservation(id: number):void{
    this.http.get<any>('http://localhost:8000/api/clients/${id}/reservation')
    .subscribe((response: any)=>{
      console.log(response);
      if(Array.isArray(response.data)){
        this.reservations = response.data;

      }else{
        this.reservations=response;
      }
      // this.reservations=response;
    })
  }

  ajouter(): void{
    const  client = {
      nomC: this.nomC,
      prenom: this.prenom,
      email:this.email
    }
    this.http.post<any>('http://localhost:8000/api/clients/create', client)
    .subscribe((response)=>{
      console.log(response);

    })
  }

  onSubmit(form: NgForm){
    console.log(form.value);
  }

  delete(id: number): void{
    this.http.delete('http://localhost:8000/api/delete/'+id)
    .subscribe((resultData: any)=>{
      console.log('client supprimé!',resultData);
      this.getClients();

    })
  }
  
}

