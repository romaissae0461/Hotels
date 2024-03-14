import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';

@Component({
  selector: 'app-manager',
  templateUrl: './manager.component.html',
  styleUrl: './manager.component.css'
})
export class ManagerComponent implements OnInit {
  totalClients: number=100;
  totalReservations: number=70;
  recentActivities: string[]=['Ajouter client', 'Créer Reservation', 'Modifier Reservation'];
  constructor(private http: HttpClient){

  }
  ngOnInit(): void {
    this.getManager();
  }

  getManager(){
    this.http.get('http://localhost:8000/api/manager/dashboard')
    .subscribe((response)=>{
      console.log(response);
    })
  }
  onSubmit(form: NgForm){
    console.log(form.value);
  }


}
