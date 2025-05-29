import { CommonModule } from '@angular/common';
import { Component } from '@angular/core';
import { NoItemPageComponent } from '../../../components/no-item-page.component';
import { Plan } from '../../../models/plan.model';
import { PlanService } from '../../../services/plan.service';
import { first } from 'rxjs';
import { ICONS } from '../../../core/icons';
import { FontAwesomeModule } from '@fortawesome/angular-fontawesome';

@Component({
  selector: 'app-plan',
  imports: [CommonModule, NoItemPageComponent, FontAwesomeModule],
  templateUrl: './plan.component.html',
  styles: ``
})
export class PlanComponent {
  plans: Plan[] = [];
  icons = ICONS;

  constructor(private PlanService: PlanService) { }

  ngOnInit(): void {
    this.loadPlans();
  }

  loadPlans(): void {
    this.PlanService.getPlans()
      .pipe(first())
      .subscribe({
        next: (response) => {
          if (Array.isArray(response)) {
            this.plans = response;
          } else {
            console.error('La respuesta no contiene un array de servicios');
            this.plans = [];
          }
        },
        error: (error) => {
          console.error('Error al obtener servicios:', error);
          this.plans = [];
        }
      });
  }
}
