import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { MatSnackBar } from '@angular/material/snack-bar';


@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrl: './login.component.css',
  host: {ngSkipHydration: 'true'},

})
export class LoginComponent implements OnInit{

  name: string='';
  email: string='';
  password:string = '';
  constructor(private http:HttpClient,private route: ActivatedRoute, private router:Router, private snackBar: MatSnackBar){}

  ngOnInit(): void {
    // this.login();
  }

  login(){
    const formData={
      
      email:this.email,
      password:this.password,
    };
    this.http.post<any>('http://localhost:8000/api/login',formData)
    .subscribe((response: any)=>{
      console.log(response);
      if(this.email==='admin.admin@gmail.com'){
        this.router.navigate(['/manager']);
        this.openSnackBar('Bienvenue sur votre page de gestion');
      }else if(this.name===this.name){
        this.router.navigate(['/']);
        this.openSnackBar('Connecté avec succès');
      }
    });
}

openSnackBar(message: string) {
  this.snackBar.open(message, 'Close', {
    duration: 10000, // Duration in milliseconds
  });
}
 
}
