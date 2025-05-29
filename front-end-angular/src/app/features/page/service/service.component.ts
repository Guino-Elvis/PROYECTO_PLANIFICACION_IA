import { Component } from '@angular/core';
import { Service } from '../../../models/service.model';
import { ServiceService } from '../../../services/service.service';
import { first, Subscription } from 'rxjs';
import { CommonModule } from '@angular/common';
import { NoItemPageComponent } from '../../../components/no-item-page.component';

@Component({
  selector: 'app-service',
  imports: [CommonModule, NoItemPageComponent],
  templateUrl: './service.component.html',
  styles: ``
})
export class ServiceComponent {
  services: Service[] = [];

  constructor(private serviceService: ServiceService) { }

  ngOnInit(): void {
    this.loadServices();
  }

  loadServices(): void {
    this.serviceService.getServices()
      .pipe(first())
      .subscribe({
        next: (response) => {
          if (Array.isArray(response)) {
            this.services = response;  // Asignar el array a la variable
          } else {
            console.error('La respuesta no contiene un array de servicios');
            this.services = [];
          }
        },
        error: (error) => {
          console.error('Error al obtener servicios:', error);
          this.services = [];  // limpiar para evitar errores en la vista
        }
      });
  }


}
