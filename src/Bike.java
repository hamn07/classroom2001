
public class Bike {
	private double speed;//encapsulate
	
	Bike(){
		speed=1;
	}
	
	void upSpeed(){
		speed*=1.2;
	}
	// overload
	void upSpeed(double r){
		speed*=r;
	}
	void downSpeed(){
		speed*=0.8;
	}
	double getSpeed(){
		return this.speed;
	}
}
