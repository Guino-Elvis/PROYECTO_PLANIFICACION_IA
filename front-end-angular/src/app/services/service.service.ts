import { Injectable } from '@angular/core';
import { API_ENDPOINTS } from './api/api.endpoints';
import { ApiService } from './api.service';
import { Observable } from 'rxjs';
import { Service } from '../models/service.model';

@Injectable({
  providedIn: 'root'
})
export class ServiceService {

  private endpoint = API_ENDPOINTS.SERVICE_HOME;

  constructor(private apiService: ApiService,) { }

  getServices(): Observable<Service> {
    return this.apiService.get<Service>(this.endpoint);
  }
}
