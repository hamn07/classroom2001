
public class ThreadObject {

	public static void main(String[] args) {
		ServerThreads st1 = new ServerThreads("bella");
		ServerThreads st2 = new ServerThreads("vivian");
		st1.start();
		st2.start();
		System.out.println("penny");
		try {
			Thread.sleep(1000);
		} catch (InterruptedException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		System.out.println("henry");
		// trigger InterruptedException例外用
		st1.interrupt();
		
		ServerRunnable sr1 = new ServerRunnable("bella.runnable");
		Thread t1 = new Thread(sr1);
		t1.start();
	}

}

class ServerThreads extends Thread{
	private String name;
	public ServerThreads(String s) {
		name = s;
	}
	
	@Override
	public void run() {
		for (int i = 0; i < 20; i++) {
			try {
				Thread.sleep(200);
			} catch (InterruptedException e) {
				break;
			}
			System.out.println(name+":"+i);
		}
	}
}

class ServerRunnable implements Runnable{
	private String name;
	public ServerRunnable(String s) {
		name = s;
	}
	
	@Override
	public void run() {
		for (int i = 0; i < 20; i++) {
			try {
				Thread.sleep(200);
			} catch (InterruptedException e) {
			}
			System.out.println(name+":"+i);
		}
	}
}