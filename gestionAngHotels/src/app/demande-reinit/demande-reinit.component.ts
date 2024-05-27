import { Component } from '@angular/core';
import { MatSnackBar } from '@angular/material/snack-bar';
import { AuthService } from '../auth.service';

@Component({
  selector: 'app-demande-reinit',
  templateUrl: './demande-reinit.component.html',
  styleUrl: './demande-reinit.component.css'
})
export class DemandeReinitComponent {

  email: string = '';

  constructor(private passwordResetService: AuthService, private snackBar: MatSnackBar) {}

  sendResetLink() {
    this.passwordResetService.sendResetLink(this.email).subscribe(
      response => {
        this.snackBar.open('Un lien de réinitalisation est envoyé à votre email.', 'Close', { duration: 5000 });
      },
      error => {
        console.error(error);
        this.snackBar.open('Unable to send reset link.', 'Close', { duration: 5000 });
      }
    );
  }
}
