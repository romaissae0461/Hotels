import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { NgForm, FormsModule } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-edit',
  templateUrl: './edit.component.html',
  styleUrl: './edit.component.css'
})
export class EditComponent implements OnInit {

  idC=1;
  nomC: string='';
  prenom: string='';
  email: string='';
clients: any;
  adresse: string='';
  telephone: string='';
successMessage: any;
errorMessage: any;
  constructor(private http: HttpClient, private route: ActivatedRoute, private router: Router){}
  ngOnInit(): void {
    this.route.params.subscribe(params => {
      this.idC = params['id']; 
      this.getClientDetails(this.idC); 
    });
  }

  
  getClients(){
    this.http.get("http://localhost:8000/api/index")
    .subscribe((resultData: any)=>
    {
      console.log(resultData);
      this.clients = resultData;
    })
  }

  getClientDetails(id: number): void{
    this.http.get<any>("http://localhost:8000/api/clients/"+id)
    .subscribe(
      (resultData)=>{
        console.log(resultData);
        // this.getClients();
        this.clients = resultData;
        
      this.nomC=resultData.nomC;
      this.prenom=resultData.prenom;
      this.adresse= resultData.adresse;
      this.telephone=resultData.telephone;
      this.email=resultData.email;
      }
    )
  }
  
  
  
  
  update(id: number){
    let updatedData={
      "nomC": this.nomC,
      "prenom": this.prenom,
      "adresse": this.adresse,
      "telephone": this.telephone,
      "email": this.email,
    };
    console.log(updatedData);
    this.http.put<any>('http://localhost:8000/api/clients/'+id, updatedData)
    .subscribe((response: any)=>
    {
      console.log(response);
      alert('Les informations du client ont bien été modifié!');
      // if(Array.isArray(response.data)){
      //   this.clients = response.data;
      // }else{
      //   this.clients = response;
      // }      
      this.getClientDetails(id);
      this.router.navigate(['/clients']); 
      // this.window.location.reload();
    },
    (error)=>{
      console.log(error);
    }
    )
  }


  onSubmit(form: NgForm){
    console.log(form.value);
  }

}
