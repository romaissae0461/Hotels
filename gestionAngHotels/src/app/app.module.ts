import { NgModule } from '@angular/core';
import { BrowserModule, provideClientHydration } from '@angular/platform-browser';
import { HttpClientModule } from '@angular/common/http';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { ClientComponent } from './clients/client/client.component';
import { EditComponent } from './clients/edit/edit.component';
import { FormsModule } from '@angular/forms';
import { CreateComponent } from './clients/create/create.component';
import { LoginComponent } from './login/login.component';
import { ChambreComponent } from './chambres/chambre/chambre.component';
import { CreateCComponent } from './chambres/create-c/create-c.component';
import { EditCComponent } from './chambres/edit-c/edit-c.component';
import { ContactComponent } from './contacts/contact/contact.component';
import { ManagerComponent } from './managers/manager/manager.component';
import { ContactClientComponent } from './contacts/contact-client/contact-client.component';
import { CreateRComponent } from './reservations/create-r/create-r.component';
import { ReservationComponent } from './reservations/reservation/reservation.component';
import { EditRComponent } from './reservations/edit-r/edit-r.component';
import { PclientComponent } from './pageClient/pclient/pclient.component';
import { ClientPComponent } from './pageClient/client-p/client-p.component';
import { RoomsComponent } from './pageClient/rooms/rooms.component';
import { SlickCarouselModule } from 'ngx-slick-carousel';




@NgModule({
  declarations: [
    AppComponent,
    ClientComponent,
    EditComponent,
    CreateComponent,
    LoginComponent,
    ChambreComponent,
    CreateCComponent,
    EditCComponent,
    ReservationComponent,
    ContactComponent,
    ManagerComponent,
    ContactClientComponent,
    CreateRComponent,
    EditRComponent,
    ClientPComponent,
    PclientComponent,
    RoomsComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule, 
    FormsModule,
    SlickCarouselModule,

  ],
  providers: [
    provideClientHydration()
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
