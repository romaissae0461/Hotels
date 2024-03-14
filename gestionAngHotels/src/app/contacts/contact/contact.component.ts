import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { response } from 'express';

@Component({
  selector: 'app-contact',
  templateUrl: './contact.component.html',
  styleUrl: './contact.component.css'
})
export class ContactComponent implements OnInit{
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

  delete(id: number): void{
    this.http.delete('http://localhost:8000/api/contacts/delete/'+id)
    .subscribe((response)=>{
      console.log(response);
      alert('Message supprimé!');
      this.getContacts();
    })
  }

}
