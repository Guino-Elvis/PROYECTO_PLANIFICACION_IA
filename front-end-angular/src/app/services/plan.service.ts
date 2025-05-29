import { Injectable } from '@angular/core';
import { API_ENDPOINTS } from './api/api.endpoints';
import { ApiService } from './api.service';
import { Plan } from '../models/plan.model';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class PlanService {


  private endpoint = API_ENDPOINTS.PLAN_HOME;

  constructor(private apiService: ApiService) { }

  getPlans(): Observable<Plan> {
    return this.apiService.get<Plan>(this.endpoint);
  }
}
