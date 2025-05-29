import { Component } from '@angular/core';
import { ReasonService } from '../../../services/reason.service';
import { Reason } from '../../../models/reason.model';
import { CommonModule } from '@angular/common';
import { NoItemPageComponent } from '../../../components/no-item-page.component';
import { first } from 'rxjs';

@Component({
  selector: 'app-reason',
  imports: [CommonModule, NoItemPageComponent],
  templateUrl: './reason.component.html',
  styles: ``
})
export class ReasonComponent {
  reasons: Reason[] = [];

  constructor(private ReasonService: ReasonService) { }

  ngOnInit(): void {
    this.loadReasons();
  }

  loadReasons(): void {
    this.ReasonService.getReasons()
      .pipe(first())
      .subscribe({
        next: (response) => {
          if (Array.isArray(response)) {
            this.reasons = response;
          } else {
            console.error('La respuesta no contiene un array de servicios');
            this.reasons = [];
          }
        },
        error: (error) => {
          console.error('Error al obtener servicios:', error);
          this.reasons = [];
        }
      });
  }
}
