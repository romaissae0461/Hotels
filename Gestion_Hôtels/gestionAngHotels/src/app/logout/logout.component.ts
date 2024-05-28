import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-logout',
  templateUrl: './logout.component.html',
  styleUrl: './logout.component.css'
})
export class LogoutComponent implements OnInit{

  email: string='';
  password: string='';
  constructor(private http:HttpClient,private route: ActivatedRoute, private router:Router){}

  ngOnInit(): void {
   
  }

  logout(){
    const data={
      email: this.email,
      password: this.password,
    }
    this.http.post('http://localhost:8000/api/logout',data)
    .subscribe((response:any)=>{
      console.log("Logged out");
    })
  }
}

