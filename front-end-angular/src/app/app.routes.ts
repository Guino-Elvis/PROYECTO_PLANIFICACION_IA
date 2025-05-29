import { Routes } from '@angular/router';
import { WelcomeComponent } from './features/welcome/welcome.component';
import { LoginComponent } from './features/auth/login/login.component';
import { authGuard } from './guards/auth.guard';
import { RegisterComponent } from './features/auth/register/register.component';
import { CategoryListComponent } from './admin/page/category/category-list.component';
import { CompanyListComponent } from './admin/page/company/company-list.component';
import { AdministrationUserListComponent } from './admin/page/administration-user/administration-user-list.component';
import { HomeComponent } from './features/page/home/home.component';
import { CurriculumComponent } from './admin/page/curriculum/curriculum.component';
import { PublicationComponent } from './admin/page/publication/publication.component';
import { GeneratorComponent } from './admin/page/generator/generator.component';
import { PlanningComponent } from './admin/page/planning/planning.component';
import { ChatComponent } from './admin/page/chat/chat.component';
import { RepositorioComponent } from './admin/page/repositorio/repositorio.component';
import { BancoPlanificationComponent } from './admin/page/banco-planification/banco-planification.component';


export const routes: Routes = [

    { path: 'home', component: HomeComponent },
    { path: 'login', component: LoginComponent },
    { path: 'register', component: RegisterComponent },
    { path: 'welcome', component: WelcomeComponent, canActivate: [authGuard] },
    { path: 'categoria', component: CategoryListComponent, canActivate: [authGuard] },
    { path: 'company', component: CompanyListComponent, canActivate: [authGuard] },
    { path: 'administration-user', component: AdministrationUserListComponent, canActivate: [authGuard] },
    { path: 'curriculum', component: CurriculumComponent, canActivate: [authGuard] },
    { path: 'publication', component: PublicationComponent, canActivate: [authGuard] },
    { path: 'generator', component: GeneratorComponent, canActivate: [authGuard] },
    { path: 'planning', component: PlanningComponent, canActivate: [authGuard] },
    { path: 'chat', component: ChatComponent, canActivate: [authGuard] },
    { path: 'repositorio', component: RepositorioComponent, canActivate: [authGuard] },
    { path: 'banco-planification', component: BancoPlanificationComponent, canActivate: [authGuard] },




    { path: '', redirectTo: '/home', pathMatch: 'full' },
    { path: '**', redirectTo: '/home' }
];
