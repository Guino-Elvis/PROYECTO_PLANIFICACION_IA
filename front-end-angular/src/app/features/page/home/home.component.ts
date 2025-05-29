import { Component } from '@angular/core';
import { ClientComponent } from '../client/client.component';
import { PlanComponent } from '../plan/plan.component';
import { ReasonComponent } from '../reason/reason.component';
import { ServiceComponent } from '../service/service.component';
import { HeaderComponent } from '../../partials/header/header.component';
import { FooterHomeComponent } from '../../partials/footer/footer.component';
import { ContactComponent } from '../contact/contact.component';

@Component({
  selector: 'app-home',
  standalone: true,
  imports: [
    ClientComponent,
    PlanComponent,
    ReasonComponent,
    ServiceComponent,
    HeaderComponent,
    FooterHomeComponent,
    ContactComponent
  ],
  templateUrl: './home.component.html',
  styles: ``
})
export class HomeComponent {

}
