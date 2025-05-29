import { Injectable } from '@angular/core';
import { API_ENDPOINTS } from './api/api.endpoints';
import { ApiService } from './api.service';
import { Observable } from 'rxjs';
import { Reason } from '../models/reason.model';

@Injectable({
  providedIn: 'root'
})
export class ReasonService {


  private endpoint = API_ENDPOINTS.REASON_HOME;

  constructor(private apiService: ApiService,) { }

  getReasons(): Observable<Reason> {
    return this.apiService.get<Reason>(this.endpoint);
  }
}
