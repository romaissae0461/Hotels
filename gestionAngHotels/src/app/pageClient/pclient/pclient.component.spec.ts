import { ComponentFixture, TestBed } from '@angular/core/testing';

import { PclientComponent } from './pclient.component';

describe('PclientComponent', () => {
  let component: PclientComponent;
  let fixture: ComponentFixture<PclientComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [PclientComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(PclientComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
