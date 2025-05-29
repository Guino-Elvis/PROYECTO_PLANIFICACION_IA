import { CommonModule } from '@angular/common';
import { Component } from '@angular/core';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-contact',
  imports: [CommonModule,FormsModule],
  templateUrl: './contact.component.html',
  styles: ``
})
export class ContactComponent {
  onSubmit() {
    // Aquí puedes manejar la lógica del formulario
    console.log('Formulario enviado');
  }
}
