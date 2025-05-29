import { Injectable } from '@angular/core';
import { API_ENDPOINTS } from './api/api.endpoints';
import { ApiService } from './api.service';
import { Observable } from 'rxjs';
import { Client } from '../models/client-model';

@Injectable({
  providedIn: 'root'
})
export class ClientService {



  private endpoint = API_ENDPOINTS.CLIENT_HOME;

  constructor(private apiService: ApiService) { }

  getClients(): Observable<Client> {
    return this.apiService.get<Client>(this.endpoint);
  }
}
