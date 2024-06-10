import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Router } from '@angular/router';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class AuthService {

  private user: any;
  private clientId: string | null = null;
  constructor( private http:HttpClient, private router: Router) { }

  
 
  setClientId(id: string) {
    this.clientId = id;
    localStorage.setItem('clientId', id);
  }

  getClientId(){
    if (!this.clientId) {
      this.clientId = localStorage.getItem('clientId');
    }
    return this.clientId;
  }

  
  
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

  setUser(user: any) {
    if (!user) {
      console.warn('User details are undefined');
      return;
    }
    
    localStorage.setItem('user_id', user.user_id);
    localStorage.setItem('user_email', user.email);
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
    return localStorage.getItem('userId') || '';
  }


  
  sendResetLink(email: string) {
    return this.http.post('http://localhost:8000/api/password/email', { email });
  }

  resetPassword(data: any) {
    return this.http.post('http://localhost:8000/api/password/reset', data);
  }

}