import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Router } from '@angular/router';

@Injectable({
  providedIn: 'root'
})
export class AuthService {

  private user: any;
  constructor( private http:HttpClient, private router: Router) { }

  login(credentials: any) {
    return this.http.post('http://localhost:8000/api/login', credentials)
  }

  logout(){
    return this.http.post('http://localhost:8000/api/logout',{}).subscribe(()=>{
      this.user = null;
      localStorage.removeItem('user');
      this.router.navigate(['/login']);
    })
  }

  setUser(user:any){
    this.user=user;
    localStorage.setItem('user',JSON.stringify(user));
  }

  getUser(){
    if(!this.user){
      this.user = JSON.parse(localStorage.getItem('user')||'{}');
    }
    return this.user;
  }

  isAuthentification(): boolean{
    return !!this.getUser().id; //!!pour convertir une valeur en boolean
  }
  getUserId(){
    return this.getUser().idC;
  }


  
  sendResetLink(email: string) {
    return this.http.post('http://localhost:8000/api/password/email', { email });
  }

  resetPassword(data: any) {
    return this.http.post('http://localhost:8000/api/password/reset', data);
  }
}
