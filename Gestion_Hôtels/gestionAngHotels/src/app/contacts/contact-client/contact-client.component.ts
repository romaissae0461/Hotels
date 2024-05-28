import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-contact-client',
  templateUrl: './contact-client.component.html',
  styleUrl: './contact-client.component.css',
  host: {ngSkipHydration: 'true'},

})
export class ContactClientComponent implements OnInit{
  name: string='';
  email: string='';
  message: string='';
  contacts: any;
  successMessage: any;
  errorMessage: any;
  csrfToken: any;
  constructor(private http: HttpClient){

  }
  ngOnInit(): void {
    this.getContacts();
  }

  getContacts(): void{
    this.http.get<any>('http://localhost:8000/api/contacts')
    .subscribe((response: any)=>{
      console.log(response);
      this.contacts = response;
    })
  }

  create(): void{
    const contacts={
      name: this.name,
      email: this.email,
      message: this.message,
    }
    this.http.post<any>('http://localhost:8000/api/contacts/store', contacts)
    .subscribe((response: any)=>
    {
      console.log(response);
      this.getContacts();
      this.contacts= response;
    })
  }

}
