import { Component } from '@angular/core';
import { LayoutComponent } from '../../partials/layout.component';
import { CustomLinkComponent } from '../../../components/custom-link.component';
import { FontAwesomeModule } from '@fortawesome/angular-fontawesome';
import { ReusableButtonComponent } from '../../../components/reusable-button.component';
import { CustomDatepickerComponent } from '../../../components/custom-datepicker/custom-datepicker.component';
import { CommonModule } from '@angular/common';
import { ICONS } from '../../../core/icons';
@Component({
  selector: 'app-banco-planification',
  imports: [
    LayoutComponent,
    CustomLinkComponent,
    FontAwesomeModule,
    ReusableButtonComponent,
    CustomDatepickerComponent,
    CommonModule
  ],
  templateUrl: './banco-planification.component.html',
  styles: ``
})
export class BancoPlanificationComponent {
  icons = ICONS;
  sortOrder: 'asc' | 'desc' = 'desc';
  cards = Array(10);
}
