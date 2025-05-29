import { Component } from '@angular/core';
import { Client } from '../../../models/client-model';
import { NoItemPageComponent } from '../../../components/no-item-page.component';
import { CommonModule } from '@angular/common';
import { ClientService } from '../../../services/client.service';
import { first } from 'rxjs';

@Component({
  selector: 'app-client',
  imports: [CommonModule, NoItemPageComponent],
  templateUrl: './client.component.html',
  styles: ``
})
export class ClientComponent {
  clients: Client[] = [];

  constructor(private ClientService: ClientService) { }

  ngOnInit(): void {
    this.loadClients();
  }

  loadClients(): void {
    this.ClientService.getClients()
      .pipe(first())
      .subscribe({
        next: (response) => {
          if (Array.isArray(response)) {
            this.clients = response;
          } else {
            console.error('La respuesta no contiene un array de servicios');
            this.clients = [];
          }
        },
        error: (error) => {
          console.error('Error al obtener servicios:', error);
          this.clients = [];
        }
      });
  }
}
