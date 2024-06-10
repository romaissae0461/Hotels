import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { MatSnackBar } from '@angular/material/snack-bar';
import { AuthService } from '../auth.service';


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
  constructor(private http:HttpClient,private route: ActivatedRoute, private router:Router, private snackBar: MatSnackBar,private authService: AuthService){}

  ngOnInit(): void {
    // this.login();
  }

  login() {
    const formData = {
      email: this.email,
      password: this.password,
    };
  
    this.authService.login(formData).subscribe(
      (response: any) => {
        console.log('Login response:', response);
  
        if (response && response.message === 'Authenticated') {
          if (response.user) {
            this.authService.setUser(response.user);
          } else {
            console.warn('User details not returned in response');
          }
  
          if (this.email === 'admin.admin@gmail.com') {
            this.router.navigate(['/manager']);
            this.openSnackBar('Bienvenue sur votre page de gestion');
          } else {
            this.router.navigate(['/']);
            this.openSnackBar('Connecté avec succès');
          }
        } else {
          console.error('Invalid response format:', response);
          this.openSnackBar('Erreur lors de la connexion');
        }
      },
      (error) => {
        console.error('Login error:', error);
        this.openSnackBar('Erreur lors de la connexion');
      }
    );
  }

//   login(){
//     const formData={
      
//       email:this.email,
//       password:this.password,
//     };
//     // this.http.post<any>('http://localhost:8000/api/login',formData)
//     this.authService.login(formData).subscribe((response: any)=>{
//       console.log(response);
//       this.authService.setUser(response.user);
//       if(this.email==='admin.admin@gmail.com'){
//         this.router.navigate(['/manager']);
//         this.openSnackBar('Bienvenue sur votre page de gestion');
//       }else if(this.name===this.name){
//         this.router.navigate(['/']);
//         this.openSnackBar('Connecté avec succès');
//       }
//     });
// }

openSnackBar(message: string) {
  this.snackBar.open(message, 'Close', {
    duration: 10000, // Duration in milliseconds
  });
}
 
}
