import { ComponentFixture, TestBed } from '@angular/core/testing';

import { DemandeReinitComponent } from './demande-reinit.component';

describe('DemandeReinitComponent', () => {
  let component: DemandeReinitComponent;
  let fixture: ComponentFixture<DemandeReinitComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [DemandeReinitComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(DemandeReinitComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
