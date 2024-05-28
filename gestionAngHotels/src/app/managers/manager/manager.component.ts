import { HttpClient } from '@angular/common/http';
import { Component, OnInit, ViewChild,inject } from '@angular/core';
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
import { Breakpoints, BreakpointObserver } from '@angular/cdk/layout';
import { map } from 'rxjs/operators';
import Chart from 'chart.js/auto'
@Component({
  selector: 'app-manager',
  templateUrl: './manager.component.html',
  styleUrl: './manager.component.css',
  host: {ngSkipHydration: 'true'},
})
export class ManagerComponent implements OnInit {

totalBooking: number = 1245;
  availableRooms: number = 287;
  newCustomers: number = 1532;
  totalRevenue: number = 22567;
enquiries: any;
collections: any;
bookings: any;
 title: string='';
  
clients: any;
user: any;

 reservations: any[] = [
    {
      name: 'Romaissae Errachdi',
      checkIn: '2024-06-01',
      checkOut: '2024-06-05',
      status: 'Confirmed',
      phone: '1234567890',
      roomType: 'Single',
      
    },
    {
      name: 'Israe Errachdi',
      checkIn: '2024-06-03',
      checkOut: '2024-06-08',
      status: 'Pending',
      phone: '0987654321',
      roomType: 'Double',
      
    },
  ];
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

  private breakpointObserver = inject(BreakpointObserver);

  /** Based on the screen size, switch from standard to one column per row */
  cards = this.breakpointObserver.observe(Breakpoints.Handset).pipe(
    map(({ matches }) => {
      if (matches) {
        return [
          { title: 'Card 1', cols: 1, rows: 1 },
          { title: 'Card 2', cols: 1, rows: 1 },
          { title: 'Card 3', cols: 1, rows: 1 },
          { title: 'Card 4', cols: 1, rows: 1 }
        ];
      }

      return [
        { title: 'Card 1', cols: 2, rows: 1 },
        { title: 'Card 2', cols: 1, rows: 1 },
        { title: 'Card 3', cols: 1, rows: 2 },
        { title: 'Card 4', cols: 1, rows: 1 }
      ];
    })
  );
  cardLayout = this.breakpointObserver.observe(Breakpoints.Handset).pipe(
    map(({ matches }) => {
      if (matches) {
        return {
          columns: 1,
          miniCard: { cols: 1, rows: 1 },
          chart: { cols: 1, rows: 2 },
          table: { cols: 1, rows: 4 },
        };
      }
 
     return {
        columns: 4,
        miniCard: { cols: 1, rows: 1 },
        chart: { cols: 2, rows: 2 },
        table: { cols: 4, rows: 4 },
      };
    })
  );
 

}
