import { Component } from '@angular/core';
import { LayoutComponent } from '../../partials/layout.component';
import { CustomLinkComponent } from '../../../components/custom-link.component';
import { FontAwesomeModule } from '@fortawesome/angular-fontawesome';
import { ICONS } from '../../../core/icons';
import { NoItemPageComponent } from '../../../components/no-item-page.component';
import { PaginationComponent } from '../../../components/table/pagination/pagination.component';
import { ReusableButtonComponent } from '../../../components/reusable-button.component';
import { CustomDatepickerComponent } from '../../../components/custom-datepicker/custom-datepicker.component';
import { ItemUpdatedAtComponent } from '../../../components/table/item-updated-at.component';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-curriculum',
  imports: [
    LayoutComponent,
    CustomLinkComponent,
    FontAwesomeModule,
    ReusableButtonComponent,
    CustomDatepickerComponent,
    CommonModule

  ],
  standalone: true,
  templateUrl: './curriculum.component.html',
  styles: ``
})
export class CurriculumComponent {
  icons = ICONS;
  sortOrder: 'asc' | 'desc' = 'desc';
  cards = Array(10); // Genera un arreglo con 6 elementos vacíos

}
