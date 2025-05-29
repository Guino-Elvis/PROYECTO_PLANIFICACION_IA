import { Component } from '@angular/core';
import { LayoutComponent } from '../../partials/layout.component';
import { CustomLinkComponent } from '../../../components/custom-link.component';
import { FontAwesomeModule } from '@fortawesome/angular-fontawesome';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-chat',
  imports: [
    LayoutComponent,
    CustomLinkComponent,
    FontAwesomeModule,
    CommonModule
  ],
  templateUrl: './chat.component.html',
  styles: ``
})
export class ChatComponent {

}
