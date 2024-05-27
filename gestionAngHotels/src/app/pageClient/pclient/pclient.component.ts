import { HttpClient } from '@angular/common/http';
import { Component, ElementRef, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';
import { SlickCarouselComponent } from 'ngx-slick-carousel';
import { AuthService } from '../../auth.service';


@Component({
  selector: 'app-pclient',
  templateUrl: './pclient.component.html',
  styleUrl: './pclient.component.css',
  host: {ngSkipHydration: 'true'},

})
export class PclientComponent implements OnInit {

  // slides = [
  //   { src: '../assets/image/banner-1.png', alt: 'The Hotel', width: 1400, height: 800, display: 'block' },
  //   { src: '../assets/luna/luna1.jpg', alt: 'The Hotel', width: 1400, height: 800, display: 'none' }
  // ];
  currentSlideIndex = 0;
  name: string='';
  email: string='';
  password: string='';
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
  idC: any;
  chambres: any;
  availableRooms: any[] = []; 
  comment: string='';
  
  // slideConfig = {
  //   autoplay: true,
  //   slidesToShow: 1,
  //   slidesToScroll: 1,
  //   arrows: true,
  //   dots: true
  // };

  
  slides = [
    { url: '../assets/luna/banner1.avif', alt: 'Slide 1' },
    { url: '../assets/luna/banner2.webp', alt: 'Slide 2' },
    { url: '../assets/luna/banner3.jpg', alt: 'Slide 3' },
    { url: '../assets/luna/banner4.webp', alt: 'Slide 4' },
    { url: '../assets/luna/banner5.jpg', alt: 'Slide 4' }
  ]
  slideIndex= 0;
typeChambre: any;
chambre: any;
  errorMessage: any;
  formSubmitted: boolean=false;

  constructor(private http: HttpClient, private router:Router, public elementRef: ElementRef, private authService: AuthService){
    
  }
  ngOnInit(): void {
     this.getChambres();
     this.showSlides();
     //this.loadMap();
     //this.checkAvailability();
     this.idC = this.authService.getUserId();
    }
  
    redirectToReservation(id: number): void {
      this.router.navigate(['/create-r'], { queryParams: { id: id } });
    }
  
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
        setTimeout(() => this.showSlides(), 3000);
      }
    }
    // loadMap() {
    //   const hotelLocation = { lat: 34.03367460399428, lng:  -5.005434830689442 }; // Coordonnées de l'hôtel
    //   const mapElement = document.getElementById('map');
    //   if (mapElement instanceof HTMLElement) {
    //     const map = new google.maps.Map(mapElement, {
    //       center: hotelLocation,
    //       zoom: 15 
    //     });
  
    //     new google.maps.Marker({
    //       position: hotelLocation,
    //       map: map,
    //       title: 'Hôtel'
    //     });
    //   } else {
    //     console.error('L\'élément avec l\'ID "map" n\'a pas été trouvé.');
    //   }
    // }
    
    logout(){
      this.http.post<any>('http://localhost:8000/api/logout', {})
      .subscribe(
        (response) => {
          console.log('Logged out successfully');
          // Redirect to login or any other page after logout
          this.router.navigate(['/login']);
        },
        (error) => {
          console.error('Error logging out:', error);
        }
      );
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
      //this.contacts= response;
      if(Array.isArray(response.data)){
        this.contacts=response.data;
      }else{
        this.contacts=response;
      }
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
  
  checkAvailability(): void{
    this.formSubmitted = true;
    const reserv={
      dateArrivee: this.dateArrivee,
      dateDepart: this.dateDepart,
      nbrChambre: this.nbrChambre,
      nbrPersonne: this.nbrPersonne,
    }
    this.http.post<any>('http://localhost:8000/api/reservation/check', reserv)
    .subscribe((response)=>{
      console.log(response);
      this.availableRooms = response;
      if(response.error){
        this.availableRooms=[];
        this.errorMessage=response.error;
      }
      else{
        this.availableRooms=response;
        this.errorMessage='';
      }
    },
    (error) => {
      console.error('Erreur lors de la demande de disponibilité des chambres :', error);
    });
  }

  getChambres(){
    this.http.get<any>('http://localhost:8000/api/chambres')
    .subscribe((response: any)=>{
      console.log(response);
      this.chambres=response;
    })
  }

  onSubmit(form: NgForm){
    console.log(form.value);
  }
  
  commentaire(){
    let comments={
      idC:this.idC,
      comment : this.comment,
    }
    this.http.post<any>('http://localhost:8000/api/comment/add',comments)
    .subscribe((response: any)=>{
      console.log(response);
    })
  }
}
