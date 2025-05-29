import { Component } from '@angular/core';
import { LayoutComponent } from '../../partials/layout.component';
import { CustomLinkComponent } from '../../../components/custom-link.component';
import { FontAwesomeModule } from '@fortawesome/angular-fontawesome';
import { CommonModule } from '@angular/common';
import { ICONS } from '../../../core/icons';
import { ReusableButtonComponent } from '../../../components/reusable-button.component';
import { CustomDatepickerComponent } from '../../../components/custom-datepicker/custom-datepicker.component';

@Component({
  selector: 'app-planning',
  imports: [
    LayoutComponent,
    CustomLinkComponent,
    FontAwesomeModule,
    ReusableButtonComponent,
    CustomDatepickerComponent,
    CommonModule
  ],
  templateUrl: './planning.component.html',
  styles: ``
})
export class PlanningComponent {
  icons = ICONS;
  sortOrder: 'asc' | 'desc' = 'desc';
  planificaciones = Array(10);
}
