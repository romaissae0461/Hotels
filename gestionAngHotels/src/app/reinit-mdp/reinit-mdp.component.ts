import { Component } from '@angular/core';
import { MatSnackBar } from '@angular/material/snack-bar';
import { ActivatedRoute, Router } from '@angular/router';
import { AuthService } from '../auth.service';

@Component({
  selector: 'app-reinit-mdp',
  templateUrl: './reinit-mdp.component.html',
  styleUrl: './reinit-mdp.component.css'
})
export class ReinitMDPComponent {

  token: string = '';
  email: string = '';
  password: string = '';
  password_confirmation: string = '';

  constructor(private route: ActivatedRoute, private passwordResetService: AuthService, private snackBar: MatSnackBar, private router: Router) {
    this.route.queryParams.subscribe(params => {
      this.token = params['token'];
      this.email = params['email'];
    });
  }

  resetPassword() {
    const data = {
      token: this.token,
      email: this.email,
      password: this.password,
      password_confirmation: this.password_confirmation
    };

    this.passwordResetService.resetPassword(data).subscribe(
      response => {
        this.snackBar.open('Password has been reset.', 'Close', { duration: 5000 });
        this.router.navigate(['/login']);
      },
      error => {
        this.snackBar.open('Unable to reset password.', 'Close', { duration: 5000 });
      }
    );
  }
}
