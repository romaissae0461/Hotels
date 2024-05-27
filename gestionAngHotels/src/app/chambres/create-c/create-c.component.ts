import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-create-c',
  templateUrl: './create-c.component.html',
  styleUrl: './create-c.component.css'
})
export class CreateCComponent implements OnInit{

  id: any;
  numC: string='';	
  nbrLits: string='';
  type_chambre_id: string='';
  prixC: any;
  etage: string='';
  status: number=1;
  successMessage: any;
  errorMessage: any;
  csrfToken: any;
  chambres: any;
  typeChambre: any;
  selectedImage: File | null = null;


  constructor(private http: HttpClient, private router: Router) { 

  }
  ngOnInit(): void {
    this.getChambres();
    this.getChambreType();
  }

  getChambres(){
    this.http.get<any>('http://localhost:8000/api/chambres')
    .subscribe((response)=>
    {
      console.log(response);
    })
  }

  getChambreDetails(id :number){
    this.http.get<any>('http://localhost:8000/api/chambre/'+id)
    .subscribe((response)=>{
      console.log(response);
    })
  }
  getChambreType():void{
    this.http.get('http://localhost:8000/api/chambre/type')
    .subscribe((response)=>{
      console.log(response);
      this.typeChambre = response;
    })
  }
  create(): void{
    const chambre= new FormData();
    chambre.append('numC', this.numC);
    chambre.append('nbrLits', this.nbrLits);
    chambre.append('type_chambre_id', this.type_chambre_id);
    chambre.append('prixC', this.prixC);
    chambre.append('etage', this.etage);
    chambre.append('status', this.status.toString());
    if (this.selectedImage) {
      chambre.append('image', this.selectedImage);
    }
    this.http.post<any>('http://localhost:8000/api/chambre/store', chambre)
    .subscribe((response)=>
    {
      console.log(response);
      this.chambres = response.chambres;
      this.router.navigate(['/chambres']);
    })
  }

  onFileChange(event: any): void {
    const fileList: FileList = event.target.files;
    if (fileList.length > 0) {
      this.selectedImage = fileList[0];
    }
  }

}
