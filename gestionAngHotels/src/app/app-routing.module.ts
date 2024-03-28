import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { ClientComponent } from './clients/client/client.component';
import { EditComponent } from './clients/edit/edit.component';
import { CreateComponent } from './clients/create/create.component';
import { ChambreComponent } from './chambres/chambre/chambre.component';
import { EditCComponent } from './chambres/edit-c/edit-c.component';
import { CreateCComponent } from './chambres/create-c/create-c.component';
import { ContactComponent } from './contacts/contact/contact.component';
import { ManagerComponent } from './managers/manager/manager.component';
import { ContactClientComponent } from './contacts/contact-client/contact-client.component';
import { CreateRComponent } from './reservations/create-r/create-r.component';
import { ReservationComponent } from './reservations/reservation/reservation.component';
import { EditRComponent } from './reservations/edit-r/edit-r.component';
import { PclientComponent } from './pageClient/pclient/pclient.component';
import { RoomsComponent } from './pageClient/rooms/rooms.component';
import { ClientPComponent } from './pageClient/client-p/client-p.component';

const routes: Routes = [
  { path: '', redirectTo: '/home', pathMatch: 'full' },
  {path: 'home', component:PclientComponent},
  {path: 'clients', component: ClientComponent},
  {path: 'create', component:CreateComponent},
  {path: 'edit/:id', component: EditComponent},
  {path: 'chambres', component:ChambreComponent},
  {path: 'create-c', component:CreateCComponent},
  {path: 'edit-c/:id', component:EditCComponent},
  {path: 'reservations', component:ReservationComponent},
  {path: 'contacts', component:ContactComponent},
  {path: 'manager', component:ManagerComponent},
  {path: 'contact/client', component:ContactClientComponent},
  {path: 'create-r', component:CreateRComponent},
  {path: 'edit-r', component:EditRComponent},
  {path: 'rooms', component:RoomsComponent},
  {path: 'clientP', component:ClientPComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
