import { HttpClient } from '@angular/common/http';
import { Component, OnInit, ViewChild } from '@angular/core';
import { NgForm } from '@angular/forms';
import { MatMenuPanel, MatMenuTrigger } from '@angular/material/menu';
import { MatSidenav } from '@angular/material/sidenav';
import { MatIcon } from '@angular/material/icon';
import {
  faHome,
  faChartBar,
  faComment,
  faBookmark,
  faUser,
  } from '@fortawesome/free-solid-svg-icons';

@Component({
  selector: 'app-manager',
  templateUrl: './manager.component.html',
  styleUrl: './manager.component.css',
  host: {ngSkipHydration: 'true'},
})
export class ManagerComponent implements OnInit {
  totalClients: number=100;
  totalReservations: number=70;
  recentActivities: string[]=['Ajouter client', 'Créer Reservation', 'Modifier Reservation'];

  home = faHome;
chart = faChartBar;
message = faComment;
bookmark = faBookmark;
user = faUser;
 
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


  toggleSidenav(sidenav: MatSidenav) {
    sidenav.toggle();
  }
}
