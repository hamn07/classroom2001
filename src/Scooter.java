import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.IOException;
import java.util.Calendar;


public class Scooter extends Bike {
	
	Scooter(){
		//三擇一
		//super();
		//super(1.2);
		this(1.2);
	}
	Scooter(double a){
		Calendar c = Calendar.getInstance();
		try {
			FileInputStream fis = new FileInputStream("k");
			fis.close();
		} catch (FileNotFoundException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		Scooter scrooter = new Scooter();
	}

}
