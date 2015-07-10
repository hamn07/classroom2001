import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.net.ServerSocket;
import java.net.Socket;
import java.net.UnknownHostException;


public class network {

	final static String ip="127.0.0.1";
//	final static String ip="10.2.24.156";
	public static void main(String[] args) {
//		InetAddress ip;
//		try {
//			ip = InetAddress.getByName("10.2.24.31");
//			System.out.println(ip.getHostAddress());
//		} catch (UnknownHostException e) {
//			e.printStackTrace();
//		}
		
//		try {
//			byte[] buf = "hello, I'm Henry".getBytes();
//			DatagramSocket socket = new DatagramSocket();
//			DatagramPacket packet = new DatagramPacket(buf, buf.length, InetAddress.getByName("10.2.24.156"), 9999);
//			socket.send(packet);
//			socket.close();
//			System.out.println("OK");
//		} catch (IOException e) {
//			e.printStackTrace();
//		}
		
//		try {
//			byte[] buf = new byte[4096];
//			DatagramSocket socket = new DatagramSocket(8888);
//			DatagramPacket packet = new DatagramPacket(buf, buf.length);
//			socket.receive(packet);
//			socket.close();
//			System.out.println(packet.getAddress().getHostAddress());
//			System.out.println(new String(packet.getData()));
//			
//		} catch (IOException e) {
//			// TODO Auto-generated catch block
//			e.printStackTrace();
//		}
		// TCP Server
		try {
			ServerSocket server = new ServerSocket(8888);
			Socket socket = server.accept();
			InputStream is = socket.getInputStream();
			
			InputStreamReader isr = new InputStreamReader(is);
			int temp;
			while ( (temp = isr.read())!=-1)
			{
				System.out.print((char)temp);
			}
			System.out.println();
			System.out.println("client ip:"+socket.getInetAddress());
			is.close();
			socket.close();
			server.close();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		// TCP Client
		try {
			Socket socket = new Socket(ip, 8888);
			OutputStream out = socket.getOutputStream();
			out.write("Hi, I'm Henry!!".getBytes());
			out.flush();
			out.close();
			socket.close();
		} catch (UnknownHostException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}
}
