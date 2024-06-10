import { HttpClient } from '@angular/common/http';
import { Component, ElementRef, OnInit } from '@angular/core';
import { MatSnackBar } from '@angular/material/snack-bar';

import { AuthService } from '../auth.service';
import { Router } from '@angular/router';



interface Comment {
  id: number;
  idC: number;
  comment: string;
  created_at: string;
  updated_at: string;
} 
@Component({
  selector: 'app-comments',
  templateUrl: './comments.component.html',
  styleUrl: './comments.component.css',
  host: {ngSkipHydration: 'true'},
})
export class CommentsComponent implements OnInit{
  comments: Comment[]=[];
  


  constructor(private http: HttpClient, private router:Router, public elementRef: ElementRef, private authService: AuthService, private snackBar: MatSnackBar){}

  ngOnInit(): void {
      this.getComments();
  }
  getComments(): void {
    this.http.get<Comment[]>('http://localhost:8000/api/comments')
      .subscribe((response) => {
        this.comments = response;
        console.log(response);
      }, (error) => {
        console.error('Erreur lors de la récupération des commentaires', error);
      });
  }


  deleteComment(commentId: number): void {
    this.http.delete(`http://localhost:8000/api/comment/delete/${commentId}`)
      .subscribe((response) => {
        this.snackBar.open('Comment deleted successfully', 'Close', { duration: 3000 });
        this.getComments(); // Refresh the comments list
      }, (error) => {
        console.error('Erreur lors de la suppression du commentaire', error);
        this.snackBar.open('Failed to delete comment', 'Close', { duration: 3000 });
      });
  }

  
}