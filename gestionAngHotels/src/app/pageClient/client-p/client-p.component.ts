import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-client-p',
  templateUrl: './client-p.component.html',
  styleUrl: './client-p.component.css'
})
export class ClientPComponent implements OnInit {

  name: string='';
  email: string='';
  message: string='';
  contacts: any;
  constructor(private http: HttpClient){

  }
  ngOnInit(): void {
  }


  contactUs(): void{
    const contacts={
      name: this.name,
      email: this.email,
      message: this.message,
    }
    this.http.post<any>('http://localhost:8000/api/contacts/store', contacts)
    .subscribe((response: any)=>
    {
      console.log(response);
      this.contacts= response;
    })
  }


}
