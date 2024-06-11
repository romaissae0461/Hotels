import { Component } from '@angular/core';
import { MatSnackBar } from '@angular/material/snack-bar';
import { AuthService } from '../auth.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-demande-reinit',
  templateUrl: './demande-reinit.component.html',
  styleUrl: './demande-reinit.component.css',
  host: {ngSkipHydration: 'true'},
})
export class DemandeReinitComponent {

  email: string = '';

  constructor(private passwordResetService: AuthService, private snackBar: MatSnackBar, private router:Router) {}

  sendResetLink() {
    this.passwordResetService.sendResetLink(this.email).subscribe(
      response => {
        this.snackBar.open('Un lien de réinitalisation est envoyé à votre email.', 'Close', { duration: 5000 });
        this.router.navigate(['/réinitialisation']);
      },
      error => {
        console.error(error);
        this.snackBar.open('Unable to send reset link.', 'Close', { duration: 5000 });
      }
    );
  }
}
