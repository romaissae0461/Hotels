import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ReinitMDPComponent } from './reinit-mdp.component';

describe('ReinitMDPComponent', () => {
  let component: ReinitMDPComponent;
  let fixture: ComponentFixture<ReinitMDPComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ReinitMDPComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(ReinitMDPComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
