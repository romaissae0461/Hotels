import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrl: './login.component.css'
})
export class LoginComponent implements OnInit{

  constructor(private http:HttpClient,private route: ActivatedRoute, private router:Router){}

  ngOnInit(): void {
    this.login();
  }

  login(){
    this.http.get('http://localhost:8000/api/login')
    .subscribe((response: any)=>{
      console.log(response);
    })
  }
  log(id: number){
    let user={

    }
    this.http.post('http://localhost:8000/api/log', user)
    .subscribe((response)=>{
      console.log(response);
    })
  }

}
