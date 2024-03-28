import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-client-p',
  templateUrl: './client-p.component.html',
  styleUrl: './client-p.component.css',
  host: {ngSkipHydration: 'true'},

})
export class ClientPComponent implements OnInit {

  name: string='';
  email: string='';
  message: string='';
  contacts: any;
  nom: string='';
  prenom: string='';
  dateReserv: Date=new Date();
  dateArrivee: Date=new Date();
  dateDepart: Date=new Date();
  nbrChambre: number=0;
  nbrPersonne: number=0;
  id: any;
  chambres: any;
  constructor(private http: HttpClient){

  }
  ngOnInit(): void {
    this.getChambres();
    this.showSlides();
  }

 
  slides = [
    { url: '../assets/image/banner-1.png', alt: 'Slide 1' },
    { url: '../assets/image/banner-2.png', alt: 'Slide 2' },
    // { url: 'assets/slide3.jpg', alt: 'Slide 3' }
  ]
  slideIndex= 0;
 
  showSlides() {
    // Ensure slides is defined and not empty
    if (this.slides && this.slides.length > 0) {
      let i;
      const slides = document.getElementsByClassName("mySlides") as HTMLCollectionOf<HTMLElement>;
      for (i = 0; i < slides.length; i++) {
        // Check if slides[i] is defined before accessing its style property
        if (slides[i]) {
          slides[i].style.display = "none";
        }
      }
      this.slideIndex++;
      if (this.slideIndex > slides.length) { this.slideIndex = 1 }
      // Check if slides[this.slideIndex-1] is defined before accessing its style property
      if (slides[this.slideIndex - 1]) {
        slides[this.slideIndex - 1].style.display = "block";
      }
      setTimeout(() => this.showSlides(), 2000);
    }
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

  reservation(){
    this.http.get<any>('http://localhost:8000/api/reservation')
    .subscribe((response)=>
    {
      console.log(response);
    })
  }

  store():void{
    let reservation={
      nom: this.nom,
      prenom: this.prenom,
      email: this.email,
      dateReserv : this.dateReserv,
      dateArrivee: this.dateArrivee,
      dateDepart: this.dateDepart,
      nbrChambre: this.nbrChambre,
      nbrPersonne: this.nbrPersonne,
      id: this.id,
    }
    this.http.post<any>('http://localhost:8000/api/reservation/store', reservation)
    .subscribe((response)=>
    {
      console.log(response);
      this.getChambres();
      this.reservation = response;
    })
  }
  
  getChambres(){
    this.http.get('http://localhost:8000/api/chambres')
    .subscribe((response: any)=>{
      console.log(response);
      this.chambres=response;
    })
  }

  
}
