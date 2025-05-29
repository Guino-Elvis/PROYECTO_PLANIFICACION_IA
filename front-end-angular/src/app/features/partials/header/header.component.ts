import { Component, HostListener } from '@angular/core';
import { User } from '../../../models/user.model';
import { Router, RouterModule } from '@angular/router';
import { CommonModule } from '@angular/common';
import { AuthService } from '../../../services/auth.service';
import { Subscription } from 'rxjs';

@Component({
  selector: 'app-header',
  imports: [CommonModule, RouterModule],
  templateUrl: './header.component.html',
  styles: ``
})
export class HeaderComponent {
  isScrolled = false;
  userData: User | null = null;
  isChecking = true;
  mobileMenuOpen = false;
  // private userSubscription: Subscription = new Subscription();

  baseNavigation = [
    { name: 'Dashboard', href: '/', current: false },
    { name: 'Team', href: '/', current: false },
    { name: 'Projects', href: '/', current: false }
  ];

  constructor(
    private router: Router,
    // private authService: AuthService,
  ) {}

  get navigation() {
    return this.userData
      ? [...this.baseNavigation, { name: 'Sistema', href: '/dashboard-admin', current: false }]
      : this.baseNavigation;
  }

  // ngOnInit() {
  //   if (this.isAuthenticated()) {
  //     this.fetchUserData();
  //   } else {
  //     this.userData = null;
  //     this.isChecking = false;
  //   }
  // }

  // isAuthenticated(): boolean {
  //   return !!localStorage.getItem('token');  // Cambia aquí si tienes otro método de autenticación
  // }

  // fetchUserData() {
  //   this.userSubscription = this.authService.getUserData().subscribe({
  //     next: (response) => {
  //       this.userData = response;
  //       this.isChecking = false;
  //     },
  //     error: (error) => {
  //       console.error('Error al obtener los datos del usuario:', error);
  //       this.userData = null;
  //       this.isChecking = false;
  //     }
  //   });
  // }

  // ngOnDestroy(): void {
  //   this.userSubscription.unsubscribe();
  // }

  @HostListener('window:scroll')
  onScroll() {
    this.isScrolled = window.scrollY > 0;
  }

  // logout(): void {
  //   this.authService.logout().subscribe({
  //     next: () => {
  //       console.log('Sesión cerrada correctamente');
  //       localStorage.removeItem('token');
  //       this.router.navigate(['/login']);
  //     },
  //     error: (error) => {
  //       console.error('Error al cerrar sesión:', error);
  //     }
  //   });
  // }
}
