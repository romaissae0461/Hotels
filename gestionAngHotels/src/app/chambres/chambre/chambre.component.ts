import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-chambre',
  templateUrl: './chambre.component.html',
  styleUrl: './chambre.component.css'
})
export class ChambreComponent implements OnInit{

  chambres: any;
  typeChambre: any;
  constructor(private http: HttpClient){

  }
  ngOnInit(): void {
    this.getChambres();
    this.getChambreType();
  }

  getChambres(){
    this.http.get('http://localhost:8000/api/chambres')
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
  
  getChambreDetails(id: number):void{
    this.http.get<any>('http://localhost:8000/api/chambre/show'+id)
    .subscribe((response)=>
    {
      console.log(response);
    })
  }

  delete(id: number): void{
    this.http.delete('http://localhost:8000/api/chambre/delete/'+id)
    .subscribe((response: any)=>
    {
      console.log('Chambre supprimée!',response);
      alert("La chambre numéro "+ id + " a été supprimé!");
      this.getChambres();
    })
  }
  
}
