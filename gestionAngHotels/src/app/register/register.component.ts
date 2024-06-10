import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrl: './register.component.css',
  host: {ngSkipHydration: 'true'},

})
export class RegisterComponent implements OnInit{

  name: string = '';
  prenom: string = '';
  adresse: string = '';
  telephone: string = '';
  email: string = '';
  password: string = '';
  confirmer: string = '';
  constructor(private http:HttpClient,private route: ActivatedRoute, private router:Router){}

  ngOnInit(): void {
    this.register();
  }



  register(){
    // if (this.password !== this.confirmer) {
    //   console.log("Les mots de passe ne correspondent pas");
    //   return;
    // }

    let user = {
      name: this.name,
      prenom: this.prenom,
      adresse: this.adresse,
      telephone: this.telephone,
      email: this.email,
      password: this.password,
    };

    this.http.post('http://localhost:8000/api/getin', user)
    .subscribe((response: any)=>{
      console.log(response);
      this.router.navigate(['/']);
    },
    (error)=>console.log(error));
  }
}
