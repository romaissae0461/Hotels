import { ComponentFixture, TestBed } from '@angular/core/testing';

import { Chambre1Component } from './chambre1.component';

describe('Chambre1Component', () => {
  let component: Chambre1Component;
  let fixture: ComponentFixture<Chambre1Component>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [Chambre1Component]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(Chambre1Component);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
